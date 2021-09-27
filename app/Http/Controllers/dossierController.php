<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\appel;
use App\Models\dossier;
use App\Models\objet;
use App\Models\lot;
use App\Models\caution;
use App\Models\ligne;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
class dossierController extends Controller
{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = dossier::latest()->paginate(5);

        return view('Acceuil',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('success','valider');
    }
    public function choix_dossier()
    {
        $appel=appel::all();
        $objet=objet::all();
        $lot=lot::all();
        $caution=caution::all();
        $data = dossier::latest()->paginate(5);

        return view('Dossier.choixdossier',compact('data','appel','objet','lot','caution'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function bilan_par_dossier($id)
    {
        $appel=appel::all();
        $objet=objet::all();
        $lot=lot::all();
        $caution=caution::all();
        $dossier=dossier::where('id',$id)->first();
        return view('Bilan.bilandossier',compact('dossier','appel','objet','lot','caution'));
    }

    public function impression_dossier($id)
    {
        $appel=appel::all();
        $objet=objet::all();
        $lot=lot::all();
        $caution=caution::all();
        $dossier=dossier::where('id',$id)->first();
        $ligne=ligne::all();


        $date2=Carbon::now();
        $date2->toRfc850String();
        $date=$date2;

        $pdf= PDF::loadView('Impression.dossierimpression',compact('dossier','appel','objet','lot','caution','date','ligne'))
        ->setPaper('a4', 'landscape')
        ->setWarnings(false)
        ->setOption("footer-right", "Page [page] / [topage]");
        return $pdf->stream();

    }

   /**
     * @return \Illuminate\Http\Response
     */


     public function show(appel $appel,$id)
     {
    $dossier= dossier::where('id',$id)->first();
   // dd($dossier);
    $appel= $dossier->appel;
   // dd($appel);
    $dossierx=dossier::where('id',$id)->first();
    return view('Appel.appelcreer',compact('appel','dossierx'));
    }

    public function showsuppress(appel $appel,$id)
    {
   $dossier= dossier::where('id',$id)->first();
   // dd($dossier);

   if( session()->has('message'))
   {
      //dd(session()->get('message'));
      $ok=session()->get('message');
   }

   $appel= $dossier->appel;
   $dossierx=dossier::where('id',$id)->first();
   if(isset($ok))
   {
   $suppression='ok';
   return view('Appel.appelcreer',compact('appel','dossierx','suppression'));
   }
   else
   {
   return view('Appel.appelcreer',compact('appel','dossierx'));
   }
   }


    public function create()
    {
        if( session()->has('message'))
        {
            $refus="ok";
           return view('Dossier/createDossier',compact('refus'));
        }
        else
        {
        return view('Dossier/createDossier');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($test=dossier::where('NomDossier',$request->NomDossier)->first())
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
        'NomDossier'=>'required'
        ]);

        dossier::create($request->all());

        return redirect()->route('dossier.index')

        ->with('success','valider');
        }
        if(isset($refus))
        {
        return redirect()->route('dossier.create')->with('message','impossible');
        }
    }

    public function destroy($id)
    {
         $dossier=dossier::find($id);
         $dossier->delete ();
         return redirect()->route('dossier.index')->with('delete','supprimer');
    }

    public function edit($id)
    {
        $dossier=dossier::findOrFail($id);

        return view('Dossier.editDossier',compact('dossier'));
    }

    public function update(request $request, $id)
    {
        $validate=$request->validate([
            'NomDossier'=>'required'
            ]);

            dossier::whereId($id)->update($validate);

            $data = dossier::latest()->paginate(5);
            $modifier='ok';
            return view('Acceuil',compact('data','modifier'))
                ->with('i', (request()->input('page', 1) - 1) * 5)
                ->with('modifier','valider');
    }

    public function dossier_search()
    {
        $recherche=request()->input('recherche');
        //dd($recherche);

        $dossier=dossier::where('NomDossier','like',"%$recherche%")->paginate(6);

        return view('Dossier.search',compact('dossier'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

}
