<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use App\Models\RiderModel;
use App\Models\LanguageModel;
use App\Models\CurrencyModel;

class Rider extends BaseController {
    public $country;
    public $rider;
    public $language;
    public $currency;
    public function __construct() {
        $this->rider = new RiderModel();
        $this->country = new CountryModel();
        $this->currency = new CurrencyModel();
        $this->language = new LanguageModel();
    }

    public function index() {
        $criteria = [
            'sort-by'   => get('sort-by'),
            'order'     => get('order'),
        ];
        $registeredUserslist = $this->rider->getAllRiders($criteria);
        $data = [
            'registeredUserslist' => $registeredUserslist,
            'pager' => $this->rider->pager
        ];
        $this->adminTemplate('admin/rider/list', $data);
    }
    /**
     * Function to show add rider form
     */
    public function showAddRiderForm() {
        $iUserId = get('ID');
        $details = [];
        if ($iUserId != '') {
            $details = $this->rider->getDetails($iUserId);
        }
        $countries = $this->country->getAllActiveCountries();
        $languages = $this->language->getAllActiveLanguages();
        $currencies = $this->currency->getAllActiveCurrency();
        $data = [
            'countries' => $countries,
            'languages' => $languages,
            'currencies' => $currencies,
            'details'   => $details,
            'action' => 'Save'
        ];
        $this->adminTemplate('admin/rider/addRiderForm', $data);
    }
    /**
     * Funtion to save Image.
     *
     * @return string
     */
    private function saveImageFile() {
        $fileName = $_FILES['vImgName']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $imageName = str_replace(" ", "_", trim($fileName));
        $file = $this->request->getFile('vImgName');
        $targetPath = FCPATH . RIDER_IMAGE_PATH;
        $newFileName = time() . rand(11111, 99999) . '.' . $fileType;
        $file->move($targetPath, $newFileName);
        return $newFileName;
    }
    /**
     * Function to save rider details
     */
    public function save() {
        $ID = post('ID');
        $vEmail = post('vEmail');
        $vPassword = post('vPassword');
        
        if ($_FILES['vImgName']['name'] != "") {
            $vImgName = $this->saveImageFile();
        }
        if (isset($_POST['eGender'])) {
            $eGender = post('eGender');
        }
        $data = [
            'iUserId'               => post('ID'),
            'vName'                 => post('vName'),
            'vLastName'             => post('vLastName'),
            'vEmail'                => $vEmail,
            'vPassword'             => $vPassword,
            'eGender'               => $eGender,
            'vCountry'              => post('vCountry'),
            'vPhoneCode'            => post('vPhoneCode'),
            'vPhone'                => post('vPhone'),
            'vLang'                 => post('vLang'),
            'vCurrencyPassenger'    => post('vCurrencyPassenger'),
            'eStatus'               => post('eStatus'),
            'vImgName'              => $vImgName
        ];

        $emailExists = $this->rider->emailAlreadyExists($vEmail, $ID);
        if ($emailExists) {
            $result = [
                'type' => 'error',
                'message' => 'Email already exist.'
            ];
            return $this->response->setJSON($result);
        }
        if ($ID != '') {
            if ($vPassword == '') {
                unset($data['vPassword']);
            }
            if ($vImgName == '') {
                unset($data['vImgName']);
            }
            $response = $this->rider->updateDetails($data, $ID);
        } else {
            $response = $this->rider->saveDetails($data);
        }
        if ($response) {
            $result = [
                'type' => 'success',
                'message' => 'Record saved successfully'
            ];
            $this->session->setFlashdata('type', 'success');
        } else {
            $result = [
                'type' => 'error',
                'message' => 'Error in while saving.'
            ];
            $this->session->setFlashdata('type', 'error');
        }
        return $this->response->setJSON($result);
    }
    public function changeStatus() { 
        $iUserId = post('iUserId');
        $eStatus = post('eStatus');
        if($iUserId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request.'
            ];
        }
        $response = $this->rider->updateStatus($iUserId, $eStatus);
        if ($response) {
            $result = [
                'type' => 'success',
                'message' => 'Record deleted successfully'
            ];
            $this->session->setFlashdata('type', 'success');
        } else {
            $result = [
                'type' => 'error',
                'message' => 'Error in while saving.'
            ];
            $this->session->setFlashdata('type', 'error');
        }
        return $this->response->setJSON($result);
    }
}
