<?php

use App\Http\Controllers\dossierController;
use App\Http\Controllers\appelController;
use App\Http\Controllers\cautionController;
use App\Http\Controllers\objetController;
use App\Http\Controllers\lotController;
use App\Http\Controllers\garantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJsController;
use App\Models\garant;

Route::resource('dossier', dossierController::class);

Route::resource('appel', appelController::class);

Route::resource('objet', objetController::class);

Route::resource('lot', lotController::class);

Route::resource('caution', cautionController::class);

Route::resource('garant', garantController::class);


Route::get('/', function() {
    return redirect()->route('caution.prevenir');
});

Route::get('/showsuppress/{id}',[dossierController::class,'showsuppress'])->name('suppression');

Route::get('/store2/{id}/{date}/{duree}',[garantController::class,'store2'])->name('garant.enregistrer');

Route::get('/showsuppressA/{id}',[appelController::class,'showsuppressA'])->name('suppressionA');

Route::get('/showsuppressB/{id}',[objetController::class,'showsuppressB'])->name('suppressionB');

Route::get('/showsuppressC/{id}',[lotController::class,'showsuppressC'])->name('suppressionC');

Route::get('/show2/{id}',[appelController::class,'show2'])->name('objet.lister');

Route::get('/creerobjet/{id}',[objetController::class,'creerobjet'])->name('objet.creation');

Route::get('/creerlot/{id}',[lotController::class,'creerlot'])->name('lot.creation');

Route::get('/creercaution/{id}/{date}/{duree}',[cautionController::class,'creercaution'])->name('caution.creation');

Route::get('/detailler/{date}/{validite}/{id}',[cautionController::class,'detailler'])->name('caution.verifier');

Route::get('/levercaution/{jour}/{date}/{id}',[cautionController::class,'levercaution'])->name('caution.lever');

Route::get('/message',[cautionController::class,'message'])->name('caution.prevenir');

Route::get('/bilanGeneral',[cautionController::class,'bilanGeneral'])->name('caution.bilanGeneral');

Route::get('/choixdate/{choix}',[cautionController::class,'choixdate'])->name('selection');

Route::get('/bilansoumission',[cautionController::class,'bilansoumission'])->name('caution.bilansoumission');

Route::get('/bilanrestitution',[cautionController::class,'bilanrestitution'])->name('caution.bilanrestitution');

Route::get('/bilanfin',[cautionController::class,'bilanfin'])->name('caution.bilanfin');

Route::get('/bilanretenue',[cautionController::class,'bilanretenue'])->name('caution.bilanretenue');

Route::get('/listecaution',[cautionController::class,'listecaution'])->name('liste.caution');

Route::get('/listedeslots',[lotController::class,'listedeslots'])->name('liste.lot');

Route::get('/listeobjet',[objetController::class,'listeobjet'])->name('liste.objet');

Route::get('/listeappel',[appelController::class,'listeappel'])->name('liste.appel');

Route::get('/impression',[cautionController::class,'impression'])->name('impression');

Route::get('/impressionsoumission',[cautionController::class,'impressionsoumission'])->name('impression.soumission');

Route::get('/impressionrestitution',[cautionController::class,'impressionrestitution'])->name('impression.restitution');

Route::get('/impressionretenue',[cautionController::class,'impressionretenue'])->name('impression.retenue');

Route::get('/impressionfin',[cautionController::class,'impressionfin'])->name('impression.fin');

Route::get('/interval',[cautionController::class,'interval'])->name('intervalle');

Route::get('/impressionintervalle/{date1}/{date2}/{choix}',[cautionController::class,'impressionintervalle'])->name('impression.intervalle');

Route::get('/editer/{id}/{secondaire}',[appelController::class,'editer'])->name('appel.editer');

Route::get('/verif/{id}/{secondaire}',[cautionController::class,'verif'])->name('appel.verif');

Route::get('/editerobjet/{id}/{secondaire}',[objetController::class,'editerobjet'])->name('objet.editer');

Route::get('/editerlot/{id}/{secondaire}',[lotController::class,'editerlot'])->name('lot.editer');

Route::get('/editercaution/{id}/{secondaire}/{duree}/{date}',[cautionController::class,'editercaution'])->name('caution.editer');
