<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use App\Models\LanguageModel;
use App\Models\CompanyModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\DocumentModel;
use App\Models\DriverModel;

class CompanyController extends BaseController
{
    public $country;
    public $language;
    public $company;
    public $state;
    public $city;
    public $document;
    public $driver;
    public function __construct()
    {
        //$pager = \Config\Services::pager();
        $this->country = new CountryModel();
        $this->language = new LanguageModel();
        $this->company = new CompanyModel();
        $this->state = new StateModel();
        $this->city = new CityModel();
        $this->document = new DocumentModel();
        $this->driver = new DriverModel();
    }

    public function index()
    {
        $states = [];
        $cities = [];
        $vCountry = get('vCountry');
        $vState = get('vState');
        $criteria = [
            'sort-by'   => get('sort-by'),
            'order'     => get('order'),
            'option'    => get('option'),
            'keyword'   => get('keyword'),
            'eStatus'   => get('eStatus'),
            'vCountry'  => get('vCountry'),
            'vState'    => get('vState'),
            'vCity'     => get('vCity')
        ];
        $companies = $this->company->getAll($criteria);
        $countries = $this->country->getAllActiveCountries();
        if ($vCountry != '') {
            $states = $this->state->getAllActiveStates($vCountry);
        }
        if ($vState != '') {
            $cities = $this->city->getAllActiveCities($vState);
        }
        $data = [
            'companies' => $companies,
            'pager' => $this->company->pager,
            'criteria' => (object)$criteria,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
        ];
        $this->adminTemplate('admin/company/list', $data);
    }
    /**
     * Function to add company.
     *
     * @return void
     */
    public function addCompany()
    {
        try {
            $companyID = base64_decode(get('companyID'));
            $companyDetails = [];
            $stateDetails = [];
            $cityDetails = [];
            if ($companyID != '') {
                $companyDetails = $this->company->getCompanyDetails($companyID);
                if (!empty($companyDetails)) {
                    $stateDetails = $this->state->getAllActiveStates($companyDetails->vCountry);
                    $cityDetails = $this->city->getAllActiveCities($companyDetails->vState);
                }
            }
            $countries = $this->country->getAllActiveCountries();
            $languages = $this->language->getAllActiveLanguages();
            $data = [
                'countries' => $countries,
                'languages' => $languages,
                'companyDetails' => $companyDetails,
                'action' => (empty($companyDetails)) ? 'Add Company' : 'Update',
                'stateDetails' => $stateDetails,
                'cityDetails' => $cityDetails
            ];
            $this->adminTemplate('admin/company/addcompany', $data);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * Function to save company.
     *
     * @return JSON
     */
    public function saveCompany()
    {
        try {
            $tRegistrationDate = date('Y-m-d H:i:s');
            $companyID = post('companyID');
            $vImage = '';
            $email = post('vEmail');
            $vPassword = post('vPassword');
            $emailExists = $this->company->emailAlreadyExists($email, $companyID);
            if ($emailExists) {
                $result = [
                    'type' => 'error',
                    'message' => 'Email already exist.'
                ];
                return $this->response->setJSON($result);
            }
            if ($_FILES['vImage']['name'] != "") {
                $vImage = $this->saveImageFile();
            }
            $data = [
                'vCompany'          => post('vCompany'),
                'vEmail'            => post('vEmail'),
                'vPassword'         => md5(post('vPassword')),
                'vCountry'          => post('vCountry'),
                'vState'            => post('vState'),
                'vCity'             => post('vCity'),
                'vCaddress'         => post('vCaddress'),
                'vZip'              => post('vZip'),
                'vCode'             => post('vCode'),
                'vPhone'            => post('vPhone'),
                'vLang'             => post('vLang'),
                'vVat'              => post('vVatNum'),
                'tRegistrationDate' => $tRegistrationDate,
                'vImage'            => $vImage,
                'vCommission'       => post('vCommission')
            ];
            if ($companyID != '') {
                if ($vPassword == '') {
                    unset($data['vPassword']);
                }
                if ($vImage == '') {
                    unset($data['vImage']);
                }
                unset($data['tRegistrationDate']);
                $response = $this->company->updateCompanyDetails($data, $companyID);
            } else {
                $response = $this->company->saveCompanyDetails($data);
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
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    
    /**
     * Funtion to save Image.
     *
     * @return string
     */
    private function saveImageFile()
    {
        $fileName = $_FILES['vImage']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $imageName = str_replace(" ", "_", trim($fileName));
        $file = $this->request->getFile('vImage');
        $targetPath = FCPATH . COMPANY_IMAGE_PATH;
        $newFileName = time() . rand(11111, 99999) . '.' . $fileType;
        $file->move($targetPath, $newFileName);
        return $newFileName;
    }
    /**
     * updateCompanyStatus
     *
     * @return void
     */
    public function updateCompanyStatus()
    {
        try {
            $companyID = post('companyID');
            $actionStatus = post('actionStatus');
            $response = $this->company->updateStatus($companyID, $actionStatus);
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
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * deleteCompany
     *
     * @return JSON
     */
    public function deleteCompany()
    {
        try {
            $companyID = $this->request->getPost('companyID');
            if ($companyID == '') {
                $result = [
                    'type' => 'error',
                    'message' => 'Invalid Request!'
                ];
                return $this->response->setJSON($result);
            }
            $this->company->deleteCompany($companyID);
            $result = [
                'type' => 'success',
                'message' => 'Record deleted successfully'
            ];
            $this->session->setFlashdata('type', 'success');
            return $this->response->setJSON($result);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * showDocument
     *
     * @return void
     */
    public function showDocuments()
    {
        try {
            $data = [];
            $companyID = base64_decode(get('companyID'));
            if ($companyID == '') {
                $result = [
                    'type' => 'error',
                    'message' => 'Invalid Request!'
                ];
                return $this->response->setJSON($result);
            }
            $companyDetails = $this->company->getCompanyDetails($companyID);
            $countryCode = $companyDetails->vCountry;
            $documentList = $this->document->getDocsList($countryCode, $docUserType = 'company');
            $data = [
                'documentList' => $documentList,
                'ID' => $companyID,
                'docUsertype' => 'company',
                'filePath' => COMPANY_IMAGE_PATH
            ];
            $this->adminTemplate('admin/documentList', $data);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * saveCompanyDoc
     *
     * @return void
     */
    public function saveDoc()
    {
        try {
            $docID = post('docID');
            $expDate = post('expDate');
            if ($expDate == '') {
                $expDate = '';
            } else {
                $expDate = date('Y-m-d', strtotime($expDate));
            }
            if ($_FILES['vImage']['name'] != "") {
                $vImage = $this->saveImageFile();
            }
            $data = [
                'doc_masterid'      => post('docMasterID'),
                'doc_usertype'      => post('docUserType'),
                'doc_userid'        => post('docUserID'),
                'doc_file'          => $vImage,
                'ex_date'           => $expDate
            ];

            if ($docID == '') {
                $response = $this->document->saveDocFile($data);
            } else {
                $response = $this->document->updateDocFile($data, $docID);
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
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * fetchDocModal
     *
     * @return void
     */
    public function fetchDocModal()
    {
        $data = [];
        $docMasterDetails = [];
        $docMasterID = post('docMasterID');
        $docUserID = post('docUserID');
        $docUsertype = post('docUsertype');
        $docMasterDetails = $this->document->getDocMasterDetails($docMasterID);
        $data = [
            'docMasterDetails' => $docMasterDetails,
            'docUserID' => $docUserID,
            'docUserType' => $docUsertype,
            'filePath' => COMPANY_IMAGE_PATH
        ];
        return view('admin/documentmodal', $data);
    }    
    /**
     * getDrivers
     *
     * @return JSON
     */
    public function getDrivers()
    {
        $iCompanyId = $this->request->getPost('iCompanyId');
        if ($iCompanyId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $drivers = $this->driver->getAllDrivers($iCompanyId);
        $html = "<option value=''>CHOOSE DRIVER</option>";
        foreach ($drivers as $key => $val) {
            $html .= "<option value=" . $val->iDriverId . ">" . $val->driverName . ' ('.$val->vEmail.')'."</option>";
        }
        return $this->response->setJSON(array('type' => 'success', 'drivers' => $html));
    }
}
