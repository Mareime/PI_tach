<?php

use App\Http\Controllers\comptcontroller;

use App\Http\Controllers\beneficiaireController;
use Illuminate\Support\Facades\Route;
use App\Exports\ComptesExport;
use App\Exports\BeneficiairesExport;
use App\Imports\ComptesImport;
use Maatwebsite\Excel\Facades\Excel;
Route::get('/', function () {
    return view('welcome');
});

// Exportation des comptes
Route::get('comptes/export', [ComptController::class, 'export'])->name('compte.export');
Route::get('beneficiaire/export', [beneficiaireController::class, 'export'])->name('beneficiaire.export');

// Importation des comptes
Route::post('comptes/import', [comptcontroller::class, 'import'])->name('compte.import');
Route::post('beneficiaire/import', [beneficiaireController::class, 'import'])->name('beneficiaire.import');

Route::get('/comptes', [comptcontroller::class, 'index'])->name('compte.index');
Route::get('/comptes/create', [comptcontroller::class, 'create'])->name('compte.create');
Route::post('/comptes', [comptcontroller::class, 'store'])->name('compte.store');
Route::get('/comptes/{compte}/edit', [comptcontroller::class, 'edit'])->name('compte.edit');
Route::put('/comptes/{compte}', [comptcontroller::class, 'update'])->name('compte.update');
Route::delete('/comptes/{compte}', [comptcontroller::class, 'destroy'])->name('compte.destroy');
// pour la table beneficaire
Route::get('/beneficiaires', [beneficiaireController::class, 'index'])->name('beneficiaire.index');
Route::get('/beneficiaires/create', [beneficiaireController::class, 'create'])->name('beneficiaire.create');
Route::post('/beneficiaires', [beneficiaireController::class, 'store'])->name('beneficiaire.store');
Route::get('/beneficiaires/{beneficiaire}/edit', [beneficiaireController::class, 'edit'])->name('beneficiaire.edit');
Route::put('/beneficiaires/{beneficiaire}', [beneficiaireController::class, 'update'])->name('beneficiaire.update');
Route::delete('/beneficiaires/{beneficiaire}', [beneficiaireController::class, 'destroy'])->name('beneficiaire.destroy');
