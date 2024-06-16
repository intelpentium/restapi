<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'tb_auth';
    protected $primaryKey       = 'id_auth';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['device_id', 'no_hp'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
