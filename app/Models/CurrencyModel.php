<?php

namespace App\Models;

use CodeIgniter\Model;

class CurrencyModel extends Model
{
    public $db;
    public $table;
    public function __construct()
    {
        $this->db = db_connect();
        $this->table = 'currency';
    }
    public function getAllActiveCurrency() {
        $data = [];
        $sql = "SELECT * FROM $this->table WHERE eStatus = 'Active' ORDER BY  vName ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }   
}
