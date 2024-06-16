<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table            = 'tb_log';
    protected $primaryKey       = 'id_log';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['device_id', 'no_hp', 'log_api', 'nama', 'pesan', 'method'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
