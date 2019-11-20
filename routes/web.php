<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Symfony\Component\Routing\Route;

Route::get('/', function () {return redirect('login');});
Auth::routes();
//Route::get('register', function (){abort(404);});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('travel_requests', 'TravelRequestController');
Route::resource('plans_requests', 'PlanRequestController');
Route::resource('plans_handheld', 'PlanHandheldController');
Route::resource('maintenance', 'MaintenanceController');
Route::resource('plans', 'PlanController');
Route::resource('operator', 'OperatorController');
Route::resource('devices', 'DeviceController');
Route::resource('vehicles', 'VehicleController');
Route::resource('probe', 'ProbeController');
Route::resource('transaction', 'TransactionController');
Route::resource('equipment', 'EquipmentController');
Route::resource('container', 'ContainerController');
Route::resource('DController', 'DCController');
Route::resource('datawarehouse', 'DatawarehouseController');
Route::get('device-search','DeviceController@search');
Route::get('equipment-search','EquipmentController@search');
Route::get('maintenance-search','MaintenanceController@search');
Route::get('plan-search','PlanController@search');
Route::get('plan_requests-search','PlanRequestController@search');
Route::get('probe-search','ProbeController@search');
Route::get('transaction-search','TransactionController@search');
Route::get('travel_requests-search','PlanRequestController@search');
Route::get('vehicle-search','VehicleController@search');
Route::get('datawarehouse-search','DatawarehouseController@search');