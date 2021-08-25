<?php

use App\Http\Controllers\dossierController;
use App\Http\Controllers\appelController;
use App\Http\Controllers\cautionController;
use App\Http\Controllers\objetController;
use App\Http\Controllers\lotController;
use App\Models\appel;
use Illuminate\Support\Facades\Route;



Route::resource('dossier', dossierController::class);

Route::resource('appel', appelController::class);

Route::resource('objet', objetController::class);

Route::resource('lot', lotController::class);

Route::resource('caution', cautionController::class);

Route::resource('', dossierController::class);

Route::get('/show2/{id}',[appelController::class,'show2'])->name('objet.lister');

Route::get('/creerobjet/{id}',[objetController::class,'creerobjet'])->name('objet.creation');

Route::get('/creerlot/{id}',[lotController::class,'creerlot'])->name('lot.creation');

Route::get('/creercaution/{id}',[cautionController::class,'creercaution'])->name('caution.creation');

Route::get('/detailler/{date}/{validite}/{id}',[cautionController::class,'detailler'])->name('caution.verifier');

Route::get('/levercaution/{jour}/{date}/{id}',[cautionController::class,'levercaution'])->name('caution.lever');
