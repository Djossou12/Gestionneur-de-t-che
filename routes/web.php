<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth', 'verified'])->group(function () {
    // Routes Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Routes Projets
    Route::resource('projets', ProjetController::class)
        ->except(['destroy']);

    // Routes Tâches
    Route::post('/projets/{projet}/taches', [TacheController::class, 'store'])
        ->name('taches.store');
    Route::put('/taches/{tache}', [TacheController::class, 'update'])
        ->name('taches.update');

    // Routes Admin (uniquement accessibles aux admins)
    Route::middleware(['can:admin'])->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])
            ->name('admin.users');
    });
});