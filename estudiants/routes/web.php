<?php

use App\Http\Controllers\EstudiantsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('estudiants.index');
});

Route::get('/estudiants', [EstudiantsController::class, 'index'])->name('estudiants.index');
Route::get('/estudiants/create', [EstudiantsController::class, 'create'])->name('estudiants.create');
Route::post('/estudiants/store', [EstudiantsController::class, 'store'])->name('estudiants.store');
Route::get('/estudiants/show/{id}', [EstudiantsController::class, 'show'])->name('estudiants.show');
Route::get('/estudiants/edit/{id}', [EstudiantsController::class, 'edit'])->name('estudiants.edit');
Route::put('/estudiants/update/{id}', [EstudiantsController::class, 'update'])->name('estudiants.update');
Route::get('/estudiants/destroy/{id}', [EstudiantsController::class, 'destroy'])->name('estudiants.destroy');
