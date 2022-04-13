<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PermissionModel;
use App\Models\GroupModel;

class Permissions extends BaseController {
    public $model;
    public function __construct() {
        $this->model = new PermissionModel();
        $this->groupModel = new GroupModel();
    }
    /**
     * Description: Load all the groups
     */
    public function index() {
        $groups = $this->groupModel->getAllActiveGroups();

        // Function to get permission groups and permissions
        $permissionGroups = $this->model->getPermissionGroups();
        $permissions = $this->model->getGroupWisePermissions();

        $newPermissionArray = [];
        foreach($permissions as $permission){
            if(!empty($newPermissionArray)) { 
                foreach($newPermissionArray as $displayGroupId => $value) {
                    if($displayGroupId == $permission->display_group_id) {
                        $newPermissionArray[$displayGroupId][$permission->id] = $permission;
                    } else {
                        $newPermissionArray[$permission->display_group_id][$permission->id] = $permission;
                    }
                }
            } else {
                $newPermissionArray[$permission->display_group_id][$permission->id] = $permission;
            }
        }
        $data = [
            'groups' => $groups,
            'permissions' => $newPermissionArray
        ];
        echo $this->adminTemplate('admin/permissions/list',$data);
    }
    /**
     * Function to insert group permission mapping
     */
    public function saveGroupPermissionMapping() {
        $groupId = post('groupId');
        $permissions = post_array('permissions');

        $insertBatch = [];
        foreach($permissions as $permission) {
            $insertBatch[] = [
                'group_id' => $groupId,
                'permission_id' => $permission
            ];
        }
        $insertBatch = $this->model->insertGroupPermissionMapping($groupId, $insertBatch);
        if($insertBatch) {
            $result = [
                'type' => 'success',
                'message' => 'Record saved successfully'
            ];
        } else {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
        }
        return $this->response->setJSON($result);
    }
}