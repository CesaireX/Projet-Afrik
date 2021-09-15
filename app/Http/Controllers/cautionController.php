<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\ConsoleEvents;
use Fx3costa\LaravelChartJs\Providers\ChartjsServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\type_caution;
use App\Models\garant;
use App\Models\caution;
use App\Models\lot;
use App\Models\appel;
use App\Models\dossier;
use App\Models\objet;
use App\Models\ligne;
use DateTime;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Adapter\PDFLib;

class cautionController extends Controller
{
    public function creercaution(request $request, $id, $date, $duree)
    {

        $caution= type_caution::all();
        $garant=garant::all();

        return view('Caution.cautioncreate',compact('id','caution','date','duree','garant'));
    }



    public function store(request $request)
    {
        $request->validate([

            'Montant'=>'required',
            'Garant'=>'required',
            'Type_Caution'=>'required',
            'Duree_Validite'=>'required',
            'Date_Soumission'=>'required',
            'lot_id'=>'required'

        ]);

      caution::create($request->all());

      $id= $request->lot_id;
      //dd($id);
      $caution= caution::where('lot_id',$id)->first();
      $data=$caution->lot;
      $objet=$data->objet;
      $date=$objet->appel->Date_Publication;
      $listecaution=$data->caution;
      $duree=$objet->appel->Duree_Validite;
      $ligne=ligne::all();
      $message='ok';
      //dd($listeobjet);
      return view('Caution/listecaution',compact('listecaution','data','objet','message','date','duree','ligne'));
    }




    public function detailler($date,$validite,$id)
    {
        $olddate=$date;
        $date=new DateTime('today');
        //dd($validite);

        $date1= date("Y-m-d", strtotime($olddate."+$validite days"));

        $d2=new DateTime($date1);
        $diff=now()->diffInDays($d2);

        //dd($diff);

        //$jours=$diff->days;

        //dd($diff);

        if($diff>$validite && $validite!=0)
        {
            $donnees= "EXPIREE";

            $request=new request();

            $request=DB::table('cautions')->Where('id',$id)
            ->update(['Status' =>$donnees,
                'Duree_Validite' => 0
                ]);

        }

        $jours=$diff;

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
       ->update(['Status' =>$donnee,
                'Duree_Validite' => 0
                ]);

       //dd($request);

      $lot= $caution->lot;
      $objet=$lot->objet;
      $appel=$objet->appel;
      $dossier=$appel->dossier;
      $message2='ok';
      return view('Caution.detailcaution2',compact('date1','caution','lot','objet','appel','dossier','jours','message2'));

    }





    public function message()
    {

        $date=new DateTime('today');
        $date1= date("Y-m-d", strtotime('Date_effet'."+'Duree_Validite' days"));

        $caution= caution::all();
        $cautionnumber= caution::all()->count();
        $lot= lot::all()->count();
        $objet= objet::all()->count();
        $appel=appel::all()->count();
        $dossier=dossier::all()->count();
        $cautionencours= caution::where('Status',0)->count();

        $caution2=caution::all()->count();
        $cautionactuelle= caution::where('Status',0)->count();
        $cautionexpiree= caution::where('Status',"EXPIREE")->count();
        //dd($cautionexpiree);
        $cautionrestante=$caution2-$cautionactuelle;
        //dd($cautionactuelle);

        return view('Terme',compact('date','date1','caution','lot','objet','appel','dossier','cautionnumber','cautionencours'))->with('caution2',json_encode($caution2,JSON_NUMERIC_CHECK))->with('cautionactuelle',json_encode($cautionactuelle,JSON_NUMERIC_CHECK))->with('cautionrestante',json_encode($cautionrestante,JSON_NUMERIC_CHECK))->with('cautionexpiree',json_encode($cautionexpiree,JSON_NUMERIC_CHECK));
        //$d2=new DateTime($date1);
        //$diff=$date->diff($d2);
        //$jours=$diff->days;
    }


    public function bilanGeneral()
    {
        $dossier=dossier::all();
        $appel=appel::all();
        $objet=objet::all();
        $lot=lot::all();
        $caution=caution::all();
        $ligne=ligne::all();

        //dd($dossier);
        return view('Bilan.bilanGeneral',compact('dossier','objet','appel','lot','caution','ligne'));

    }



    public function bilansoumission()
    {
        $type="Caution de soumission";
        $caution=caution::where('Type_Caution','=',$type)->get();
        //dd($caution);

        return view('Bilan.bilansoumission',compact('caution'));

    }



    public function bilanrestitution()
    {
        $type="Caution de restitution d'acompte";
        $caution=caution::where('Type_Caution','=',$type)->get();
        //dd($caution);

        return view('Bilan.bilanrestitution',compact('caution'));

    }



    public function bilanfin()
    {
        $type="Caution de bonne fin";
        $caution=caution::where('Type_Caution','=',$type)->get();
        //dd($caution);

        return view('Bilan.bilanfin',compact('caution'));

    }



    public function bilanretenue()
    {
        $type="Caution de retenue de garantie";
        $caution=caution::where('Type_Caution','=',$type)->get();
        //dd($caution);

        return view('Bilan.bilanretenue',compact('caution'));

    }




