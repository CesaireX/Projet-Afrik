<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appel;
use App\Http\Controllers\Controller;
use App\Models\objet;

class objetController extends Controller
{
    public function creerobjet($id)
    {
        return view('Objet.objetcreate',compact('id'));
    }

    public function store(request $request)
    {
        $request->validate([

            'titre'=>'required','appel_id'=>'required'

        ]);

      objet::create($request->all());

      $id= $request->appel_id;
      //dd($id);
      $objet= objet::where('appel_id',$id)->first();
      $data=$objet->appel;
      $dossier=$data->dossier;
      $listeobjet=$data->objet;
      $message='ok';
      //dd($listeobjet);
      return view('Objet/listeobjet',compact('listeobjet','data','dossier','message'));
    }

    public function create()
    {

    }

    public function show($id)
    {
    $objet= objet::where('id',$id)->first();
    $lot= $objet->lot;
    //dd($objet);
    $objetcorrespondant=objet::where('id',$id)->first();
    $appelcorrespondant=$objetcorrespondant->appel;
    return view('Lot.lotcreer',compact('lot','appelcorrespondant','objetcorrespondant'));
    }
}
