<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PrescriptionController;

Route::get('/', [HomeController::class, 'index'])->name('home');

//Master Data Route
Route::get('/data-obat', [MasterDataController::class, 'listDataObat']);
Route::get('/data-signa', [MasterDataController::class, 'listDataSigna']);

//Receipt
Route::get('/new-receipt', [PrescriptionController::class, 'index']);
Route::get('/create-receipt/{id}', [PrescriptionController::class, 'createPrescription'])->name('createPrescription');
Route::post('/input-obat', [PrescriptionController::class, 'inputObat']);
Route::post('/save-prescription', [PrescriptionController::class, 'savePrescription']);
Route::get('/print-prescription/{id}', [PrescriptionController::class, 'printPrescription']);
Route::get('/receipt-history', [PrescriptionController::class, 'listPrescription']);
Route::delete('/data-obat-prescription/delete/{id}', [PrescriptionController::class, 'deleteDetailPrescription']);

Route::get('/create-racikan/{id}', [PrescriptionController::class, 'createRacikan']);
Route::get('/create-draft-racikan/{idPrescription}/{idRacikan}', [PrescriptionController::class, 'createDraftRacikan'])->name('createDraftRacikan');
Route::post('/input-racikan', [PrescriptionController::class, 'inputRacikan']);
Route::delete('/data-obat-racikan/delete/{id}', [PrescriptionController::class, 'deleteObatRacikan']);
Route::post('/save-racikan', [PrescriptionController::class, 'saveRacikan']);