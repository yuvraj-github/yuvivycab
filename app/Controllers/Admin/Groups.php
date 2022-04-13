<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\GroupModel;

class Groups extends BaseController {
    public $model;
    public function __construct() {
        $this->model = new GroupModel();
    }
    /**
     * Description: Load all the groups
     */
    public function index() {
        $criteria = [
            'sort-by'=> get('sort-by'),
            'order' => get('order')
        ];
        $groups = $this->model->getAllGroups($criteria);
        $data = [
            'groups' => $groups
        ];
        $this->adminTemplate('admin/groups/list',$data);
    }
    /**
     * Description: Function to delete groups
     */
    public function deleteGroup() {
        $groupId = $this->request->getPost('groupId');
        if($groupId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $this->model->deleteGroup($groupId);
        $result = [
            'type' => 'success',
            'message' => 'Record deleted successfully'
        ];
        return $this->response->setJSON($result);
    }
    /**
     * Description Function to show add groups form
     */
    public function showAddGroupsForm() {
        $groupId = get('gId');
        $groupDetail = [];
        if($groupId != '') {
            $groupDetail = $this->model->getGroupById($groupId);
        }
        $data = [
            'groupDetail' => $groupDetail,
            'action' => (empty($groupDetail)) ? 'Add' : 'Update'
        ];
        $this->adminTemplate('admin/groups/addGroupForm', $data);
    }
    /**
     * Description: Function to add a group
     */
    public function saveGroupDetails() {
        $groupId = post('groupId');
        $currentDate = date('Y-m-d H:i:s');

        $data = [
            'group_name' => post('groupName'),
            'status' => post('status'),
            'created_by' => $_SESSION['user_id'],
            'creation_date' => $currentDate
        ];

        if($groupId == '') { // Add
            $this->model->addGroup($data);
        } else{ // Update
            unset($data['created_by']);
            unset($data['creation_date']);
            $data['id'] = $groupId;
            $data['updated_by'] = $_SESSION['user_id'];
            $data['updation_date'] = $currentDate;
            $this->model->updateGroup($data);
        }
        $result = [
            'type' => 'success',
            'message' => 'Record saved successfully'
        ];
        return $this->response->setJSON($result);
    }
}