    public function choixdate($choix)
    {
        return view('bilanInterval',compact('choix'));
    }



    public function impression()
    {
        $dossier=dossier::all();
        $appel=appel::all();
        $objet=objet::all();
        $lot=lot::all();
        $caution=caution::all();
        $nombre=caution::all()->count();
        $ligne=ligne::all();

        $date2=Carbon::now();
        $date2->toRfc850String();
        $date=$date2;
        $pdf= PDF::loadView('Impression.bilanImpression',compact('dossier','objet','appel','lot','caution','date','nombre','ligne'))
        ->setPaper('a3', 'landscape')
        ->setWarnings(false);
        return $pdf->stream();
    }

    public function impressionsoumission()
    {

        $type="Caution de soumission";
        $caution=caution::where('Type_Caution','=',$type)->get();
        $nombre=caution::where('Type_Caution','=',$type)->get()->count();

        $date2=Carbon::now();
        $date2->toRfc850String();
        $date=$date2;

        $pdf= PDF::loadView('Impression.soumissionImpression',compact('caution','date','nombre'))
        ->setPaper('a3', 'portrait')
        ->setWarnings(false);
        return $pdf->stream();
    }



    public function impressionrestitution()
    {

        $type="Caution de restitution d'acompte";
        $caution=caution::where('Type_Caution','=',$type)->get();
        $nombre=caution::where('Type_Caution','=',$type)->get()->count();

        $date2=Carbon::now();
        $date2->toRfc850String();
        $date=$date2;

        $pdf= PDF::loadView('Impression.restitutionImpression',compact('caution','date','nombre'))
        ->setPaper('a3', 'portrait')
        ->setWarnings(false);
        return $pdf->stream();
    }




    public function impressionfin()
    {

        $type="Caution de bonne fin";
        $caution=caution::where('Type_Caution','=',$type)->get();
        $nombre=caution::where('Type_Caution','=',$type)->get()->count();

        $date2=Carbon::now();
        $date2->toRfc850String();
        $date=$date2;

        $pdf= PDF::loadView('Impression.finImpression',compact('caution','date','nombre'))
        ->setPaper('a3', 'portrait')
        ->setWarnings(false);
        return $pdf->stream();
    }




    public function impressionretenue()
    {

        $type="Caution de retenue de garantie";
        $caution=caution::where('Type_Caution','=',$type)->get();
        $nombre=caution::where('Type_Caution','=',$type)->get()->count();

        $date2=Carbon::now();
        $date2->toRfc850String();
        $date=$date2;

        $pdf= PDF::loadView('Impression.retenueImpression',compact('caution','date','nombre'))
        ->setPaper('a3', 'portrait')
        ->setWarnings(false);
        return $pdf->stream();
    }




    public function impressionintervalle($date1,$date2,$choix)
    {
        $dateactuelle=Carbon::now();
        $dateactuelle->toRfc850String();
        $date=$dateactuelle;


       if($choix==" GENERAL  ")
       {
        $type="OK";
        $caution = caution::whereBetween('Date_Soumission',[$date1,$date2])->get();
        $nombre= caution::whereBetween('Date_Soumission',[$date1,$date2])->get()->count();
        }

        if($choix==" SOUMISSION  ")
        {
         $type="Caution de soumission";
         $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
         $verif->whereBetween('Date_Soumission',[$date1,$date2]);
        })->get();

