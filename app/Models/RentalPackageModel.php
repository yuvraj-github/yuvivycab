<?php namespace App\Models;

use CodeIgniter\Model;

class RentalPackageModel extends Model{
    public $db;
    public function __construct(){
        $this->db = db_connect();
    }
    private function _prepareSort($sort) {
        $array = [
            
        ];
        if(array_key_exists($sort,$array)) {
            return $array[$sort];
        }
    }
    private function _prepareOrder($order) {
        $array = ['asc','desc'];
        if(in_array($order,$array)) {
            return $order;
        }
        return 'asc';
    }
    public function getVehicleTypes() {
        $data = [];
        $sql = "SELECT 
                    vt.iVehicleTypeId,
                    vt.vVehicleType,
                    count(rtl_pkg.iVehicleTypeId) as vehicleTypeCount
                from vehicle_type as vt 
                LEFT JOIN rental_package rtl_pkg ON(vt.iVehicleTypeId=rtl_pkg.iVehicleTypeId)
                where vt.eType ='Ride' AND vt.ePoolStatus = 'No' AND vt.estatus ='Active'
                GROUP BY vt.iVehicleTypeId";
        $query = $this->db->query($sql);
        $data = $query->getResult();
        return $data;
    }

    public function getRentalPackagesById($iVehicleTypeId, $iRentalPackageId = '') {
        $data = [];
        $where = "";
        if($iRentalPackageId != '') {
            $where = " AND iRentalPackageId = '".$iRentalPackageId."'";
        }
        $sql = "SELECT * from rental_package 
                where iVehicleTypeId='".$iVehicleTypeId."'".$where;
        $query = $this->db->query($sql);
        $data = $query->getResult();
        return $data;
    }
    public function addRentalPackage($data) {
        $this->db->table('rental_package')->insert($data);
        return true;
    }
    public function updateRentalPackage($data) {
        $this->db->table('rental_package')->update($data,['iRentalPackageId' => $data['iRentalPackageId']]);
        return true;
    }
    public function deleteRentalPackage($iRentalPackageId) {
        $sql = "DELETE from rental_package where iRentalPackageId = '".$iRentalPackageId."'";
        return $query = $this->db->query($sql);
    }
}