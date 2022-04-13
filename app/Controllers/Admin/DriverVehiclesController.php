<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\MakeModel;
use App\Models\DriverVehicleModel;
use App\Models\VehicleTypeModel;
use App\Models\VehModel;
use App\Models\DriverModel;

class DriverVehiclesController extends BaseController
{
    public $company;
    public $make;
    public $vehicleModel;
    public $vehicleType;
    public $vehModel;
    public $driver;
    public function __construct()
    {
        $this->company = new CompanyModel();
        $this->make = new MakeModel();
        $this->vehicleModel = new DriverVehicleModel();
        $this->vehicleType = new VehicleTypeModel();
        $this->vehModel = new VehModel();
        $this->driver = new DriverModel();
    }
    public function index()
    {
        $data = [];
        $getAll = [];
        $criteria = [
            'sort-by'   => get('sort-by'),
            'order'     => get('order'),
            'option'    => get('option'),
            'keyword'   => get('keyword'),
            'eStatus'   => get('eStatus'),         
        ];
        $getAll = $this->vehicleModel->getAllRecords($criteria);
        $data = [
            'criteria' => (object)$criteria,           
            'getAll' => $getAll,
            'pager' => $this->vehicleModel->pager,
        ];
        $this->adminTemplate('admin/drivervehicles/list', $data);
    }
    /**
     * Function to add driver vehicles
     *
     * @return void
     */
    public function add()
    {
        try {
            $ID = base64_decode(get('ID'));
            $data = [];
            $details = [];
            $companies = [];
            $makes = [];
            $vehiclesType = [];
            $modelDetails = [];
            $driverDetails = [];
            if ($ID != '') {
                $details = $this->vehicleModel->getDetails($ID);
                if (!empty($details)) {
                    $modelDetails = $this->vehModel->getAllActiveModels($details->iMakeId);
                    $driverDetails = $this->driver->getAllDrivers($details->iCompanyId);
                }
            }
            $companies = $this->company->getAllCompanies();
            $makes = $this->make->getAllMake();
            $vehiclesType = $this->vehicleType->getAll();
            $data = [
                'details' => $details,
                'companies' => $companies,
                'makes' => $makes,
                'vehiclesType' => $vehiclesType,
                'modelDetails' => $modelDetails,
                'driverDetails' => $driverDetails,
                'action' => (empty($details)) ? 'Add Taxi' : 'Update',
            ];
            $this->adminTemplate('admin/drivervehicles/add', $data);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * save
     *
     * @return void
     */
    public function save()
    {
        try {
            $ID = post('ID'); // Driver Vechicle ID.     
            $eChildSeatAvailable = post('eChildSeatAvailable') == 'on' ? 'Yes' : 'No';
            $eStatus = post('eStatus') == 'on' ? 'Active' : 'Inactive';
            $vCarType = '';
            $vRentalCarType = '';
            if (!empty($_POST['vCarType'])) {
                $vCarType = implode(',', $_POST['vCarType']);
            }
            if (!empty($_POST['vRentalCarType'])) {
                $vRentalCarType = implode(',', $_POST['vRentalCarType']);
            }
            $data = [
                'eChildSeatAvailable'     => $eChildSeatAvailable,
                'eStatus'                 => $eStatus,
                'iCompanyId'              => post('iCompanyId'),
                'iDriverId'               => post('iDriverId'),
                'iMakeId'                 => post('iMakeId'),
                'iModelId'                => post('iModelId'),
                'iYear'                   => post('iYear'),
                'vCarType'                => $vCarType,
                'vRentalCarType'          => $vRentalCarType,
                'vColour'                 => post('vColour'),
                'vLicencePlate'           => post('vLicencePlate'),
            ];            
            if ($ID != '') {
                $response = $this->vehicleModel->updateDetails($data, $ID);
            } else {
                $response = $this->vehicleModel->saveDetails($data);
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
}
