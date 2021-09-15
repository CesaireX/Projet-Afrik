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
}
