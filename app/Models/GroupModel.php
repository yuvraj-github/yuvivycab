<?php namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model{
    public $db;
    public function __construct(){
        $this->db = db_connect();
    }
    private function _prepareSort($sort) {
        $array = [
            'group_name' => 'grp.group_name',
            'status' => 'grp.status',
            'created_by' => 'user.first_name',
            'creation_date' => 'grp.creation_date'
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
    public function getAllGroups($criteria) {
        $data = [];
        $where = $sort = "";
        // Handle sorting
        if($criteria['sort-by'] != '') {
            $sort = $this->_prepareSort($criteria['sort-by']);
            $order = $this->_prepareOrder($criteria['order']);
            $sort = $sort = '' ? '' : ' ORDER BY '.$sort.' '.$order;
        }

        $sql = "select 
                    grp.*,concat(user.first_name,' ',user.last_name) as name
                from admin_groups as grp 
                LEFT JOIN admin_users as user on(grp.created_by=user.id)".$where . $sort;
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function getAllActiveGroups() {
        $data = [];
        $sql = "select 
                    grp.*,concat(user.first_name,' ',user.last_name) as name
                from admin_groups as grp 
                LEFT JOIN admin_users as user on(grp.created_by=user.id) 
                where grp.status = 'active'";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function deleteGroup($groupId) {
        $sql = "DELETE from admin_groups where id = '".$groupId."'";
        return $query = $this->db->query($sql);
    }
    public function addGroup($data) {
        $this->db->table('admin_groups')->insert($data);
        return true;
    }
    public function updateGroup($data) {
        $this->db->table('admin_groups')->update($data,['id' => $data['id']]);
        return true;
    }
    public function getGroupById($groupId) {
        $sql = "select * from admin_groups where id = '".$groupId."'";
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