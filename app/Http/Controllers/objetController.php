<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appel;
use App\Http\Controllers\Controller;
use App\Models\objet;
use App\Models\lot;

class objetController extends Controller
{
    public function creerobjet($id)
    {

        if( session()->has('message'))
        {
            $refus="ok";
           return view('Objet/objetcreate',compact('id','refus'));
        }

        else
        {
        return view('Objet.objetcreate',compact('id'));
        }

    }

    public function store(request $request)
    {


        if($test=objet::where('titre',$request->titre)->first())
        {
            $refus="refus";
            //dd($refus);
        }
        else{
            $accord="accord";
            //dd($accord);
        }

        if(isset($accord))
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

    if(isset($refus))
    {
    return redirect()->route('objet.creation',[$request->appel_id])->with('message','impossible');
    }

    }

    public function destroy($id)
    {
        $objet=objet::find($id);
        $objetencours=objet::where('id',$id)->first();
        $id2=$objetencours->appel->id;
        //dd($id2);
        $objet->delete ();
        return redirect()->route('suppressionA',[$id2])->with('message','supprimer');
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

    public function showsuppressB($id,lot $lot)
    {
    $objet= objet::where('id',$id)->first();
    $lot= $objet->lot;
    //dd($objet);

    if( session()->has('message'))
    {
       //dd(session()->get('message'));
       $ok=session()->get('message');
    }

    $objetcorrespondant=objet::where('id',$id)->first();
    $appelcorrespondant=$objetcorrespondant->appel;
    if(isset($ok))
    {
    $suppression='ok';
    return view('Lot.lotcreer',compact('lot','appelcorrespondant','objetcorrespondant','suppression'));
    }
    else
    {
    return view('Lot.lotcreer',compact('lot','appelcorrespondant','objetcorrespondant'));
    }
    }

    public function listeobjet()
    {
        $objet=objet::latest()->paginate(5);
        return view('Liste.objets',compact('objet'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function editerobjet($id,$secondaire)
    {
        $objet=objet::findOrFail($id);

        return view('Objet.editObjet',compact('objet','secondaire'));
    }

    public function update(request $request,$id)
    {
        $validate=  $request->validate([

            'titre'=>'required','appel_id'=>'required',

        ]);

            objet::whereId($id)->update($validate);

            $identifiant=$request->appel_id;
            $objet=objet::where('appel_id',$identifiant)->first();

            $data=$objet->appel;
            $dossier=$data->dossier;
            $listeobjet=$data->objet;
            $modifier='ok';
            //dd($listeobjet);
            return view('Objet/listeobjet',compact('listeobjet','data','dossier','modifier'));
    }

}
