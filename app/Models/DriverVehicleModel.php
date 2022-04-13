<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverVehicleModel extends Model
{
    protected $table = 'driver_vehicle';
    protected $primaryKey = 'iDriverVehicleId';
    protected $allowedFields = ['*'];

    public function saveDetails($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateDetails($data, $ID)
    {
        return $this->db->table($this->table)->update($data, ['iDriverVehicleId  ' => $ID]);
    }
    public function getAllRecords($criteria)
    {
        $sort = 'iDriverVehicleId';
        $order = 'DESC';
        $like = [];
        $orLike = [];
        $where = [];
        if ($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
        }
        if ($criteria['option'] != '' && $criteria['option'] != 'DriverName') {
            $option = $criteria['option'];
            if ($criteria['keyword'] != '') {
                $keyword = strtolower($criteria['keyword']);
                $like = [$option => $keyword];
            }
        }
        if ($criteria['option'] == 'DriverName') {
            $keyword = strtolower($criteria['keyword']);
            $like = ["CONCAT(`rd`.`vName`,'',`rd`.`vLastName`)" => $keyword];
        }
        if ($criteria['eStatus'] != '') {
            $where['dv.eStatus'] = $criteria['eStatus'];
        }
        if ($criteria['option'] == '' && $criteria['keyword'] != '') {
            $orLike = [
                'c.vCompany' => strtolower($criteria['keyword']),
                'm.vMake' => strtolower($criteria['keyword']),
                "CONCAT(`rd`.`vName`,'',`rd`.`vLastName`)" => $criteria['keyword']
            ];
        }
        $query = $this->select("dv.*,c.vCompany, m.vMake, CONCAT(`rd`.`vName`, ' ', `rd`.`vLastName`) as DriverName, md.vTitle as modelName")
            ->from('driver_vehicle dv', true)
            ->Join('company c', 'c.iCompanyId=dv.iCompanyId', 'left')
            ->Join('make m', 'm.iMakeId=dv.iMakeId ', 'left')
            ->Join('model md', 'md.iModelId=dv.iModelId ', 'left')
            ->Join('register_driver rd', 'rd.iDriverId =dv.iDriverId  ', 'left')
            ->like($like)
            ->orLike($orLike)
            ->where($where)
            ->orderBy($sort, $order)
            ->paginate(20);
        return $query;
    }
    private function _prepareSort($sort)
    {
        $array = [
            'driverName'        => 'vname',
            'c.vCompany'        => 'c.vCompany',
            'm.vMake'           => 'm.vMake',
            'eStatus'           => 'eStatus',
        ];
        if (array_key_exists($sort, $array)) {
            return $array[$sort];
        }
        return 'iDriverVehicleId';
    }
    private function _prepareOrder($order)
    {
        $array = ['asc', 'desc'];
        if (in_array($order, $array)) {
            return $order;
        }
        return 'desc';
    }
    public function getDetails($ID)
    {
        $sql = "select * from $this->table where iDriverVehicleId = $ID";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
}
