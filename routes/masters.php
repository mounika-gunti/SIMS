<?php

use App\Http\Controllers\Masters\ServiceController;
use App\Http\Controllers\Masters\ProductTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Masters\CustomerController;
use App\Http\Controllers\Masters\EmployeeMasterController;
use App\Http\Controllers\masters\ReportController;
use App\Http\Controllers\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/employee_master', EmployeeMasterController::class);
Route::post('/employee_master/deactivate/{id}', [EmployeeMasterController::class, 'deactivate'])->name('employee_master.deactivate');
Route::post('/employee_master/activate/{id}', [EmployeeMasterController::class, 'active'])->name('employee_master.activate');


Route::get('/user_management', [UserManagementController::class, 'index'])->name('user_management.index');
Route::get('/user_management/create', [UserManagementController::class, 'create'])->name('user_management.create');
Route::get('/user_management/view/{id}', [UserManagementController::class, 'view'])->name('user_management.view');
Route::post('/user_management/store', [UserManagementController::class, 'store'])->name('user_management.store');


Route::get('/user_management/manage_user', [UserManagementController::class, 'manage'])->name('user_management.manage_user');
Route::get('/user_management/edit_user/{id}', [UserManagementController::class, 'edit_user'])->name('user_management.edit_user');
Route::put('/user_management/update_user/{id}', [UserManagementController::class, 'update_user'])->name('user_management.update_user');
Route::post('/user_management/update/{id}', [UserManagementController::class, 'updateMenus'])->name('user_management.update_menus');
Route::get('/user_management/user_permission/{id}', [UserManagementController::class, 'permission'])->name('user_management.user_permission');
Route::get('/user_management/change_password/{id}', [UserManagementController::class, 'password'])->name('user_management.change_password');
Route::put('/user_management/update_password/{id}', [UserManagementController::class, 'updatePassword'])->name('user_management.update_password');

Route::get('/user_management/fetch_user_menus', [UserManagementController::class, 'fetch_user_menus'])->name('user_management.fetch_user_menus');
Route::get('/user_management/export_users', [UserManagementController::class, 'export'])->name('user_management.export_users');

Route::put('/user/deactivate/{id}', [UserManagementController::class, 'deactivate'])->name('user.deactivate');
Route::put('/user/activate/{id}', [UserManagementController::class, 'active'])->name('user.activate');


Route::resource('/customer', CustomerController::class);
Route::get('/states/{id}', [CustomerController::class, 'getStates'])->name('get_states');
Route::get('/cities/{id}', [CustomerController::class, 'getCities'])->name('get_cities');

Route::post('/customer/deactivate/{id}', [CustomerController::class, 'deactivate'])->name('customer.deactivate');
Route::post('/customer/activate/{id}', [CustomerController::class, 'activate'])->name('customer.activate');


Route::resource('/services', ServiceController::class);
Route::post('/service/store-monthly', [ServiceController::class, 'storeMonthly'])->name('services.storeMonthly');
Route::post('/service/store-quarterly', [ServiceController::class, 'storeQuarterly'])->name('services.storeQuarterly');
Route::post('/service/store-biannually', [ServiceController::class, 'storeBiAnnually'])->name('services.storeBiAnnually');
Route::post('/service/store-annually', [ServiceController::class, 'storeAnnually'])->name('services.storeAnnually');
Route::post('/services/store-OneTime', [ServiceController::class, 'storeOneTime'])->name('services.storeOneTime');


Route::post('/service/update-monthly/{id}', [ServiceController::class, 'updateMonthly'])->name('services.updateMonthly');
Route::post('/service/update-quarterly/{id}', [ServiceController::class, 'updateQuarterly'])->name('services.updateQuarterly');
Route::post('/service/update-biannually/{id}', [ServiceController::class, 'updateBiAnnually'])->name('services.updateBiAnnually');
Route::post('/service/update-annually/{id}', [ServiceController::class, 'updateAnnually'])->name('services.updateAnnually');
Route::post('/service/update-onetime/{id}', [ServiceController::class, 'updateOneTime'])->name('services.updateOneTime');


Route::put('/service/deactivate/{id}', [ServiceController::class, 'deactivate'])->name('service.deactivate');
Route::put('/service/activate/{id}', [ServiceController::class, 'active'])->name('service.activate');

Route::get('/reports/completed', [ReportController::class, 'completed'])->name('reports.completed');
Route::get('/reports/non_completed', [ReportController::class, 'non_completed'])->name('reports.non_completed');
Route::get('/reports', [ReportController::class, 'export'])->name('reports.export');