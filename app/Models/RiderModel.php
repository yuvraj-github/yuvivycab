<?php

namespace App\Models;

use CodeIgniter\Model;

class RiderModel extends Model {
    private function _prepareSort($sort) {
        $array = [
            'name'  => 'vName',
            'eStatus'   => 'eStatus'
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
    public function getAllRiders($criteria){
        $data = [];
        $where = $sort = "";
        // Handle sorting
        if($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
            $sort = $sort = '' ? '' : ' ORDER BY '.$sort.' '.$order;
        }
        $sql = "SELECT 
                    iUserId,CONCAT(vName,' ',vLastName) AS name, vEmail, 
                    vPhone AS mobile,vPhoneCode,tRegistrationDate,eStatus 
                FROM register_user WHERE eStatus != 'Deleted'" . $sort;
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function getDetails($iUserId) {
        $sql = "select * from register_user where iUserId   = $iUserId";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function emailAlreadyExists($email, $ID) {
        if ($ID != '') {
            $sql = "SELECT * FROM register_user WHERE vEmail='$email' AND iUserId <> $ID";
        } else {
            $sql = "SELECT * FROM register_user WHERE vEmail='$email'";
        }
        $query = $this->db->query($sql);
        $row = $query->getRow();
        return $row;
    }
    public function saveDetails($data) {
        return $this->db->table('register_user')->insert($data);
    }
    public function updateDetails($data, $ID) {
        return $this->db->table('register_user')->update($data, ['iUserId  ' => $ID]);
    }
    public function updateStatus($iUserId, $eStatus) {
        return $this->db->table('register_user')->update(['eStatus' => $eStatus], ['iUserId  ' => $iUserId]);
    }
}
