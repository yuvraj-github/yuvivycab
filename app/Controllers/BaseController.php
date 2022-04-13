<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

// Load Models
use App\Models\LoginModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        helper(['form','url','common']);

        $this->baseModel = new LoginModel();
        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->uri = new \CodeIgniter\HTTP\URI(base_url());
        
        $this->isApi = false;
    }

    /**
     * Check login
     */
    public function checkLogin() {
        if(!isset($_SESSION['user_id'])){ //if login in session is not set
            $url = base_url().'/admin/login/logout';
            header("Location:".$url);
            exit;
        }
        return true;
    }

    /**
     * Check module permissions
     */
    public function checkPermissions() {
        $groupId = $_SESSION['group_id'];
        $getPermissions = $this->baseModel->getPermissionsAndGroupsGranted($groupId);
        if($getPermissions[0] != '') {
            $permissionsArr = explode(',',$getPermissions[0]->permission_name);
        } else {
            $data = [
                'type'=> 'error',
                'message' => "You don't have permissions to access the application."
            ];
            return $this->response->setJSON($data);
        }
        return $permissionsArr;
    }

    public function adminTemplate($page,$data=[]) {
        $this->checkLogin();
        $this->checkPermissions();
        if($this->isApi) {
            return $this->response->setJSON($data);
        }
        $header = [
            'uri' => $this->uri
        ];
        $permissions = $this->checkPermissions();
        $sidebar = [
            'sidebar' => getSidebar($permissions)
        ];
        // pre($sidebar); die;
        // $sidebar = [];
        $footer = [];
        echo view('admin/common/header',$header);
        echo view('admin/common/sidebar',$sidebar);
        echo view($page,$data);
        echo view('admin/common/footer',$footer);
    }
}
