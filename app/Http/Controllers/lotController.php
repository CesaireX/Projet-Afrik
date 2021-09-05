<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lot;
use App\Models\objet;
use App\Http\Controllers\Controller;
use App\Models\caution;

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
        $date=$lot->objet->appel->Date_Publication;
        $duree=$lot->objet->appel->Duree_Validite;
        return view('Caution.cautioncreer',compact('caution','lotcorrespondant','objetcorrespondant','date','duree'));
    }

    public function showsuppressC($id,caution $caution)
    {
        $lot= lot::where('id',$id)->first();
        $caution= $lot->caution;
        //dd($caution);
        $lotcorrespondant=lot::where('id',$id)->first();
        $objetcorrespondant=$lotcorrespondant->objet;
        $date=$lot->objet->appel->Date_Publication;
        $duree=$lot->objet->appel->Duree_Validite;
        $suppression='ok';
        return view('Caution.cautioncreer',compact('caution','lotcorrespondant','objetcorrespondant','date','suppression','duree'));
    }

    public function destroy($id)
    {
        $lot=lot::find($id);
         $lotencours=lot::where('id',$id)->first();
         $id2=$lotencours->objet->id;
         //dd($id2);
         $lot->delete ();
         return redirect()->route('suppressionB',[$id2])->with('message','supprimer');
    }

    public function listedeslots()
    {
        $lot=lot::all();
        return view('Liste.lots',compact('lot'));
    }

    public function editerlot($id,$secondaire)
    {
        $lot=lot::findOrFail($id);

        return view('Lot.editLot',compact('lot','secondaire'));
    }


    public function update(request $request,$id)
    {
        $validate=   $request->validate([
            'lot'=>'required'
            ]);

            lot::whereId($id)->update($validate);

            $id= $request->objet_id;
        $lot= lot::where('objet_id',$id)->first();
        $data=$lot->objet;
        $appel=$data->appel;
        $listelot=$data->lot;
        $modifier='ok';
        //dd($listeappel);
        return view('Lot/listelot',compact('listelot','data','modifier','appel'));
    }

}
