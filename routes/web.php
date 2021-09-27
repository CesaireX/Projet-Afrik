<?php

use App\Http\Controllers\dossierController;
use App\Http\Controllers\appelController;
use App\Http\Controllers\cautionController;
use App\Http\Controllers\objetController;
use App\Http\Controllers\lotController;
use App\Http\Controllers\garantController;
use App\Http\Controllers\ligneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJsController;
use App\Models\garant;



Route::resource('dossier', dossierController::class);

Route::resource('appel', appelController::class);

Route::resource('objet', objetController::class);

Route::resource('lot', lotController::class);

Route::resource('ligne', ligneController::class);

Route::resource('caution', cautionController::class);

Route::resource('garant', garantController::class);




Route::get('/', function() {
    return redirect()->route('caution.prevenir');
});





Route::get('/showsuppress/{id}',[dossierController::class,'showsuppress'])->name('suppression');

Route::get('/choix_dossier',[dossierController::class,'choix_dossier'])->name('bilan.dossier');

Route::get('/bilan_par_dossier/{id}',[dossierController::class,'bilan_par_dossier'])->name('dossier.choisit');

Route::get('/impression_dossier/{id}',[dossierController::class,'impression_dossier'])->name('impression.dossier');

Route::get('/showsuppressD/{id}',[ligneController::class,'showsuppressD'])->name('suppressionD');

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

Route::get('/bilan_credit',[cautionController::class,'bilan_credit'])->name('bilan.credit');

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

Route::get('/impression_credit',[cautionController::class,'impression_credit'])->name('impression.credit');

Route::get('/impressionfin',[cautionController::class,'impressionfin'])->name('impression.fin');

Route::get('/interval',[cautionController::class,'interval'])->name('intervalle');

Route::get('/impressionintervalle/{date1}/{date2}/{choix}',[cautionController::class,'impressionintervalle'])->name('impression.intervalle');

Route::get('/editer/{id}/{secondaire}',[appelController::class,'editer'])->name('appel.editer');

Route::get('/verif/{id}/{secondaire}',[cautionController::class,'verif'])->name('appel.verif');

Route::get('/editerobjet/{id}/{secondaire}',[objetController::class,'editerobjet'])->name('objet.editer');

Route::get('/editerlot/{id}/{secondaire}',[lotController::class,'editerlot'])->name('lot.editer');

Route::get('/editercaution/{id}/{secondaire}/{duree}/{date}',[cautionController::class,'editercaution'])->name('caution.editer');

Route::get('/ligneafficher/{id}/{idobjet}',[cautionController::class,'ligneafficher'])->name('ligne.lister');

Route::get('/affichageligne/{id}/{idobjet}',[ligneController::class,'affichageligne'])->name('ligne.creer');

Route::get('/prolongement/{id}/{duree}/{date}',[cautionController::class,'prolongement'])->name('caution.prolonger');

Route::get('/detail_prolongement/{date}/{validite}/{id}/{nombre}',[cautionController::class,'detail_prolongement'])->name('detail.prolonger');

Route::get('/retourcaution/{id}',[ligneController::class,'retourcaution'])->name('caution.retour');

Route::get('/caution_ligne',[cautionController::class,'caution_ligne'])->name('caution.credit');

Route::get('/caution_sans_ligne',[cautionController::class,'caution_sans_ligne'])->name('caution.libre');

Route::get('/appel_update/{id}/{secondaire}',[appelController::class,'appel_update'])->name('appel.actualiser');

Route::get('/dossier_search',[dossierController::class,'dossier_search'])->name('recherche.dossier');
