<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table            = 'tb_message';
    protected $primaryKey       = 'id_message';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_user', 'pesan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
