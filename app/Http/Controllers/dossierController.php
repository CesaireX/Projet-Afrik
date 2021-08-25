<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\appel;
use App\Models\dossier;


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
   /**
     * @return \Illuminate\Http\Response
     */

public function show(appel $appel,$id)
{
    $dossier= dossier::where('id',$id)->first();
   // dd($dossier);
    $appel= $dossier->appel;
    $dossierx=dossier::where('id',$id)->first();
    return view('Appel.appelcreer',compact('appel','dossierx'));
  }

    public function create()
    {
        return view('Dossier/createDossier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'NomDossier'=>'required'
        ]);

        dossier::create($request->all());

        return redirect()->route('dossier.index')

        ->with('success','valider');
    }


}
