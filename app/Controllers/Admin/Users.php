<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GroupModel;

class Users extends BaseController {
    public $model;
    public function __construct() {
        $this->model = new UserModel();
        $this->groupModel = new GroupModel();
    }
    /**
     * Description: Load all the users
     */
    public function index() {
        $criteria = [
            'sort-by'=> get('sort-by'),
            'order' => get('order')
        ];
        $users = $this->model->getAllUsers($criteria);
        $data = [
            'users' => $users
        ];
        $this->adminTemplate('admin/users/list',$data);
    }
    /**
     * Description: Function to delete groups
     */
    public function deleteUser() {
        $userId = $this->request->getPost('userId');
        if($userId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $this->model->deleteUser($userId);
        $result = [
            'type' => 'success',
            'message' => 'Record deleted successfully'
        ];
        return $this->response->setJSON($result);
    }
    /**
     * Description Function to show add groups form
     */
    public function showAddUsersForm() {
        $groups = $this->groupModel->getAllActiveGroups();
        $userId = get('uId');
        $userDetail = [];
        if($userId != '') {
            $userDetail = $this->model->getUserById($userId);
        }
        $data = [
            'userDetail'    => $userDetail,
            'groups'        => $groups,
            'action'        => (empty($userDetail)) ? 'Add' : 'Update'
        ];
        $this->adminTemplate('admin/users/addUserForm', $data);
    }
    /**
     * Description: Function to add a user
     */
    public function saveUserDetails() {
        $userId = post('userId');
        $currentDate = date('Y-m-d H:i:s');

        $data = [
            'group_id'          => post('groupId'),
            'first_name'        => post('firstName'),
            'last_name'         => post('lastName'),
            'email'             => post('email'),
            'password'          => post('password'),
            'status'            => post('status'),
            'phone'             => post('phone'),
            'created_by'        => $_SESSION['user_id'],
            'creation_date'     => $currentDate
        ];
        
        if($userId == '') { // Add
            $this->model->addUser($data);
        } else{ // Update
            unset($data['created_by']);
            unset($data['creation_date']);
            $data['id'] = $userId;
            $data['updated_by'] = $_SESSION['user_id'];
            $data['updation_date'] = $currentDate;
            $this->model->updateUser($data);
        }
        $result = [
            'type' => 'success',
            'message' => 'Record saved successfully'
        ];
        return $this->response->setJSON($result);
    }
}