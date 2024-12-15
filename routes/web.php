<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'LoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/tasks/{type}', [DashboardController::class, 'tasks'])->name('dashboard.tasks');
    Route::post('/update-task-status', [DashboardController::class, 'updateStatus'])->name('update.task.status');
});

Route::prefix('/master')->middleware('auth')->group(__DIR__ . '/masters.php');