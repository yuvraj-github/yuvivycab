<?php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    public $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getAllActiveLanguages() {
        $data = [];
        $sql = "SELECT vCode,vTitle FROM language_master WHERE eStatus = 'Active' order by vTitle asc";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
