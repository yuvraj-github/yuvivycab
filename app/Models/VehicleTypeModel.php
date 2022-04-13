<?php namespace App\Models;

use CodeIgniter\Model;

class VehicleTypeModel extends Model{
    public $db;
    public function __construct(){
        $this->db = db_connect();
    }
    private function _prepareSort($sort) {
        $array = [
            'vVehicleType'  => 'vt.vVehicleType',
            'vLocationName' => 'lm.vLocationName',
            'fPricePerKM'   => 'vt.fPricePerKM',
            'fPricePerMin'  => 'vt.fPricePerMin',
            'iBaseFare'     => 'vt.iBaseFare', 
            'fCommision'    => 'vt.fCommision', 
            'iPersonSize'   => 'vt.iPersonSize', 
            'iBagSize'      => 'vt.iBagSize', 
            'iDisplayOrder' => 'vt.iDisplayOrder'
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
    public function getAllVehicleTypes($criteria) {
        $data = [];
        $where = $sort = "";
        // Handle sorting
        if($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
            $sort = $sort = '' ? '' : ' ORDER BY '.$sort.' '.$order;
        }
        
        switch ($criteria['option']) {
            case 'vt.vVehicleType_FR':
                $where = " AND vt.vVehicleType_FR LIKE '%".$criteria['keyword']."'";
                break;
            case 'vt.fPricePerKM':
                $where = " AND vt.fPricePerKM LIKE '%".$criteria['keyword']."'";
                break;
            case 'vt.fPricePerMin':
                $where = " AND vt.vVehicleType_FR LIKE '%".$criteria['keyword']."'";
                break;
            case 'vt.iPersonSize':
                $where = " AND vt.iPersonSize LIKE '%".$criteria['keyword']."'";
                break;
            case 'vt.iBagSize':
                $where = " AND vt.iBagSize LIKE '%".$criteria['keyword']."'";
                break;
            case 'vt.iLocationid':
                $where = " AND vt.iLocationid LIKE '%".$criteria['keyword']."'";
                break;
            default:
                $where = "";
        }
        
        if($criteria['vLocationName'] != '') {
            $where = " AND lm.vLocationName = '".$criteria['vLocationName']."'";
        }

        $sql = "SELECT 
                    vt.iVehicleTypeId, vt.vVehicleType, lm.vLocationName, vt.fPricePerKM, vt.fPricePerMin,
                    vt.iBaseFare, vt.fCommision, vt.iPersonSize, vt.iBagSize, vt.iDisplayOrder
                from vehicle_type as vt 
                LEFT JOIN location_master as lm ON(vt.iLocationId=lm.iLocationId)
                where vt.eType ='Ride' AND vt.ePoolStatus = 'No' AND vt.estatus ='Active'".$where.
                " GROUP BY vt.iVehicleTypeId " . $sort;
        $query = $this->db->query($sql);
        $data = $query->getResult();
        return $data;
    }
    public function saveVehicleTypeDetails($postData) {
        $keys = $values = "";
        foreach($postData as $k => $data) {
            $keys = $keys.','.$k;
            $values = ($data == '') ? $values.','.'""' : $values.','.'"'.$data.'"';
        }
        $keys = ltrim($keys, ',');
        $values = ltrim($values, ',');
        $sql = "INSERT INTO vehicle_type (".$keys.") VALUES (".$values.")";
        $this->db->query($sql);
        return true;
    }
    public function updateVehicleTypeDetails($iVehicleTypeId, $array) {
        $this->db->table('vehicle_type')->update($array,['iVehicleTypeId' => $iVehicleTypeId]);
        return true;
    }
    public function getVehicleTypeDetailsById($iVehicleTypeId) {
        $data = [];
        $sql = "SELECT * from vehicle_type 
                where iVehicleTypeId='".$iVehicleTypeId."'";
        $query = $this->db->query($sql);
        $data = $query->getResult();
        return $data;
    }
    public function deleteVehicleType($iVehicleTypeId) {
        $sql = "DELETE from vehicle_type where iVehicleTypeId = '".$iVehicleTypeId."'";
        return $this->db->query($sql);
    }
    public function getAll()
    {
        $data = [];
        $sql = "SELECT vt.*,c.vCountry,ct.vCity,st.vState,lm.vLocationName from vehicle_type as vt left join country as c ON c.iCountryId = vt.iCountryId left join state as st ON st.iStateId = vt.iStateId left join city as ct ON ct.iCityId = vt.iCityId left join location_master as lm ON lm.iLocationId = vt.iLocationid where vt.eType !='UberX' AND vt.eStatus != 'Deleted'";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $iVehicleTypeId = $row->iVehicleTypeId;
            $totalrental = $this->getTotalRental($iVehicleTypeId);
            $row->totalrental= $totalrental;
            $data[] = $row;            
        }
        return $data;
    }
    private function getTotalRental($iVehicleTypeId) {
        $sql = "SELECT count(iRentalPackageId) as totalrental FROM `rental_package` WHERE iVehicleTypeId = $iVehicleTypeId";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row->totalrental;
    }
}