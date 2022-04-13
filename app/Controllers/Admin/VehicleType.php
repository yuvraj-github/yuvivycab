<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VehicleTypeModel;
use App\Models\LocationModel;

class VehicleType extends BaseController {
    public $model;
    public $locationsModel;
    public function __construct() {
        $this->model = new VehicleTypeModel();
        $this->locationModel = new LocationModel();
    }
    /**
     * Description: Load all the Vehicle Types
     */
    public function index() {
        $criteria = [
            'sort-by'   => get('sort-by'),
            'order'     => get('order'),
            'option'    => get('option'),
            'keyword'   => get('keyword'),
            'vLocationName'  => get('vLocationName'),
            'eStatus'   => get('eStatus'),
        ];
        $vehicleTypes = $this->model->getAllVehicleTypes($criteria);
        $locations = $this->locationModel->getAllActiveLocations();
        $data = [
            'vehicleTypes' => $vehicleTypes,
            'locations' => $locations
        ];
        $this->adminTemplate('admin/vehicleType/list', $data);
    }
    /**
     * Description: Load add rental packages form
     */
    public function showAddVehicleTypeForm() {
        $iVehicleTypeId = get('iVehicleTypeId');
        $locations = $this->locationModel->getAllActiveLocations();
        $vehicleTypeDetails = $this->model->getVehicleTypeDetailsById($iVehicleTypeId);
        // pre($vehicleTypeDetails);die;
        $data = [
            'action' => 'Add',
            'locations' => $locations,
            'vehicleTypeDetails' => $vehicleTypeDetails[0]
        ];
        $this->adminTemplate('admin/vehicleType/addVehicleTypeForm', $data);
    }
    /**
     * Description: Save action
     */
    public function saveVehicleType() {
        $iVehicleTypeId = post('iVehicleTypeId');
        $iVehicleCategoryId = post('iVehicleCategoryId');
        $iLocationId = post('iLocationId');
        $iCountryId = post('iCountryId');
        $iStateId = post('iStateId');
        $iCityId = post('iCityId');
        $vAddress = post('vAddress');
        $vVehicleType = post('vVehicleType');
        $vVehicleType_EN = post('vVehicleType_EN');
        $vVehicleType_FR = post('vVehicleType_FR');
        $vVehicleType_HI = post('vVehicleType_HI');
        $vVehicleType_PL = post('vVehicleType_PL');
        $vVehicleType_RU = post('vVehicleType_RU');
        $vVehicleType_DE = post('vVehicleType_DE');
        $vVehicleType_ES = post('vVehicleType_ES');
        $vVehicleType_IT = post('vVehicleType_IT');
        $vVehicleType_AR = post('vVehicleType_AR');
        $vVehicleType_NL = post('vVehicleType_NL');
        $vVehicleType_ZH = post('vVehicleType_ZH');
        $vRentalAlias_EN = post('vRentalAlias_EN');
        $vRentalAlias_FR = post('vRentalAlias_FR');
        $vRentalAlias_HI = post('vRentalAlias_HI');
        $vRentalAlias_PL = post('vRentalAlias_PL');
        $vRentalAlias_RU = post('vRentalAlias_RU');
        $vRentalAlias_DE = post('vRentalAlias_DE');
        $vRentalAlias_ES = post('vRentalAlias_ES');
        $vRentalAlias_IT = post('vRentalAlias_IT');
        $vRentalAlias_AR = post('vRentalAlias_AR');
        $vRentalAlias_NL = post('vRentalAlias_NL');
        $vRentalAlias_ZH = post('vRentalAlias_ZH');
        $eFareType = post('eFareType');
        $fFixedFare = post('fFixedFare');
        $fPricePerKM = post('fPricePerKM');
        $fPricePerMin = post('fPricePerMin');
        $fPricePerHour = post('fPricePerHour');
        $fMinHour = post('fMinHour');
        $fTimeSlot = post('fTimeSlot');
        $fTimeSlotPrice = post('fTimeSlotPrice');
        $iBaseFare = post('iBaseFare');
        $fCommision = post('fCommision');
        $iMinFare = post('iMinFare');
        $fPickUpPrice = post('fPickUpPrice');
        $fNightPrice = post('fNightPrice');
        $ePickStatus = post('ePickStatus');
        $eNightStatus = post('eNightStatus');
        $tPickStartTime = post('tPickStartTime');
        $tPickEndTime = post('tPickEndTime');
        $tNightStartTime = post('tNightStartTime');
        $tNightEndTime = post('tNightEndTime');
        $iPersonSize = post('iPersonSize');
        $vLogo = post('vLogo');
        $vLogo1 = post('vLogo1');
        $eType = post('eType');
        $eIconType = post('eIconType');
        $tMonPickStartTime = post('tMonPickStartTime');
        $tMonPickEndTime = post('tMonPickEndTime');
        $fMonPickUpPrice = post('fMonPickUpPrice');
        $tTuePickStartTime = post('tTuePickStartTime');
        $tTuePickEndTime = post('tTuePickEndTime');
        $fTuePickUpPrice = post('fTuePickUpPrice');
        $tWedPickStartTime = post('tWedPickStartTime');
        $tWedPickEndTime = post('tWedPickEndTime');
        $fWedPickUpPrice = post('fWedPickUpPrice');
        $tThuPickStartTime = post('tThuPickStartTime');
        $tThuPickEndTime = post('tThuPickEndTime');
        $fThuPickUpPrice = post('fThuPickUpPrice');
        $tFriPickStartTime = post('tFriPickStartTime');
        $tFriPickEndTime = post('tFriPickEndTime');
        $fFriPickUpPrice = post('fFriPickUpPrice');
        $tSatPickStartTime = post('tSatPickStartTime');
        $tSatPickEndTime = post('tSatPickEndTime');
        $fSatPickUpPrice = post('fSatPickUpPrice');
        $tSunPickStartTime = post('tSunPickStartTime');
        $tSunPickEndTime = post('tSunPickEndTime');
        $fSunPickUpPrice = post('fSunPickUpPrice');
        $tNightSurgeData = post('tNightSurgeData');
        $eAllowQty = post('eAllowQty');
        $iMaxQty = post('iMaxQty');
        $fVisitFee = post('fVisitFee');
        $fCancellationFare = post('fCancellationFare');
        $iCancellationTimeLimit = post('iCancellationTimeLimit');
        $eStatus = post('eStatus');
        $fWaitingFees = post('fWaitingFees');
        $iWaitingFeeTimeLimit = post('iWaitingFeeTimeLimit');
        $iDisplayOrder = post('iDisplayOrder');
        $fRadius = post('fRadius');
        $fDeliveryCharge = post('fDeliveryCharge');
        $fDeliveryChargeCancelOrder = post('fDeliveryChargeCancelOrder');
        $fPoolPercentage = post('fPoolPercentage');
        $ePoolStatus = post('ePoolStatus');
        $fTripHoldFees = post('fTripHoldFees');
        $tTypeDesc = post('tTypeDesc');
        $eDeliveryType = post('eDeliveryType');
        $fBufferAmount = post('fBufferAmount');
        $iBagSize = post('iBagSize');

        $array = [
            'iVehicleCategoryId'                => (!empty($iVehicleCategoryId))? $iVehicleCategoryId : 0,
            'iLocationid'                       => (!empty($iLocationId))? $iLocationId : 0,
            'iCountryId'                        => (!empty($iCountryId))? $iCountryId : 0,
            'iStateId'                          => (!empty($iStateId))? $iStateId : 0,
            'iCityId'                           => (!empty($iCityId))? $iCityId : 0,
            'vAddress'                          => (!empty($vAddress))? $vAddress : "",
            'vVehicleType'                      => (!empty($vVehicleType))? $vVehicleType : "",
            'vVehicleType_EN'                   => (!empty($vVehicleType_EN))? $vVehicleType_EN : "",
            'vVehicleType_FR'                   => (!empty($vVehicleType_FR))? $vVehicleType_FR : "",
            'vVehicleType_HI'                   => (!empty($vVehicleType_HI))? $vVehicleType_HI : "",
            'vVehicleType_PL'                   => (!empty($vVehicleType_PL))? $vVehicleType_PL : "",
            'vVehicleType_RU'                   => (!empty($vVehicleType_RU))? $vVehicleType_RU : "",
            'vVehicleType_DE'                   => (!empty($vVehicleType_DE))? $vVehicleType_DE : "",
            'vVehicleType_ES'                   => (!empty($vVehicleType_ES))? $vVehicleType_ES : "",
            'vVehicleType_IT'                   => (!empty($vVehicleType_IT))? $vVehicleType_IT : "",
            'vVehicleType_AR'                   => (!empty($vVehicleType_AR))? $vVehicleType_AR : "",
            'vVehicleType_NL'                   => (!empty($vVehicleType_NL))? $vVehicleType_NL : "",
            'vVehicleType_ZH'                   => (!empty($vVehicleType_ZH))? $vVehicleType_ZH : "",
            'vRentalAlias_EN'                   => (!empty($vRentalAlias_EN))? $vRentalAlias_EN : "",
            'vRentalAlias_FR'                   => (!empty($vRentalAlias_FR))? $vRentalAlias_FR : "",
            'vRentalAlias_HI'                   => (!empty($vRentalAlias_HI))? $vRentalAlias_HI : "",
            'vRentalAlias_PL'                   => (!empty($vRentalAlias_PL))? $vRentalAlias_PL : "",
            'vRentalAlias_RU'                   => (!empty($vRentalAlias_RU))? $vRentalAlias_RU : "",
            'vRentalAlias_DE'                   => (!empty($vRentalAlias_DE))? $vRentalAlias_DE : "",
            'vRentalAlias_ES'                   => (!empty($vRentalAlias_ES))? $vRentalAlias_ES : "",
            'vRentalAlias_IT'                   => (!empty($vRentalAlias_IT))? $vRentalAlias_IT : "",
            'vRentalAlias_AR'                   => (!empty($vRentalAlias_AR))? $vRentalAlias_AR : "",
            'vRentalAlias_NL'                   => (!empty($vRentalAlias_NL))? $vRentalAlias_NL : "",
            'vRentalAlias_ZH'                   => (!empty($vRentalAlias_ZH))? $vRentalAlias_ZH : "",
            'eFareType'                         => (!empty($eFareType))? $eFareType : "Fixed",
            'fFixedFare'                        => (!empty($fFixedFare))? $fFixedFare : 0,
            'fPricePerKM'                       => (!empty($fPricePerKM))? $fPricePerKM : 0,
            'fPricePerMin'                      => (!empty($fPricePerMin))? $fPricePerMin : 0,
            'fPricePerHour'                     => (!empty($fPricePerHour))? $fPricePerHour : 0,
            'fMinHour'                          => (!empty($fMinHour))? $fMinHour : 0,
            'fTimeSlot'                         => (!empty($fTimeSlot))? $fTimeSlot : 0,
            'fTimeSlotPrice'                    => (!empty($fTimeSlotPrice))? $fTimeSlotPrice : 0,
            'iBaseFare'                         => (!empty($iBaseFare))? $iBaseFare : 0,
            'fCommision'                        => (!empty($fCommision))? $fCommision : 0,
            'iMinFare'                          => (!empty($iMinFare))? $iMinFare : 0,
            'fPickUpPrice'                      => (!empty($fPickUpPrice))? $fPickUpPrice : 0,
            'fNightPrice'                       => (!empty($fNightPrice))? $fNightPrice : 0,
            'ePickStatus'                       => (!empty($ePickStatus))? $ePickStatus : "Inactive",
            'eNightStatus'                      => (!empty($eNightStatus))? $eNightStatus : "Inactive",
            'tPickStartTime'                    => (!empty($tPickStartTime))? $tPickStartTime : "",
            'tPickEndTime'                      => (!empty($tPickEndTime))? $tPickEndTime : "",
            'tNightStartTime'                   => (!empty($tNightStartTime))? $tNightStartTime : "",
            'tNightEndTime'                     => (!empty($tNightEndTime))? $tNightEndTime : "",
            'iPersonSize'                       => (!empty($iPersonSize))? $iPersonSize : 0,
            'vLogo'                             => (!empty($vLogo))? $vLogo : "",
            'vLogo1'                            => (!empty($vLogo1))? $vLogo1 : "",
            'eType'                             => (!empty($eType))? $eType : "eType",
            'eIconType'                         => (!empty($eIconType))? $eIconType : "",
            'tMonPickStartTime'                 => (!empty($tMonPickStartTime))? $tMonPickStartTime : "",
            'tMonPickEndTime'                   => (!empty($tMonPickEndTime))? $tMonPickEndTime : "",
            'fMonPickUpPrice'                   => (!empty($fMonPickUpPrice))? $fMonPickUpPrice : "",
            'tTuePickStartTime'                 => (!empty($tTuePickStartTime))? $tTuePickStartTime : "",
            'tTuePickEndTime'                   => (!empty($tTuePickEndTime))? $tTuePickEndTime : "",
            'fTuePickUpPrice'                   => (!empty($fTuePickUpPrice))? $fTuePickUpPrice : "",
            'tWedPickStartTime'                 => (!empty($tWedPickStartTime))? $tWedPickStartTime : "",
            'tWedPickEndTime'                   => (!empty($tWedPickEndTime))? $tWedPickEndTime : "",
            'fWedPickUpPrice'                   => (!empty($fWedPickUpPrice))? $fWedPickUpPrice : "",
            'tThuPickStartTime'                 => (!empty($tThuPickStartTime))? $tThuPickStartTime : "",
            'tThuPickEndTime'                   => (!empty($tThuPickEndTime))? $tThuPickEndTime : "",
            'fThuPickUpPrice'                   => (!empty($fThuPickUpPrice))? $fThuPickUpPrice : "",
            'tFriPickStartTime'                 => (!empty($tFriPickStartTime))? $tFriPickStartTime : "",
            'tFriPickEndTime'                   => (!empty($tFriPickEndTime))? $tFriPickEndTime : "",
            'fFriPickUpPrice'                   => (!empty($fFriPickUpPrice))? $fFriPickUpPrice : "",
            'tSatPickStartTime'                 => (!empty($tSatPickStartTime))? $tSatPickStartTime : "",
            'tSatPickEndTime'                   => (!empty($tSatPickEndTime))? $tSatPickEndTime : "",
            'fSatPickUpPrice'                   => (!empty($fSatPickUpPrice))? $fSatPickUpPrice : "",
            'tSunPickStartTime'                 => (!empty($tSunPickStartTime))? $tSunPickStartTime : "",
            'tSunPickEndTime'                   => (!empty($tSunPickEndTime))? $tSunPickEndTime : "",
            'fSunPickUpPrice'                   => (!empty($fSunPickUpPrice))? $fSunPickUpPrice : "",
            'tNightSurgeData'                   => (!empty($tNightSurgeData))? $tNightSurgeData : "",
            'eAllowQty'                         => (!empty($eAllowQty))? $eAllowQty : "No",
            'iMaxQty'                           => (!empty($iMaxQty))? $iMaxQty : "",
            'fVisitFee'                         => (!empty($fVisitFee))? $fVisitFee : "",
            'fCancellationFare'                 => (!empty($fCancellationFare))? $fCancellationFare : "",
            'iCancellationTimeLimit'            => (!empty($iCancellationTimeLimit))? $iCancellationTimeLimit : "",
            'eStatus'                           => (!empty($eStatus))? $eStatus : "Active",
            'fWaitingFees'                      => (!empty($fWaitingFees))? $fWaitingFees : "",
            'iWaitingFeeTimeLimit'              => (!empty($iWaitingFeeTimeLimit))? $iWaitingFeeTimeLimit : "",
            'iDisplayOrder'                     => (!empty($iDisplayOrder))? $iDisplayOrder : "",
            'fRadius'                           => (!empty($fRadius))? $fRadius : "",
            'fDeliveryCharge'                   => (!empty($fDeliveryCharge))? $fDeliveryCharge : "",
            'fDeliveryChargeCancelOrder'        => (!empty($fDeliveryChargeCancelOrder))? $fDeliveryChargeCancelOrder : "",
            'fPoolPercentage'                   => (!empty($fPoolPercentage))? $fPoolPercentage : "",
            'ePoolStatus'                       => (!empty($ePoolStatus))? $ePoolStatus : "No",
            'fTripHoldFees'                     => (!empty($fTripHoldFees))? $fTripHoldFees : "",
            'tTypeDesc'                         => (!empty($tTypeDesc))? $tTypeDesc : "",
            'eDeliveryType'                     => (!empty($eDeliveryType))? $eDeliveryType : "",
            'fBufferAmount'                     => (!empty($fBufferAmount))? $fBufferAmount : "",
            'iBagSize'                          => (!empty($iBagSize))? $iBagSize : ""
        ];
        if($iVehicleTypeId == '') { // add
            $this->model->saveVehicleTypeDetails($array);
        } else { // update
            $this->model->updateVehicleTypeDetails($iVehicleTypeId, $array);
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
    public function deleteVehicleType() {
        $iVehicleTypeId = $this->request->getPost('iVehicleTypeId');
        if ($iVehicleTypeId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $this->model->deleteVehicleType($iVehicleTypeId);
        $result = [
            'type' => 'success',
            'message' => 'Record deleted successfully'
        ];
        return $this->response->setJSON($result);
    }
}
