<?php

use App\Http\Controllers\Masters\ServiceController;
use App\Http\Controllers\Masters\ProductTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Masters\CustomerController;
use App\Http\Controllers\Masters\EmployeeMasterController;
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
Route::put('/user_management/update/{id}', [UserManagementController::class, 'updateMenus'])->name('user_management.update_user');
Route::get('/user_management/user_permission/{id}', [UserManagementController::class, 'permission'])->name('user_management.user_permission');
Route::get('/user_management/change_password/{id}', [UserManagementController::class, 'password'])->name('user_management.change_password');
Route::put('/user_management/update_password/{id}', [UserManagementController::class, 'updatePassword'])->name('user_management.update_password');
Route::delete('/user_management/delete/{id}', [UserManagementController::class, 'delete'])->name('user_management.delete');
Route::get('/user_management/fetch_user_menus', [UserManagementController::class, 'fetch_user_menus'])->name('user_management.fetch_user_menus');
Route::get('/user_management/export_users', [UserManagementController::class, 'export'])->name('user_management.export_users');


Route::resource('/customer', CustomerController::class);
Route::get('/get_states/{country_id}', [CustomerController::class, 'state'])->name('get_states');
Route::get('/get_cities/{state_id}', [CustomerController::class, 'city'])->name('get_cities');
Route::post('/customer/deactivate/{id}', [CustomerController::class, 'deactivate'])->name('customer.deactivate');
Route::post('/customer/activate/{id}', [CustomerController::class, 'activate'])->name('customer.activate');





Route::resource('/services', ServiceController::class);
// Route::get('/service/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/service/store-monthly', [ServiceController::class, 'storeMonthly'])->name('services.storeMonthly');
Route::post('/service/store-quarterly', [ServiceController::class, 'storeQuarterly'])->name('services.storeQuarterly');
Route::post('/service/store-biannually', [ServiceController::class, 'storeBiAnnually'])->name('services.storeBiAnnually');
Route::post('/service/store-annually', [ServiceController::class, 'storeAnnually'])->name('services.storeAnnually');
Route::post('/services/store-OneTime', [ServiceController::class, 'storeOneTime'])->name('services.storeOneTime');

Route::put('/service/update-monthly/{id}', [ServiceController::class, 'updateMonthly'])->name('services.updateMonthly');
Route::put('/service/update-quarterly,{id}', [ServiceController::class, 'updateQuarterly'])->name('services.updateQuarterly');
Route::put('/service/update-biannually,{id}', [ServiceController::class, 'updateBiAnnually'])->name('services.updateBiAnnually');
Route::put('/service/update-annually,{id}', [ServiceController::class, 'updateAnnually'])->name('services.updateAnnually');
Route::put('/services/update-OneTime,{id}', [ServiceController::class, 'storeOneTime'])->name('services.updateOneTime');


Route::get('/product_type', [ProductTypeController::class, 'index'])->name('product_type.index');
// Route::post('/product_type/store', [ProductTypeController::class, 'store'])->name('product_type.store');
// Route::get('/product_type/create', [ProductTypeController::class, 'create'])->name('product_type.create');
// Route::get('/product_type/edit/{id}', [ProductTypeController::class, 'edit'])->name('product_type.edit');
// Route::put('/product_type/update/{id}', [ProductTypeController::class, 'update'])->name('product_type.update');
// Route::delete('/product_type/destroy/{id}', [ProductTypeController::class, 'destroy'])->name('product_type.destroy');