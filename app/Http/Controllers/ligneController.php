<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lot;
use App\Models\objet;
use App\Http\Controllers\Controller;
use App\Models\caution;
use App\Models\ligne;
use App\Models\garant;
class ligneController extends Controller
{
    public function affichageligne($id,$lot)
    {
        $lotcorrespondant=lot::where('id',$lot)->first();
        $garant=garant::all();
        return view('Ligne.creerligne',compact('id','garant','lotcorrespondant'));
    }

    public function store(request $request)
    {
        $request->validate([
            'Garant'=>'required'
            ]);

            ligne::create($request->all());

            $id=$request->caution_id;
            //dd($id);

            $data=caution::where('id',$id)->first();
            $ligne=$data->ligne;
            //dd($ligne);

            //dd($data);
            $lot=$data->lot;
            $objet=$lot->objet;
            $ligneajoutee='ok';
            //dd($listeappel);
            return view('Ligne/listeligne',compact('lot','objet','data','ligneajoutee','ligne'));
    }

    public function destroy($id)
    {
        $ligne=ligne::find($id);
        $ligneactuelle=ligne::where('id',$id)->first();
        $id2=$ligneactuelle->caution->id;
        //dd($id2);
        $ligne->delete();
        $accord="ok";
        return redirect()->route('suppressionD',[$id2])->with('message','supprimer');
    }

    public function showsuppressD($id)
    {
        $caution= caution::where('id',$id)->first();
        $ligne= $caution->ligne;
        $lot=$caution->lot;

        if( session()->has('message'))
        {
           //dd(session()->get('message'));
           $ok=session()->get('message');
        }

        if(isset($ok))
        {
        //dd($objet);
        $suppression='ok';
        return view('Ligne.afficherligner',compact('lot','ligne','caution','suppression'));
        }
        else{
        return view('Ligne.afficherligner',compact('lot','ligne','caution'));
        }
    }

    public function retourcaution($id)
    {
        $lot= lot::where('id',$id)->first();
        $caution= $lot->caution;
        //dd($caution);
        $lotcorrespondant=lot::where('id',$id)->first();
        $objetcorrespondant=$lotcorrespondant->objet;
        $date=$lot->objet->appel->Date_Publication;
        $duree=$lot->objet->appel->Duree_Validite;
        $ligne=ligne::all();
        return view('Caution.cautioncreer',compact('caution','lotcorrespondant','objetcorrespondant','date','duree','ligne'));
    }

}
