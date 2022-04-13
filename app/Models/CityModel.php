<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    public $db;
    public function __construct()
    {
        $this->db = db_connect();
    }   
    public function getAllActiveCities($iStateId)
    {
        $data = [];
        if($iStateId != '') {
            $sql = "SELECT iCityId ,vCity FROM city WHERE eStatus = 'Active' AND iStateId=$iStateId ORDER BY vCity ASC";
            $query = $this->db->query($sql);
            $rows = $query->getResult();
            foreach ($rows as $row) {
                $data[] = $row;
            }
        }      
        return $data;
    } 
}
