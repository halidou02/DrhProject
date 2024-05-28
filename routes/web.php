<?php
use Illuminate\Support\Facades\Route;

//Dashboard Controller
use App\Http\Controllers\GrhDashboardController;
//route
Route::get('/dashboard/GrhDashboard', [GrhDashboardController::class, 'index'])->name('content.dashboard.GrhDashboard');

//Gestion Employe controlleur
use App\Http\Controllers\GrhEmployeAdd;
//route
Route::get('/app/grh/employe/add', [GrhEmployeAdd::class, 'create'])->name('employe.create');
Route::post('/app/grh/employe/add', [GrhEmployeAdd::class, 'store'])->name('employe.store');
Route::get('/app/grh/employe/list', [GrhEmployeAdd::class, 'index'])->name('employe.index');
Route::get('/app/grh/employe/{id}/edit', [GrhEmployeAdd::class, 'edit'])->name('employe.edit');
Route::put('/app/grh/employe/{id}', [GrhEmployeAdd::class, 'update'])->name('employe.update');
Route::delete('/app/grh/employe/{id}', [GrhEmployeAdd::class, 'destroy'])->name('employe.destroy');

//Gestion Departement controlleur
use App\Http\Controllers\GrhDepartementController;
//route
Route::get('/app/grh/departement/add', [GrhDepartementController::class, 'create'])->name('departement.create');
Route::post('/app/grh/departement/add', [GrhDepartementController::class, 'store'])->name('departement.store');
Route::get('/app/grh/departement/list', [GrhDepartementController::class, 'index'])->name('departement.index');
Route::get('/app/grh/departement/{id}/edit', [GrhDepartementController::class, 'edit'])->name('departement.edit');
Route::put('/app/grh/departement/{id}', [GrhDepartementController::class, 'update'])->name('departement.update');
Route::delete('/app/grh/departement/{id}', [GrhDepartementController::class, 'destroy'])->name('departement.destroy');

//Poste
use App\Http\Controllers\GrhPosteController;
Route::get('/app/grh/poste/add', [GrhPosteController::class, 'create'])->name('poste.create');
Route::post('/app/grh/poste/add', [GrhPosteController::class, 'store'])->name('poste.store');
Route::get('/app/grh/poste/list', [GrhPosteController::class, 'index'])->name('poste.index');
Route::get('/app/grh/poste/{id}/edit', [GrhPosteController::class, 'edit'])->name('poste.edit');
Route::put('/app/grh/poste/{id}', [GrhPosteController::class, 'update'])->name('poste.update');
Route::delete('/app/grh/poste/{id}', [GrhPosteController::class, 'destroy'])->name('poste.destroy');

//salaire
use App\Http\Controllers\HistoriquesalaireController;

Route::get('/app/grh/historiquesalaire/add', [HistoriquesalaireController::class, 'create'])->name('historiquesalaire.create');
Route::post('/app/grh/historiquesalaire/add', [HistoriquesalaireController::class, 'store'])->name('historiquesalaire.store');
Route::get('/app/grh/historiquesalaire/list', [HistoriquesalaireController::class, 'index'])->name('historiquesalaire.index');
Route::get('/app/grh/historiquesalaire/{id}/edit', [HistoriquesalaireController::class, 'edit'])->name('historiquesalaire.edit');
Route::put('/app/grh/historiquesalaire/{id}', [HistoriquesalaireController::class, 'update'])->name('historiquesalaire.update');
Route::delete('/app/grh/historiquesalaire/{id}', [HistoriquesalaireController::class, 'destroy'])->name('historiquesalaire.destroy');

//conge
use App\Http\Controllers\GrhCongeController;

Route::get('/app/grh/conge/add', [GrhCongeController::class, 'create'])->name('conge.create');
Route::post('/app/grh/conge/add', [GrhCongeController::class, 'store'])->name('conge.store');
Route::get('/app/grh/conge/list', [GrhCongeController::class, 'index'])->name('conge.index');
Route::get('/app/grh/conge/{id}/edit', [GrhCongeController::class, 'edit'])->name('conge.edit');
Route::put('/app/grh/conge/{id}', [GrhCongeController::class, 'update'])->name('conge.update');
Route::delete('/app/grh/conge/{id}', [GrhCongeController::class, 'destroy'])->name('conge.destroy');
Route::post('/app/grh/conge/{id}/approve', [GrhCongeController::class, 'approve'])->name('conge.approve');
Route::post('/app/grh/conge/{id}/cancel', [GrhCongeController::class, 'cancel'])->name('conge.cancel');
use App\Http\Controllers\CongeController;

Route::get('/app/grh/conge/add', [CongeController::class, 'create'])->name('conge.create');
Route::post('/app/grh/conge/add', [CongeController::class, 'store'])->name('conge.store');
Route::get('/app/grh/conge/list', [CongeController::class, 'index'])->name('conge.index');
Route::get('/app/grh/conge/{id}/edit', [CongeController::class, 'edit'])->name('conge.edit');
Route::put('/app/grh/conge/{id}', [CongeController::class, 'update'])->name('conge.update');
Route::delete('/app/grh/conge/{id}', [CongeController::class, 'destroy'])->name('conge.destroy');
Route::put('/app/grh/conge/{id}/approve', [CongeController::class, 'approve'])->name('conge.approve');
Route::put('/app/grh/conge/{id}/reject', [CongeController::class, 'reject'])->name('conge.reject');
Route::put('/app/grh/conge/{id}/cancel', [CongeController::class, 'cancel'])->name('conge.cancel');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
