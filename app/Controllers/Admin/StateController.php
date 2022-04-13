<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CityModel;

class StateController extends BaseController
{
    public $city;
    public function __construct()
    {
        $this->city = new CityModel();
    }

    public function index()
    {
        //fetchCountries.
    }
    /**
     * Function to fetch cities associated with the state.
     *
     * @return JSON
     */
    public function getAllCities()
    {
        $iStateId = $this->request->getPost('iStateId');
        if ($iStateId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $cities = $this->city->getAllActiveCities($iStateId);
        $cityHtml = "<option value=''>Select</option>";
        foreach ($cities as $key => $val) {
            $cityHtml .= "<option value=" . $val->iCityId . ">" . $val->vCity . "</option>";
        }
        return $this->response->setJSON(array('type' => 'success', 'cities' => $cityHtml));
    }
}
