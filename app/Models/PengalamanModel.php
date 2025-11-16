<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table = 'pengalaman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'biodata_id', 'jenis', 'posisi', 'organisasi',
        'deskripsi', 'tahun_mulai', 'tahun_selesai'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getPengalamanByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('tahun_mulai', 'DESC')
                    ->findAll();
    }
}