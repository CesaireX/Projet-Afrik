<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\type_caution;
use App\Models\caution;
use DateTime;

class cautionController extends Controller
{
    public function creercaution(request $request, $id)
    {
        $caution= type_caution::all();
        //dd($caution);

        return view('Caution.cautioncreate',compact('id','caution'));
    }

    public function store(request $request)
    {
        $request->validate([


        ]);

      caution::create($request->all());

      $id= $request->lot_id;
      //dd($id);
      $caution= caution::where('lot_id',$id)->first();
      $data=$caution->lot;
      $objet=$data->objet;
      $listecaution=$data->caution;
      $message='ok';
      //dd($listeobjet);
      return view('Caution/listecaution',compact('listecaution','data','objet','message'));
    }

    public function detailler($date,$validite,$id)
    {
        $olddate=$date;
        $date=new DateTime('today');
        //dd($validite);

        $date1= date("Y-m-d", strtotime($olddate."+$validite days"));

        $d2=new DateTime($date1);
        $diff=$date->diff($d2);
        $jours=$diff->days;
        //dd($diff);

        //dd($date1);

        $caution= caution::where('id',$id)->first();
        $lot= $caution->lot;
        $objet=$lot->objet;
        $appel=$objet->appel;
        $dossier=$appel->dossier;

        //dd($dossier);

        return view('Caution.detailcaution',compact('date1','caution','lot','objet','appel','dossier','jours'));
    }

    public function levercaution($jour,$date,$id)
    {
      $jours=$jour;
      $date1=$date;

       $caution= caution::where('id',$id)->first();
       $donnee= "MAIN LEVEE";
       $request=new request();

       $request=DB::table('cautions')->Where('id',$id)
       ->update(['Status' =>$donnee]);

       //dd($request);

      $lot= $caution->lot;
      $objet=$lot->objet;
      $appel=$objet->appel;
      $dossier=$appel->dossier;
      $message2='ok';
      return view('Caution.detailcaution',compact('date1','caution','lot','objet','appel','dossier','jours','message2'));

    }

}