        $nombre=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
            $verif->whereBetween('Date_Soumission',[$date1,$date2]);
           })->get()->count();
        }


        if($choix==" RESTITUTION  ")

        {
         $type="Caution de restitution d'acompte";
         $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
         $verif->whereBetween('Date_Soumission',[$date1,$date2]);
        })->get();

        $nombre=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
            $verif->whereBetween('Date_Soumission',[$date1,$date2]);
           })->get()->count();
        }


        if($choix==" FIN  ")
       {
         $type="Caution de bonne fin";
         $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
         $verif->whereBetween('Date_Soumission',[$date1,$date2]);
        })->get();

        $nombre=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
            $verif->whereBetween('Date_Soumission',[$date1,$date2]);
           })->get()->count();
       }


        if($choix==" RETENUE  ")
       {
         $type="Caution de retenue de garantie";
         $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
         $verif->whereBetween('Date_Soumission',[$date1,$date2]);
        })->get();

        $nombre=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
            $verif->whereBetween('Date_Soumission',[$date1,$date2]);
           })->get()->count();
       }

        $pdf= PDF::loadView('Impression.intervalleImpression',compact('caution','date1','date2','date','type','nombre'))
        ->setPaper('a3', 'portrait')
        ->setWarnings(false);
        return $pdf->stream();
    }




    public function destroy($id)
    {
        $caution=caution::find($id);
        $cautionencours=caution::where('id',$id)->first();
        $id2=$cautionencours->lot->id;
        //dd($id2);
        $caution->delete ();
        return redirect()->route('suppressionC',[$id2])->with('message','supprimer');
    }



    public function listecaution()
    {
        $caution=caution::latest()->paginate(5);
        $ligne=ligne::all();
        return view('Liste.cautions',compact('caution','ligne'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }




    public function interval()
    {

       $date1= $_GET ['date1'];
       $date2= $_GET ['date2'];
       $choix=$_GET['choix'];

       //dd($choix);

       if($choix==" GENERAL  "){
       $type="OK";
       $caution = caution::whereBetween('Date_Soumission',[$date1,$date2])->get();
       }

       if($choix==" SOUMISSION  ")
       {
        $type="Caution de soumission";
        $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
        $verif->whereBetween('Date_Soumission',[$date1,$date2]);
       })->get();
       }

       if($choix==" RESTITUTION  ")

       {
        $type="Caution de restitution d'acompte";
        $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
        $verif->whereBetween('Date_Soumission',[$date1,$date2]);
       })->get();
       }


       if($choix==" FIN  ")
      {
        $type="Caution de bonne fin";
        $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
        $verif->whereBetween('Date_Soumission',[$date1,$date2]);
       })->get();
      }


       if($choix==" RETENUE  ")
      {
        $type="Caution de retenue de garantie";
        $caution=caution::where('Type_Caution','=',$type)->where(function ($verif) use ($date1,$date2){
        $verif->whereBetween('Date_Soumission',[$date1,$date2]);
       })->get();
      }
       //dd($caution);

       return view('Bilan.afficherInterval',compact('caution','date1','date2','type','choix'));
    }




    public function verif($id,$secondaire)
    {
        $caution=caution::all();
        $count=0;
        foreach($caution as $cautions)
        {
            if($cautions->lot->objet->appel->id==$id)
            {
               $count++;
               $identifiant=$cautions->lot->objet->appel->dossier->id;
            }
        }
        //dd($count);

        if($count==0){
            return redirect()->route('appel.editer',[$id,$secondaire]);
        }
        else
        {
            $interdiction='ok';
            //dd($identifiant);

            $dossierx=dossier::where('id',$identifiant)->first();
            $appel=$dossierx->appel;
            //dd($appel);

            //dd($dossierx);
            return view('Appel.appelcreer',compact('appel','dossierx','interdiction'));
        }
    }





    public function editercaution($id,$secondaire,$duree,$date)
    {
        $cautiontrouvee=caution::findOrFail($id);
        $caution= type_caution::all();
        $garant=garant::all();
        return view('Caution.editCaution',compact('cautiontrouvee','caution','secondaire','date','duree','id','garant'));
    }





    public function update(request $request, $id)
    {
        $validate=  $request->validate([

            'Montant'=>'required',
            'Garant'=>'required',
            'Type_Caution'=>'required',
            'Duree_Validite'=>'required',
            'Date_Soumission'=>'required',
            'lot_id'=>'required',
            'Date_effet'=>'required'

                                        ]);

            caution::whereId($id)->update($validate);

            $id= $request->lot_id;
            //dd($id);
            $caution= caution::where('lot_id',$id)->first();
            $data=$caution->lot;
            $objet=$data->objet;
            $date=$objet->appel->Date_Publication;
            $listecaution=$data->caution;
            $duree=$objet->appel->Duree_Validite;
            $modifier='ok';

            return view('Caution/listecaution',compact('listecaution','data','objet','modifier','date','duree'));


    }


    public function ligneafficher($id,$idobjet)
    {

        $lot=lot::where('id',$idobjet)->first();
        $garant=garant::all();
        //dd($ligne);
        $caution=caution::where('id',$id)->first();
        $ligne= $caution->ligne;
        return view('Ligne.afficherligner',compact('ligne','caution','lot','garant'));
    }

    public function prolongement($id,$duree,$date)
    {
       $nombre=$_GET["Duree_Validite"];

       //dd($nombre);

       $request=new Request();

       $request=DB::table('cautions')->Where('id',$id)->increment('Duree_Validite',$nombre);

       $request2=new Request();

       $request2=caution::where('id',$id)->first();

       //dd($request2->Duree_Validite);

       $newduree=$request2->Duree_Validite;

       return redirect()->route('detail.prolonger',[$date,$newduree,$id]);

       //dd($request);
    }

    public function detail_prolongement($date,$validite,$id)
    {
        $olddate=$date;
        $date=new DateTime('today');

        $date1= date("Y-m-d", strtotime($olddate."+$validite days"));

        $d2=new DateTime($date1);
        $diff=now()->diffInDays($d2);

        if($diff>$validite && $validite!=0)
        {
            $donnees= "EXPIREE";

            $request=new request();

            $request=DB::table('cautions')->Where('id',$id)
            ->update(['Status' =>$donnees,
                'Duree_Validite' => 0
                ]);
        }

        $jours=$diff;

        $caution= caution::where('id',$id)->first();
        $lot= $caution->lot;
        $objet=$lot->objet;
        $appel=$objet->appel;
        $dossier=$appel->dossier;
        $prolonger='ok';

        return view('Caution.detailcaution3',compact('date1','caution','lot','objet','appel','dossier','jours','prolonger'));
    }
}
