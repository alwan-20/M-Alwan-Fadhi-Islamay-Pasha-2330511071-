<?php

namespace App\Models;

use CodeIgniter\Model;

class KeahlianModel extends Model
{
    protected $table = 'keahlian';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'biodata_id', 'kategori', 'nama_keahlian', 'tingkat_kemahiran'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getKeahlianByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('kategori', 'ASC')
                    ->findAll();
    }

    public function getKeahlianByKategori($biodataId)
    {
        $keahlian = $this->getKeahlianByBiodata($biodataId);
        $grouped = [];
        
        foreach ($keahlian as $skill) {
            $grouped[$skill['kategori']][] = $skill;
        }
        
        return $grouped;
    }
}