<?php

namespace App\Models;

use CodeIgniter\Model;

class Complaint extends Model
{
    protected $table            = 'pengaduan';
    protected $primaryKey       = 'pengaduan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['pengaduan_id', 'judul', 'pelapor', 'detail', 'gambar', 'status', 'no_telpon', 'created_at', 'update_at', 'delete_at', 'latitude', 'longitude' ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function deleteComplaint($id)
    {
        return $this->where('pengaduan_id', $id)->delete();
    }

  
}
