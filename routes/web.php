<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminPetController;
use App\Http\Controllers\OwnerPetController;
use App\Http\Controllers\CaregiverDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/dashboard', [ClientDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/dashboard/mis-perros', [OwnerPetController::class, 'index'])
    ->middleware('auth')
    ->name('owner.pets');

Route::post('/dashboard/mis-perros', [OwnerPetController::class, 'store'])
    ->middleware('auth')
    ->name('owner.pets.store');

Route::get('/dashboard/mis-perros/{mascota}', [OwnerPetController::class, 'show'])
    ->middleware('auth')
    ->name('owner.pets.show');

Route::get('/dashboard/mis-perros/{mascota}/edit', [OwnerPetController::class, 'edit'])
    ->middleware('auth')
    ->name('owner.pets.edit');

Route::put('/dashboard/mis-perros/{mascota}', [OwnerPetController::class, 'update'])
    ->middleware('auth')
    ->name('owner.pets.update');

Route::delete('/dashboard/mis-perros/{mascota}', [OwnerPetController::class, 'destroy'])
    ->middleware('auth')
    ->name('owner.pets.destroy');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/users', [AdminUserController::class, 'index'])
        ->name('admin.users');

    Route::get('/admin/services', [AdminServiceController::class, 'index'])
        ->name('admin.services');

    Route::get('/admin/pets', [AdminPetController::class, 'index'])
        ->name('admin.pets');

    Route::post('/admin/pets', [AdminPetController::class, 'store'])
        ->name('admin.pets.store');

    Route::put('/admin/pets/{mascota}', [AdminPetController::class, 'update'])
        ->name('admin.pets.update');

    Route::delete('/admin/pets/{mascota}', [AdminPetController::class, 'destroy'])
        ->name('admin.pets.destroy');

    Route::post('/admin/services', [AdminServiceController::class, 'store'])
        ->name('admin.services.store');

    Route::put('/admin/services/{servicio}', [AdminServiceController::class, 'update'])
        ->name('admin.services.update');

    Route::delete('/admin/services/{servicio}', [AdminServiceController::class, 'destroy'])
        ->name('admin.services.destroy');

    Route::patch('/admin/services/{servicio}/toggle-active', [AdminServiceController::class, 'toggleActive'])
        ->name('admin.services.toggleActive');

    Route::post('/admin/users', [AdminUserController::class, 'store'])
        ->name('admin.users.store');

    Route::post('/admin/users/assign-role', [AdminUserController::class, 'assignRole'])
        ->name('admin.users.assignRole');

    Route::get('/admin/settings', [AdminSettingsController::class, 'index'])
        ->name('admin.settings');

    Route::post('/admin/settings', [AdminSettingsController::class, 'update'])
        ->name('admin.settings.update');
});

Route::get('/cuidador/dashboard', [CaregiverDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('cuidador.dashboard');
