<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'biodata_id', 'jenjang', 'nama_institusi', 'jurusan',
        'tahun_mulai', 'tahun_selesai', 'nilai', 'keterangan'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getPendidikanByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('tahun_mulai', 'DESC')
                    ->findAll();
    }
}