<?php

namespace App\Models;

use CodeIgniter\Model;

class MakeModel extends Model
{
    public $db;
    public $table;
    public function __construct()
    {
        $this->db = db_connect();
        $this->table = 'make';
    }
    public function getAllMake()
    {
        $data = [];
        $sql = "SELECT * FROM $this->table WHERE eStatus='Active' ORDER BY vMake ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
