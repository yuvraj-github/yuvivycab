<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table = 'register_driver';
    protected $primaryKey = 'iDriverId';
    protected $allowedFields = ['*'];

    public function emailAlreadyExists($email, $ID)
    {
        if ($ID != '') {
            $sql = "SELECT * FROM $this->table WHERE vEmail='$email' AND iDriverId <> $ID";
        } else {
            $sql = "SELECT * FROM $this->table WHERE vEmail='$email'";
        }
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function saveDetails($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateDetails($data, $ID)
    {
        return $this->db->table($this->table)->update($data, ['iDriverId  ' => $ID]);
    }
    public function getAllActiveRecords($criteria)
    {
        $sort = 'iDriverId';
        $order = 'DESC';
        $like = [];
        $orLike = [];
        $where = [];
        if ($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
        }
        if ($criteria['option'] != '' && $criteria['option'] != 'MobileNumber' && $criteria['option'] != 'DriverName' && $criteria['option'] != 'Male' && $criteria['option'] != 'Female' && $criteria['option'] != 'EmptyGender') {
            $option = $criteria['option'];
            if ($criteria['keyword'] != '') {
                $keyword = strtolower($criteria['keyword']);
                $like = [$option => $keyword];
            }
        }
        if ($criteria['option'] == 'MobileNumber') {
            $keyword = $criteria['keyword'];
            $like = ["CONCAT(`rd`.`vCode`,'',`rd`.`vPhone`)" => $keyword];
        }
        if ($criteria['option'] == 'DriverName') {
            $keyword = strtolower($criteria['keyword']);
            $like = ["CONCAT(`rd`.`vName`,'',`rd`.`vLastName`)" => $keyword];
        }
        if ($criteria['option'] == 'Male') {
            $keyword = strtolower($criteria['keyword']);
            $like = ["CONCAT(`rd`.`vName`,'',`rd`.`vLastName`)" => $keyword];
            $where['eGender'] = 'Male';
        }
        if ($criteria['option'] == 'Female') {
            $keyword = strtolower($criteria['keyword']);
            $like = ["CONCAT(`rd`.`vName`,'',`rd`.`vLastName`)" => $keyword];
            $where['eGender'] = 'Female';
        }
        if ($criteria['option'] == 'EmptyGender') {
            $keyword = strtolower($criteria['keyword']);
            $like = ["CONCAT(`rd`.`vName`,'',`rd`.`vLastName`)" => $keyword];
            $where['eGender'] = '';
        }
        if ($criteria['eStatus'] != '') {
            $where['eStatus'] = $criteria['eStatus'];
        }
        if ($criteria['vCountry'] != '') {
            $where['vCountry'] = $criteria['vCountry'];
        }
        if ($criteria['vState'] != '') {
            $where['vState'] = $criteria['vState'];
        }
        if ($criteria['vCity'] != '') {
            $where['vCity'] = $criteria['vCity'];
        }
        if ($criteria['option'] == '' && $criteria['keyword'] != '') {
            $orLike = [
                'c.vCompany' => strtolower($criteria['keyword']),
                'vEmail' => strtolower($criteria['keyword']),
                "concat(`vCode`,'',`vPhone`)" => $criteria['keyword']
            ];
        }
        $query = $this->select('rd.*,c.vCompany, uw.iBalance, uw.iUserWalletId')
            ->from('register_driver rd', true)
            ->Join('company c', 'c.iCompanyId=rd.iCompanyId', 'left')
            ->Join('user_wallet uw', 'uw.iUserId=rd.iDriverId ', 'left')
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
            'vEmail'            => 'vEmail',
            'eStatus'           => 'eStatus',
            'tRegistrationDate' => 'tRegistrationDate'
        ];
        if (array_key_exists($sort, $array)) {
            return $array[$sort];
        }
        return 'iDriverId';
    }
    private function _prepareOrder($order)
    {
        $array = ['asc', 'desc'];
        if (in_array($order, $array)) {
            return $order;
        }
        return 'desc';
    }
    public function updateStatus($ID, $actionStatus)
    {
        return $this->db->table($this->table)->update(['eStatus' => $actionStatus], ['iDriverId' => $ID]);
    }
    public function deleteRecord($ID)
    {
        $sql = "DELETE from $this->table where iDriverId   = $ID";
        return $query = $this->db->query($sql);
    }
    public function getDetails($ID)
    {
        $sql = "select * from $this->table where iDriverId   = $ID";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function updateMarkFavourite($ID, $isFavurite)
    {
        return $this->db->table($this->table)->update(['isFavurite' => $isFavurite], ['iDriverId' => $ID]);
    }
    public function getAllActiveDrivers()
    {
        $data = [];
        $sql = "SELECT rd.*, c.vCompany, uw.iBalance FROM $this->table rd LEFT JOIN company c ON c.iCompanyId = rd.iCompanyId 
                LEFT JOIN user_wallet uw ON uw.iUserId = rd.iDriverId WHERE rd.eStatus = 'Active' ORDER BY rd.iDriverId DESC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function getAllDrivers($iCompanyId)
    {
        $data = [];
        $sql = "SELECT rd.*, CONCAT(`rd`.`vName`,' ', `rd`.`vLastName`) as driverName FROM $this->table as rd WHERE eStatus='Active' AND iCompanyId=$iCompanyId ORDER BY vName ASC";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
