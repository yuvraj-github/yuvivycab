<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use App\Models\LanguageModel;
use App\Models\CompanyModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\DocumentModel;
use App\Models\CurrencyModel;
use App\Models\DriverModel;
use App\Models\UserWalletModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DriverController extends BaseController
{
    public $country;
    public $language;
    public $company;
    public $state;
    public $city;
    public $document;
    public $currency;
    public $driver;
    public $userWallet;
    public function __construct()
    {
        $this->country = new CountryModel();
        $this->language = new LanguageModel();
        $this->company = new CompanyModel();
        $this->state = new StateModel();
        $this->city = new CityModel();
        $this->document = new DocumentModel();
        $this->currency = new CurrencyModel();
        $this->driver = new DriverModel();
        $this->userWallet = new UserWalletModel();
    }

    public function index()
    {
        $data = [];
        $states = [];
        $cities = [];
        $vCountry = get('vCountry');
        $vState = get('vState');
        $getAll = [];
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
        $countries = $this->country->getAllActiveCountries();
        $getAll = $this->driver->getAllActiveRecords($criteria);
        if ($vCountry != '') {
            $states = $this->state->getAllActiveStates($vCountry);
        }
        if ($vState != '') {
            $cities = $this->city->getAllActiveCities($vState);
        }
        $data = [
            'criteria' => (object)$criteria,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'getAll' => $getAll,
            'pager' => $this->driver->pager,
        ];
        $this->adminTemplate('admin/driver/list', $data);
    }
    /**
     * Function to render driver form.
     *
     * @return void
     */
    public function addDriver()
    {
        try {
            $ID = base64_decode(get('ID'));
            $details = [];
            $stateDetails = [];
            $cityDetails = [];
            $companies = [];
            $currencies = [];
            if ($ID != '') {
                $details = $this->driver->getDetails($ID);
                if (!empty($details)) {
                    $stateDetails = $this->state->getAllActiveStates($details->vCountry);
                    $cityDetails = $this->city->getAllActiveCities($details->vState);
                }
            }
            $countries = $this->country->getAllActiveCountries();
            $languages = $this->language->getAllActiveLanguages();
            $companies = $this->company->getAllCompanies();
            $currencies = $this->currency->getAllActiveCurrency();
            $data = [
                'countries' => $countries,
                'languages' => $languages,
                'action' => (empty($details)) ? 'Add Driver' : 'Update',
                'stateDetails' => $stateDetails,
                'cityDetails' => $cityDetails,
                'details' => $details,
                'companies' => $companies,
                'currencies' => $currencies,
            ];
            $this->adminTemplate('admin/driver/add', $data);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * Function to save driver form
     *
     * @return JSON
     */
    public function save()
    {
        try {
            $tRegistrationDate = date('Y-m-d H:i:s');
            $ID = post('ID'); // Driver ID.
            $vImage = '';
            $email = post('vEmail');
            $vPassword = post('vPassword');
            $eGender = '';
            if (isset($_POST['eGender'])) {
                $eGender = post('eGender');
            }
            $emailExists = $this->driver->emailAlreadyExists($email, $ID);
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
                'vName'                     => post('vName'),
                'vLastName'                 => post('vLastName'),
                'vEmail'                    => post('vEmail'),
                'vPassword'                 => md5(post('vPassword')),
                'eGender'                   => $eGender,
                'vCountry'                  => post('vCountry'),
                'vState'                    => post('vState'),
                'vCity'                     => post('vCity'),
                'vCaddress'                 => post('vCaddress'),
                'vZip'                      => post('vZip'),
                'vCode'                     => post('vCode'),
                'vPhone'                    => post('vPhone'),
                'vLang'                     => post('vLang'),
                'iCompanyId'                => post('iCompanyId'),
                'vCurrencyDriver'           => post('vCurrencyDriver'),
                'vPaymentEmail'             => post('vPaymentEmail'),
                'vBankAccountHolderName'    => post('vBankAccountHolderName'),
                'vAccountNumber'            => post('vAccountNumber'),
                'vBankName'                 => post('vBankName'),
                'vBankLocation'             => post('vBankLocation'),
                'vBIC_SWIFT_Code'           => post('vBIC_SWIFT_Code'),
                'tRegistrationDate'         => $tRegistrationDate,
                'vImage'                    => $vImage,
            ];
            if ($ID != '') {
                if ($vPassword == '') {
                    unset($data['vPassword']);
                }
                if ($vImage == '') {
                    unset($data['vImage']);
                }
                unset($data['tRegistrationDate']);
                $response = $this->driver->updateDetails($data, $ID);
            } else {
                $response = $this->driver->saveDetails($data);
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
            return ($e->getMessage());
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
        $targetPath = FCPATH . DRIVER_IMAGE_PATH;
        $newFileName = time() . rand(11111, 99999) . '.' . $fileType;
        $file->move($targetPath, $newFileName);
        return $newFileName;
    }
    public function updateStatus()
    {
        try {
            $ID = post('ID');
            $actionStatus = post('actionStatus');
            $response = $this->driver->updateStatus($ID, $actionStatus);
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
     * fetchWalletModal
     *
     * @return void
     */
    public function fetchWalletModal()
    {
        try {
            $data = [];
            $userID = post('userID');
            $iUserWalletID = post('iUserWalletID');
            $data = [
                'userID' => $userID,
                'iUserWalletID' => $iUserWalletID,
                'eType' => 'Credit',
                'eFor' => 'Deposit',
                'eUserType' => 'Driver',
            ];
            return view('admin/walletmodal', $data);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * saveWalletBalance
     *
     * @return void
     */
    public function saveWalletBalance()
    {
        try {
            $iBalance = post('iBalance');
            $data = [
                'eType' => post('eType'),
                'eFor' => post('eFor'),
                'iUserId' => post('userID'),
                'eUserType' => post('eUserType'),
                'dDate' => Date('Y-m-d H:i:s'),
                'tDescription' => '#LBL_AMOUNT_CREDIT#',
                'iBalance' => $iBalance
            ];
            $iUserWalletID = post('iUserWalletID');

            if ($iUserWalletID != '') {
                $response = $this->userWallet->updateWalletBalance($iUserWalletID, $iBalance);
            } else {
                $response = $this->userWallet->saveWalletBalance($data);
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
     * deleteRecord
     *
     * @return JSON
     */
    public function deleteRecord()
    {
        try {
            $ID = $this->request->getPost('ID'); // Driver ID
            if ($ID == '') {
                $result = [
                    'type' => 'error',
                    'message' => 'Invalid Request!'
                ];
                return $this->response->setJSON($result);
            }
            $this->driver->deleteRecord($ID);
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
    public function showDocuments()
    {
        try {
            $data = [];
            $ID = base64_decode(get('ID'));
            if ($ID == '') {
                $result = [
                    'type' => 'error',
                    'message' => 'Invalid Request!'
                ];
                return $this->response->setJSON($result);
            }
            $details = $this->driver->getDetails($ID);
            $countryCode = $details->vCountry;
            $documentList = $this->document->getDocsList($countryCode, $docUserType = 'driver');
            $data = [
                'documentList' => $documentList,
                'ID' => $ID,
                'docUsertype' => 'driver',
                'filePath' => DRIVER_IMAGE_PATH
            ];
            $this->adminTemplate('admin/documentList', $data);
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
            'filePath' => DRIVER_IMAGE_PATH
        ];
        return view('admin/documentmodal', $data);
    }
    /**
     * saveDoc
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
     * updateMarkFavourite
     *
     * @return JSON
     */
    public function updateMarkFavourite()
    {
        try {
            $ID = post('ID');
            $isFavurite = post('isFavurite');
            $isFavurite = ($isFavurite == 'true') ? 'Yes' : 'No';
            if ($ID == '') {
                $result = [
                    'type' => 'error',
                    'message' => 'Invalid Request!'
                ];
                return $this->response->setJSON($result);
            }
            $response = $this->driver->updateMarkFavourite($ID, $isFavurite);
            if ($response) {
                $result = [
                    'type' => 'success',
                    'message' => 'Record saved successfully'
                ];
            } else {
                $result = [
                    'type' => 'error',
                    'message' => 'Error in while saving.'
                ];
            }
            return $this->response->setJSON($result);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function exportRecord()
    {
        try {
            $data = $this->driver->getAllActiveDrivers();
            $fileName = 'drivers.xlsx';
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Driver Name');
            $sheet->setCellValue('B1', 'Company Name');
            $sheet->setCellValue('C1', 'Email');
            $sheet->setCellValue('D1', 'Signup Date');
            $sheet->setCellValue('E1', 'Mobile');
            $sheet->setCellValue('F1', 'Wallet Balance');
            $sheet->setCellValue('G1', 'Status');
            $sheet->setCellValue('H1', 'IsFeatured');
            $rows = 2;

            foreach ($data as $key => $val) {
                $sheet->setCellValue('A' . $rows, $val->vName . ' ' . $val->vLastName);
                $sheet->setCellValue('B' . $rows, $val->vCompany);
                $sheet->setCellValue('C' . $rows, $val->vEmail);
                $sheet->setCellValue('D' . $rows, date('m/d/Y', strtotime($val->tRegistrationDate)));
                $sheet->setCellValue('E' . $rows, $val->vCode . ' ' . $val->vPhone);
                $sheet->setCellValue('F' . $rows, ($val->iBalance) ? 'â‚¬ ' . $val->iBalance : 'â‚¬ 0.00');
                $sheet->setCellValue('G' . $rows, $val->eStatus);
                $sheet->setCellValue('H' . $rows, $val->eIsFeatured);
                $rows++;
            }

            $writer = new Xlsx($spreadsheet);
            $writer->save($fileName);
            header("Content-Type: application/vnd.ms-excel");
            header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length:' . filesize($fileName));
            flush();
            readfile($fileName);
            exit;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
