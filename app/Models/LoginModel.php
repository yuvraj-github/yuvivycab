<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{
    public $db;
    public function __construct(){
        $this->db = db_connect();
    }
    public function getUserDetails($data) {
        $sql = "select * from admin_users where email = ? AND password = ?";
        $query = $this->db->query($sql, [$data['email'], $data['password']]);
        $row = $query->getRow();
        if (isset($row)) {
            $data = [
                'type' => 'success',
                'message' => 'Logged successfully.',
                'row'=> $row
            ];
        } else {
            $data = [
                'type'=> 'error',
                'message' => 'Wrong email/password.'
            ];
        }
        return $data;
    }
    public function getPermissionsAndGroupsGranted($groupId) {
        $sql = "select GROUP_CONCAT(perms.permission_name) as permission_name 
                from group_permission_mapping as gpm 
                LEFT JOIN admin_groups as grps ON (gpm.group_id=grps.id) 
                LEFT JOIN permissions as perms ON (gpm.permission_id=perms.id)
                WHERE gpm.group_id='".$groupId."'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }
}