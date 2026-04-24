<?php

use App\Http\Controllers\BizumController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ProfileController;
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

    // Rutes del client
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');

    // Rutes dels comptes
    Route::get('/compte/{compte}', [CompteController::class, 'show'])->name('compte.show');

    // Rutes del Bizum
    Route::get('/bizum/create', [BizumController::class, 'create'])->name('bizum.create');
    Route::post('/bizum', [BizumController::class, 'store'])->name('bizum.store');
});

require __DIR__ . '/auth.php';
