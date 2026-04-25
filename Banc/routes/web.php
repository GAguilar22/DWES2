<?php

use App\Http\Controllers\BizumController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutes del client, comptes i bizum
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/compte/{compte}', [CompteController::class, 'show'])->name('compte.show');
    Route::patch('/compte/{compte}', [CompteController::class, 'update'])->name('compte.update');
    Route::get('/bizum/create', [BizumController::class, 'create'])->name('bizum.create');
    Route::post('/bizum', [BizumController::class, 'store'])->name('bizum.store');

    // Rutes d'Admin amb Middleware 
    Route::middleware('esAdmin')->group(function () {
        Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/clients/{client}', [\App\Http\Controllers\AdminController::class, 'showClient'])->name('admin.clients.show');
        Route::get('/admin/clients/{client}/edit', [\App\Http\Controllers\AdminController::class, 'editClient'])->name('admin.clients.edit');
        Route::put('/admin/clients/{client}', [\App\Http\Controllers\AdminController::class, 'updateClient'])->name('admin.clients.update');
        Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy'])->name('admin.clients.destroy');
        Route::delete('/admin/comptes/{id}', [CompteController::class, 'destroy'])->name('admin.comptes.destroy');
        Route::get('/admin/comptes/{id}', [\App\Http\Controllers\AdminController::class, 'showCompte'])->name('admin.comptes.show');
        Route::get('/admin/comptes/{id}/edit', [\App\Http\Controllers\AdminController::class, 'editCompte'])->name('admin.comptes.edit');
        Route::put('/admin/comptes/{id}', [\App\Http\Controllers\AdminController::class, 'adminCompteUpdate'])->name('admin.comptes.update');
        Route::delete('/admin/bizums/{id}', [BizumController::class, 'destroy'])->name('admin.bizums.destroy');
        Route::get('/admin/tipus/{id}/edit', [TipusController::class, 'edit'])->name('admin.tipus.edit');
        Route::put('/admin/tipus/{id}', [TipusController::class, 'update'])->name('admin.tipus.update');
        Route::delete('/admin/tipus/{id}', [TipusController::class, 'destroy'])->name('admin.tipus.destroy');
    });
});

require __DIR__ . '/auth.php';
