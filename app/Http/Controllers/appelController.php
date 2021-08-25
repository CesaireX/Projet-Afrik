<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appel;
use App\Models\objet;
use App\Http\Controllers\Controller;

class appelController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @param \App\Models\appel @appel
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    public function creer(int $id){

        return view('Appel.createAppel',compact('id'));

    }

     public function show($id)
    {

        return view('Appel.createAppel',compact('id'));

    }

    public function show2(int $id)
{
    $appel= appel::where('id',$id)->first();
    $objet= $appel->objet;
    //dd($objet);
    $appelcorrespondant=appel::where('id',$id)->first();
    $dossiercorrespondant=$appelcorrespondant->dossier;
    return view('Objet.objetcreer',compact('objet','appelcorrespondant','dossiercorrespondant'));
}
     /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('Appel.createAppel',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Models\appel @appel
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param $validate
     */
    public function store(Request $request)
    {
        $request->validate([

            'Duree_Validite'=>'required',
            'Date_Publication'=>'required',
            'dossier_id'=>'required'

        ]);

        appel::create($request->all());

      $id= $request->dossier_id;
      $appel= appel::where('dossier_id',$id)->first();
      $data=$appel->dossier;
      $listeappel=$data->appel;
      $message='ok';
      //dd($listeappel);
      return view('Appel/appelafficher',compact('listeappel','data','message'));
    }

}
