<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    public $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getAllActiveStates($vCountryCode)
    {
        $data = [];
        $sql = "SELECT iStateId ,vState FROM state LEFT JOIN country ON country.iCountryId = state.iCountryId
                WHERE state.eStatus = 'Active' AND country.vCountryCode='$vCountryCode' ORDER BY vCountry ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
