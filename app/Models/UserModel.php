<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    public $db;
    public function __construct(){
        $this->db = db_connect();
    }
    private function _prepareSort($sort) {
        $array = [
            'first_name'    => 'first_name',
            'last_name'     => 'last_name',
            'email'         => 'email',
            'status'        => 'status',
            'password'      => 'password',
            'phone'         => 'phone',
            'created_by'    => 'first_name',
            'creation_date' => 'creation_date'
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
    public function getAllUsers($criteria) {
        $data = [];
        $where = $sort = "";
        // Handle sorting
        if($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
            $sort = $sort = '' ? '' : ' ORDER BY '.$sort.' '.$order;
        }

        $sql = "select * from admin_users ".$where . $sort;
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function getAllActiveUsers() {
        $data = [];
        $sql = "select * from admin_users where admin_users = 'active'";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function deleteUser($userId) {
        $sql = "DELETE from admin_users where id = '".$userId."'";
        return $query = $this->db->query($sql);
    }
    public function addUser($data) {
        $this->db->table('admin_users')->insert($data);
        return true;
    }
    public function updateUser($data) {
        $this->db->table('admin_users')->update($data,['id' => $data['id']]);
        return true;
    }
    public function getUserById($userId) {
        $sql = "select * from admin_users where id = '".$userId."'";
        $query = $this->db->query($sql);
        $row = $query->getRow();
        if (isset($row)) {
            $data = [
                'type' => 'success',
                'row' => $row
            ];
        } else {
            $data = [
                'type'=> 'error',
                'message' => 'Invalid Request.'
            ];
        }
        return $data;
    }
}