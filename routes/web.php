<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/gst_tasks', [DashboardController::class, 'gst_tasks'])->name('dashboard.gst_tasks');


Route::prefix('/master')->group(__DIR__ . '/masters.php');
