<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;


Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->middleware('can:dashboard.access')
            ->name('dashboard');
        Route::resource('users', UserController::class)->middleware('can:users.access');;
        Route::resource('roles', RoleController::class)->middleware('can:roles.access');
        Route::resource('permissions', PermissionController::class)->only(['index'])->middleware('can:permissions.access');
    });


require __DIR__ . '/auth.php';