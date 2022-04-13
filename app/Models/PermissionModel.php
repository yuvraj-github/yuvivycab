<?php namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model{
    public $db;
    public function __construct(){
        $this->db = db_connect();
    }
    public function getPermissionGroups() {
        $data = [];
        $sql = "select * from permission_groups WHERE status = 'Active'";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function getGroupWisePermissions() {
        $data = [];
        $sql = "select perms.*,permGrps.perm_group_name from permissions as perms 
                LEFT JOIN permission_groups as permGrps ON (perms.display_group_id = permGrps.id) 
                WHERE perms.display_app_type = 'All' AND permGrps.status = 'Active'
                ORDER BY permGrps.perm_group_name";
        $query = $this->db->query($sql);
        $rows = $query->getResult();
        foreach ($rows as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function insertGroupPermissionMapping($groupId, $insertBatch) {
        $sql = "DELETE from group_permission_mapping where group_id = '".$groupId."'";
        $query = $this->db->query($sql);
        if($query) {
            return $this->db->table('group_permission_mapping')
				  ->insertBatch($insertBatch);
        }
    }
}