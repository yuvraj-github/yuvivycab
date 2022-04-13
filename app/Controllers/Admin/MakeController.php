<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VehModel;

class MakeController extends BaseController
{
    public $vehicleModel;
    public function __construct()
    {
        $this->vehicleModel = new VehModel();
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
    public function getModels()
    {
        $iMakeId = $this->request->getPost('iMakeId');
        if ($iMakeId == '') {
            $result = [
                'type' => 'error',
                'message' => 'Invalid Request!'
            ];
            return $this->response->setJSON($result);
        }
        $models = $this->vehicleModel->getAllModel($iMakeId);
        $html = "<option value=''>CHOOSE MODEL</option>";
        foreach ($models as $key => $val) {
            $html .= "<option value=" . $val->iModelId . ">" . $val->vTitle . "</option>";
        }
        return $this->response->setJSON(array('type' => 'success', 'models' => $html));
    }
}
