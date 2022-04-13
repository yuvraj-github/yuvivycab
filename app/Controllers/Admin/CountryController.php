<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StateModel;
use App\Models\CountryModel;

class CountryController extends BaseController
{
    public $state;
    public $country;
    public function __construct()
    {
        $this->state = new StateModel();
        $this->country = new CountryModel();
    }

    public function index()
    {
        //fetchCountries.
    }
    /**
     * Function to fetch states associated with the country.
     *
     * @return JSON
     */
    public function getStates()
    {
        $vCountryCode = $this->request->getPost('vCountryCode');
        if ($vCountryCode == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $states = $this->state->getAllActiveStates($vCountryCode);
        $phoneCode = $this->country->getPhoneCode($vCountryCode);
        $stateHtml = "<option value=''>Select</option>";
        foreach ($states as $key => $val) {
            $stateHtml .= "<option value=" . $val->iStateId . ">" . $val->vState . "</option>";
        }
        return $this->response->setJSON(array('type' => 'success', 'states' => $stateHtml, 'phoneCode' => $phoneCode->vPhoneCode));
    }
}
