<?php

declare(strict_types=1);

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

Route::middleware(['auth', 'verified'])->prefix('bitacora')->name('bitacora.')->group(function () {
    Route::get('/', [BitacoraController::class, 'index'])->name('index');
    Route::get('/create', [BitacoraController::class, 'create'])->name('create');
    Route::post('/', [BitacoraController::class, 'store'])->name('store');
    Route::get('/{bitacora}/edit', [BitacoraController::class, 'edit'])->name('edit');
    Route::patch('/{bitacora}', [BitacoraController::class, 'update'])->name('update');
    // TODO: add route to generate the report
});

require __DIR__.'/auth.php';
