<?php
namespace App\Models;
use CodeIgniter\Model;

class LocationModel extends Model{
    public $db;
    public function __construct() {
        $this->db = db_connect();
    }
    public function getAllActiveLocations() {
        $data = [];
        $sql = "SELECT * FROM location_master WHERE eStatus = 'Active' AND eFor = 'VehicleType' ORDER BY  vLocationName ASC ";
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
