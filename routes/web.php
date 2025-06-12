<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HubController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MaintenanceController;

Auth::routes();

Route::get('/', [HubController::class, 'index'])->name('home');

Route::resource('hubs', HubController::class)->only(['index', 'show']);

Route::get('/bicycles/maintenance', [BicycleController::class, 'forMaintenance'])
    ->name('bicycles.maintenance')
    ->middleware('auth');

Route::post('/bicycles/{bicycle}/maintenance', [MaintenanceController::class, 'updateStatus'])
    ->name('bicycles.maintenance.update')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/bicycles/{bicycle}/reserve', [ReservationController::class, 'create'])
        ->name('bicycles.reserve');
    Route::post('/reservations/{bicycle}', [ReservationController::class, 'store'])
    ->name('reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])
        ->name('reservations.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
