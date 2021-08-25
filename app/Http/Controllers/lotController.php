<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lot;
use App\Http\Controllers\Controller;

class lotController extends Controller
{
    public function creerlot($id)
    {
        return view('Lot/lotcreate',compact('id'));
    }

    public function store(request $request)
    {
        $request->validate([
        'lot'=>'required'
        ]);

        lot::create($request->all());

        $id= $request->objet_id;
        $lot= lot::where('objet_id',$id)->first();
        $data=$lot->objet;
        $appel=$data->appel;
        $listelot=$data->lot;
        $message='ok';
        //dd($listeappel);
        return view('Lot/listelot',compact('listelot','data','message','appel'));
    }

    public function show($id)
    {
        $lot= lot::where('id',$id)->first();
        $caution= $lot->caution;
        //dd($caution);
        $lotcorrespondant=lot::where('id',$id)->first();
        $objetcorrespondant=$lotcorrespondant->objet;
        return view('Caution.cautioncreer',compact('caution','lotcorrespondant','objetcorrespondant'));
    }
}
