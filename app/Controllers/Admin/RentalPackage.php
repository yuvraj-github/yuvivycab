<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\RentalPackageModel;

class RentalPackage extends BaseController {
    public $model;
    public function __construct() {
        $this->model = new RentalPackageModel();
    }
    /**
     * Description: Load all the Vehicle Types
     */
    public function index() {
        $vehicleTypes = $this->model->getVehicleTypes();

        $data = [
            'vehicleTypes' => $vehicleTypes
        ];
        $this->adminTemplate('admin/rentalPackage/list',$data);
    }
    /**
     * Description: Load all Rental Packages By ID
     */
    public function rentalPackagesList() {
        $iVehicleTypeId = get('iVehicleTypeId');

        $rentalPackages = $this->model->getRentalPackagesById($iVehicleTypeId);
        $data = [
            'rentalPackages' => $rentalPackages
        ];
        // pre($data);die;
        $this->adminTemplate('admin/rentalPackage/rentalPackagesList', $data);
    }
    /**
     * Description: Load add rental packages form
     */
    public function addRentalPackagesForm() { 
        $iVehicleTypeId = get('iVehicleTypeId');
        $iRentalPackageId = get('iRentalPackageId');

        if($iRentalPackageId != '') {
            $rentalPackagesDetails = $this->model->getRentalPackagesById($iVehicleTypeId, $iRentalPackageId);
        }
        $data = [
            'action' => 'Add',
            'rentalPackagesDetails' => (isset($rentalPackagesDetails) && !empty($rentalPackagesDetails)) ? $rentalPackagesDetails[0]: ''
        ];
        $this->adminTemplate('admin/rentalPackage/addRentalPackage',$data);
    }
    /**
     * Description: Save action
     */
    public function saveRentalPackage() {
        $iVehicleTypeId = post('iVehicleTypeId');
        $iRentalPackageId = post('iRentalPackageId');
        if($iVehicleTypeId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $data = [
            'iRentalPackageId'  => $iRentalPackageId,
            'iVehicleTypeId'    => $iVehicleTypeId,
            'vPackageName_FR'   => post('vPackageName_FR'),
            'vPackageName_EN'   => post('vPackageName_EN'),
            'vPackageName_DE'   => post('vPackageName_DE'),
            'vPackageName_ES'   => post('vPackageName_ES'),
            'vPackageName_IT'   => post('vPackageName_IT'),
            'fPrice'            => post('fPrice'),
            'fKiloMeter'        => post('fKiloMeter'),
            'fHour'             => post('fHour'),
            'fPricePerKM'       => post('fPricePerKM'),
            'fPricePerHour'     => post('fPricePerHour')
        ];
        if($iRentalPackageId == '') { // add
            $this->model->addRentalPackage($data);
        } else { //Update
            $this->model->updateRentalPackage($data);
        }
        $result = [
            'type' => 'success',
            'message' => 'Record saved successfully'
        ];
        return $this->response->setJSON($result);
    }
    /**
     * Description: Function to delete groups
     */
    public function deleteRentalPackage() {
        $iRentalPackageId = $this->request->getPost('rentalPackageId');
        if($iRentalPackageId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $this->model->deleteRentalPackage($iRentalPackageId);
        $result = [
            'type' => 'success',
            'message' => 'Record deleted successfully'
        ];
        return $this->response->setJSON($result);
    }
}