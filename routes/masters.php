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
Route::get('/customer/edit', [CustomerController::class, 'edit'])->name('customer.edit');

Route::resource('/service', ServiceController::class);
// Route::get('/service/edit', [ServiceController::class, 'edit'])->name('customer.edit');


Route::get('/product_type', [ProductTypeController::class, 'index'])->name('product_type.index');
// Route::post('/product_type/store', [ProductTypeController::class, 'store'])->name('product_type.store');
// Route::get('/product_type/create', [ProductTypeController::class, 'create'])->name('product_type.create');
// Route::get('/product_type/edit/{id}', [ProductTypeController::class, 'edit'])->name('product_type.edit');
// Route::put('/product_type/update/{id}', [ProductTypeController::class, 'update'])->name('product_type.update');
// Route::delete('/product_type/destroy/{id}', [ProductTypeController::class, 'destroy'])->name('product_type.destroy');