<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table = 'biodata';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'foto', 'email', 'telepon', 'alamat', 
        'program_studi', 'universitas', 'semester', 'ipk', 
        'tentang_saya', 'linkedin', 'github'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getBiodataWithRelations($id = 1)
    {
        return $this->find($id);
    }
}