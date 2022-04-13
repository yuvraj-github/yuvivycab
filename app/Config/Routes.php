<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->group('admin', function($routes) {
    $routes->get('/','Admin\Dashboard');
    $routes->get('login','Admin\Login');
    $routes->post('login/loginUser', 'Admin\Login::loginUser');
    $routes->get('dashboard','Admin\Dashboard');
    $routes->post('login/logout', 'Admin\Login::logout');

    //Groups
    $routes->get('groups','Admin\Groups::index');
    $routes->post('groups/deleteGroup', 'Admin\Groups::deleteGroup');
    $routes->get('groups/showAddGroupsForm', 'Admin\Groups::showAddGroupsForm');
    $routes->post('groups/saveGroupDetails','Admin\Groups::saveGroupDetails');

    //Permissions
    $routes->post('permissions/saveGroupPermissionMapping', 'Admin\Permissions::saveGroupPermissionMapping');

    // Users
    $routes->get('users','Admin\Users::index');
    $routes->post('users/deleteUser', 'Admin\Users::deleteUser');
    $routes->get('users/showAddUsersForm', 'Admin\Users::showAddUsersForm');
    $routes->post('users/saveUserDetails','Admin\Users::saveUserDetails');
    
    //Company
    $routes->get('company','Admin\CompanyController::index');
    $routes->get('company/add','Admin\CompanyController::addCompany');
    $routes->post('company/saveCompany','Admin\CompanyController::saveCompany');
    $routes->post('company/updateCompanyStatus','Admin\CompanyController::updateCompanyStatus');
    $routes->post('company/deleteCompany','Admin\CompanyController::deleteCompany');
    $routes->get('company/document','Admin\CompanyController::showDocuments');
    $routes->post('company/saveDoc','Admin\CompanyController::saveDoc');
    $routes->post('company/fetchDocModal','Admin\CompanyController::fetchDocModal');
    $routes->post('company/getDrivers','Admin\CompanyController::getDrivers');
    $routes->get('company/edit','Admin\CompanyController::addCompany');

    //Country
    $routes->post('country/getStates','Admin\CountryController::getStates');

    //State
    $routes->post('state/getAllCities','Admin\StateController::getAllCities');

    // Rental Package
    $routes->get('rentalPackage','Admin\RentalPackage::index');
    $routes->post('rentalPackage/saveRentalPackage','Admin\RentalPackage::saveRentalPackage');
    $routes->post('rentalPackage/deleteRentalPackage', 'Admin\RentalPackage::deleteRentalPackage');

    // Vehicle Type
    $routes->get('vehicleType','Admin\VehicleType::index');
    $routes->post('vehicleTypes/saveVehicleType', 'Admin\VehicleType::saveVehicleType');
    $routes->post('vehicleTypes/deleteVehicleType', 'Admin\VehicleType::deleteVehicleType');

    //Driver
    $routes->get('driver','Admin\DriverController::index');
    $routes->get('driver/add','Admin\DriverController::addDriver');
    $routes->post('driver/save','Admin\DriverController::save');
    $routes->post('driver/updateStatus','Admin\DriverController::updateStatus');
    $routes->post('driver/fetchWalletModal','Admin\DriverController::fetchWalletModal');
    $routes->post('driver/saveWalletBalance','Admin\DriverController::saveWalletBalance');
    $routes->post('driver/deleteRecord','Admin\DriverController::deleteRecord');
    $routes->get('driver/edit','Admin\DriverController::addDriver');
    $routes->get('driver/document','Admin\DriverController::showDocuments');
    $routes->post('driver/fetchDocModal','Admin\DriverController::fetchDocModal');
    $routes->post('driver/saveDoc','Admin\DriverController::saveDoc');
    $routes->post('driver/updateMarkFavourite','Admin\DriverController::updateMarkFavourite');
    $routes->get('driver/exportRecord','Admin\DriverController::exportRecord');

    // Rider
    $routes->get('rider','Admin\Rider::index');

    // Driver Vehicles
    $routes->get('driverVehicles','Admin\DriverVehiclesController::index');
    $routes->get('driverVehicles/add','Admin\DriverVehiclesController::add');
    $routes->post('driverVehicles/save','Admin\DriverVehiclesController::save');
    $routes->get('driverVehicles/edit','Admin\DriverVehiclesController::add');

    // Make
    $routes->post('make/getModels','Admin\MakeController::getModels');

    // Rider
    $routes->post('rider/showAddRiderForm', 'Admin\Rider::showAddRiderForm');
    $routes->post('rider/save','Admin\Rider::save');
    $routes->post('rider/changeStatus','Admin\Rider::changeStatus');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
