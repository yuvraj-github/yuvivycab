<?php

namespace App\Models;

use CodeIgniter\Model;

class VehModel extends Model
{
    public $db;
    public $table;
    public function __construct()
    {
        $this->db = db_connect();
        $this->table = 'model';
    }
    public function getAllModel($iMakeId)
    {
        $data = [];
        $sql = "SELECT * FROM $this->table WHERE eStatus='Active' AND iMakeId=$iMakeId ORDER BY vTitle ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function getAllActiveModels($iMakeId)
    {
        $data = [];
        $sql = "SELECT md.iModelId, md.vTitle FROM $this->table as md LEFT JOIN make as m ON m.iMakeId = md.iMakeId
                WHERE md.eStatus = 'Active' AND m.iMakeId=$iMakeId ORDER BY md.vTitle ASC";      
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
