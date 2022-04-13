<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    public $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getAllActiveCountries() {
        $data = [];
        $sql = "SELECT iCountryId,vCountry,vCountryCode FROM country WHERE eStatus = 'Active' ORDER BY  vCountry ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;  
    }
    public function getPhoneCode($vCountryCode) {        
        $sql = "SELECT vPhoneCode FROM country WHERE vCountryCode='$vCountryCode'";
        $query = $this->db->query($sql);
        $row = $query->getRow();      
        return $row;
    }
}
