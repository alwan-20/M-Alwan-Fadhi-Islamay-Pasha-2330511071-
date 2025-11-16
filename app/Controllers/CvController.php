<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\KeahlianModel;

class CvController extends BaseController
{
    protected $biodataModel;
    protected $pendidikanModel;
    protected $pengalamanModel;
    protected $keahlianModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pengalamanModel = new PengalamanModel();
        $this->keahlianModel = new KeahlianModel();
    }

    public function index()
    {
        $biodataId = 1; // Default ID, bisa disesuaikan dengan session/login
        
        $data = [
            'title' => 'CV - Beranda',
            'biodata' => $this->biodataModel->find($biodataId),
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata($biodataId),
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata($biodataId),
            'keahlian' => $this->keahlianModel->getKeahlianByKategori($biodataId)
        ];

        return view('cv/home', $data);
    }

    public function pendidikan()
    {
        $biodataId = 1;
        
        $data = [
            'title' => 'CV - Riwayat Pendidikan',
            'biodata' => $this->biodataModel->find($biodataId),
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata($biodataId)
        ];

        return view('cv/pendidikan', $data);
    }

    public function pengalaman()
    {
        $biodataId = 1;
        
        $data = [
            'title' => 'CV - Riwayat Pengalaman',
            'biodata' => $this->biodataModel->find($biodataId),
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata($biodataId)
        ];

        return view('cv/pengalaman', $data);
    }

    public function keahlian()
    {
        $biodataId = 1;
        
        $data = [
            'title' => 'CV - Keahlian',
            'biodata' => $this->biodataModel->find($biodataId),
            'keahlian' => $this->keahlianModel->getKeahlianByKategori($biodataId)
        ];

        return view('cv/keahlian', $data);
    }

    /**
     * Serve uploaded profile photos from writable/uploads.
     * This keeps uploaded files outside the public webroot while allowing
     * them to be served through a controller action.
     *
     * URL: /cv/foto/{filename}
     */
    public function foto($filename = null)
    {
        // Basic validation
        if (empty($filename)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not specified');
        }

        // Prevent path traversal: only allow basename and a strict filename pattern
        $basename = basename($filename);
        if ($basename !== $filename || !preg_match('/^[A-Za-z0-9._-]+$/', $basename)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid filename');
        }

        $filePath = WRITEPATH . 'uploads/' . $basename;

        // If exact filename not found, try common image extensions for the same basename
        if (!is_file($filePath)) {
            $nameOnly = pathinfo($basename, PATHINFO_FILENAME);
            $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $found = null;
            foreach ($allowedExts as $ext) {
                $candidate = WRITEPATH . 'uploads/' . $nameOnly . '.' . $ext;
                if (is_file($candidate)) {
                    $found = $candidate;
                    $basename = $nameOnly . '.' . $ext; // update basename to actual file
                    break;
                }
            }

            if ($found) {
                $filePath = $found;
            } else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found: ' . $basename);
            }
        }

        // File metadata for caching
        $lastModified = filemtime($filePath);
        $size = filesize($filePath);
        $etag = '"' . md5($basename . $lastModified . $size) . '"';

        // Check conditional request headers
        $ifNoneMatch = $this->request->getHeaderLine('If-None-Match');
        if ($ifNoneMatch && trim($ifNoneMatch) === $etag) {
            return $this->response->setStatusCode(304)
                                  ->setHeader('ETag', $etag)
                                  ->setHeader('Cache-Control', 'public, max-age=604800');
        }

        $ifModifiedSince = $this->request->getHeaderLine('If-Modified-Since');
        if ($ifModifiedSince) {
            $ifModifiedSinceTime = strtotime($ifModifiedSince);
            if ($ifModifiedSinceTime !== false && $lastModified <= $ifModifiedSinceTime) {
                return $this->response->setStatusCode(304)
                                      ->setHeader('ETag', $etag)
                                      ->setHeader('Cache-Control', 'public, max-age=604800');
            }
        }

        // Determine mime type and return file contents with caching headers
        $mime = mime_content_type($filePath) ?: 'application/octet-stream';

        return $this->response->setHeader('Content-Type', $mime)
                              ->setHeader('Content-Length', $size)
                              ->setHeader('Last-Modified', gmdate('D, d M Y H:i:s', $lastModified) . ' GMT')
                              ->setHeader('ETag', $etag)
                              ->setHeader('Cache-Control', 'public, max-age=604800, immutable')
                              ->setBody(file_get_contents($filePath));
    }
}