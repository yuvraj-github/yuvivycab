<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController {
    public $model;
    public function __construct() {
        $this->model = new LoginModel();
    }
    public function index() {
        echo view('admin/login');
    }
    public function loginUser() {
        // CRPF token goes here...
        
        // end
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if($email == '' || $password == '') {
            $data = [
                'type'=> 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($data);
        }
        $data = ['email' => $email, 'password' => $password];
        $result = $this->model->getUserDetails($data);

        if(!empty($result) && $result['type'] != 'error') {
            $this->session->set('email', $result['row']->email);
            $this->session->set('first_name', $result['row']->first_name);
            $this->session->set('last_name', $result['row']->last_name);
            $this->session->set('user_id', $result['row']->id);
            $this->session->set('group_id', $result['row']->group_id);
        }
        return $this->response->setJSON($result);
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->route('admin/login');
    }

    /**
     * Function to get Modules and Sub-Modules
     */
    // public function getModulesSubModules()
}
