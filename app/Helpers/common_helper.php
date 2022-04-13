<?php

/**
 * @description The file containing common used functions in the project.
 */

function get($key)
{
    return filter_input(INPUT_GET, $key);
}
function post($key)
{
    return filter_input(INPUT_POST, $key);
}
function get_array($key)
{
    return filter_input(INPUT_GET, $key, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
}
function post_array($key)
{
    return filter_input(INPUT_POST, $key, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
}
function make_query()
{
    $q = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
    if ($q != '') {
        $q = preg_replace('/&sort-by=[a-zA-Z_-]+/', '', $q);
        $q = preg_replace('/&order=[a-zA-Z_-]+/', '', $q);
    } else {
        $q = '';
    }
    $q = trim($q, '&');
    return $q;
}
function check_sort($item, $q)
{
    $i = get('sort-by');
    $class = [
        'asc' => 'fa-sort-down',
        'desc' => 'fa-sort-up'
    ];
    $c = "fa-sort";
    $o = 'asc';
    $order = get('order');
    if ($item == $i) {
        if (array_key_exists($order, $class)) {
            $c = $class[$order];
        }
        if ($order == 'asc') {
            $o = 'desc';
        }
    }
    $a = [
        'link' => '?' . $q . '&sort-by=' . $item . '&order=' . $o,
        'class' => $c
    ];
    return (object) $a;
}
function status($key)
{
    $array = [
        'active' => 'Active',
        'in-active' => 'In-Active'
    ];
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return false;
}
function uiDate($date)
{
    if ($date != '') {
        return date('jS, M Y H:i a', strtotime($date));
    } else {
        return '';
    }
}
function pre($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function getSidebar($permissions) {
    $menu = [
        ['title' => 'Dashboard',
            'url' => 'admin/dashboard',
            "icon" => 'fa fa-car',
        ], [
            'title' => 'Admin',
            'url' => "javascript:void(0)",
            "icon" => "fa fa-user",
            "visible" => (in_array('view-admin',$permissions)),
            'children' => [
                [
                    'title' => 'Admin Users',
                    'url' => "admin/users",
                    "icon" => "nav-icon fa fa-user",
                    "active" => "Admin",
                ], [
                    'title' => 'Admin Groups',
                    'url' => "admin/groups",
                    "icon" => "nav-icon fa fa-users",
                    "active" => "AdminGroups",
                    "visible" => (in_array('view-admin',$permissions))
                ], [
                    'title' => 'Permissions',
                    'url' => "admin/permissions",
                    "icon" => "nav-icon fa fa-list",
                    "active" => "AdminPermmissions",
                    "visible" => (in_array('view-admin',$permissions))
                ],
            ],
        ], [
            'title' => "Rental Package",
            'url' => "admin/rentalPackage",
            "icon" => "fa fa-arrow-right",
            "active" => "Rental Package",
            "visible" => (in_array('view-admin',$permissions)),
        ], [
            'title' => "Company",
            'url' => "admin/company",
            "icon" => "fas fa-building",
            "active" => "Company",
            "visible" => (in_array('view-company',$permissions)),
        ],
        [
            'title' => "Driver",
            'url' => "admin/driver",
            "icon" => "fas fa-male",
            "active" => "Driver",
            "visible" => (in_array('view-providers',$permissions)),
        ], 
        [
            'title' => "Driver Vehicles",
            'url' => "admin/driverVehicles",
            "icon" => "fas fa-car",
            "active" => "driverVehicles",
            "visible" => (in_array('view-provider-taxis',$permissions)),
        ],
        [
            'title' => "Vehicle Type",
            'url' => "admin/vehicleType",
            "icon" => "fas fa-arrow-right",
            "active" => "Vehicle Type",
            "visible" => (in_array('view-vehicle-type',$permissions)),
        ], 
        [
            'title' => "Rider",
            'url' => "admin/rider",
            "icon" => "fas fa-arrow-right",
            "active" => "Rider",
            "visible" => (in_array('view-users',$permissions)),
        ],       
    ];
    return $menu;
}

function showMessage()
{
    $session = \Config\Services::session();
    if ($session->getFlashdata('type')) {
        if ($session->getFlashdata('type') == 'success') {
            echo '<div class="alert alert-success" role="alert">
            Record saved successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Error in while saving.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>';
        }
    }
}

?>