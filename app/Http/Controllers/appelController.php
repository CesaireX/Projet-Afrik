<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appel;
use App\Models\dossier;
use App\Models\objet;
use App\Models\lot;
use App\Models\caution;

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

  public function destroy($id)
    {
         $appel=appel::find($id);
         $apelencours=appel::where('id',$id)->first();
         $id2=$apelencours->dossier->id;
         //dd($id2);
         $appel->delete ();
         return redirect()->route('suppression',[$id2])->with('message','supprimer');
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


    public function showsuppressA($id, objet $objet )
{
    $appel= appel::where('id',$id)->first();
    $objet= $appel->objet;
    //dd($objet);
    $appelcorrespondant=appel::where('id',$id)->first();
    $dossiercorrespondant=$appelcorrespondant->dossier;
    $suppression='ok';
    return view('Objet.objetcreer',compact('objet','appelcorrespondant','dossiercorrespondant','suppression'));
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

    public function listeappel()
    {
        $appel=appel::latest()->paginate(5);
        return view('Liste.appels',compact('appel'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function editer($id,$secondaire)
    {
        $appel=appel::findOrFail($id);

        return view('Appel.editAppel',compact('appel','secondaire'));
    }

    public function update(request $request, $id)
    {
        $validate= $request->validate([

            'Duree_Validite'=>'required',
            'Date_Publication'=>'required',
            'dossier_id'=>'required'

        ]);

            appel::whereId($id)->update($validate);

            $identifiant= $request->dossier_id;
            $appel= appel::where('dossier_id',$identifiant)->first();
            //dd($appel);
            $data=$appel->dossier;
            $listeappel=$data->appel;
            $modifier='ok';
            //dd($listeappel);
            return view('Appel/appelafficher',compact('listeappel','data','modifier'));
    }
}
