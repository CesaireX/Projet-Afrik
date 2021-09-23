<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\garant;

class garantController extends Controller
{
    public function index()
    {
        if( session()->has('message'))
    {
       $ok=session()->get('message');
    }

    if(isset($ok))
    {
    $supprimer="ok";
    $garant=garant::latest()->paginate(5);
    return view('Garant.listegarant',compact('garant','supprimer'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    else
    {
        $garant=garant::latest()->paginate(5);
        return view('Garant.listegarant',compact('garant'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    }


    public function create()
    {
        if( session()->has('message'))
        {
            $refus="ok";
           return view('Garant/garantcreate',compact('refus'));
        }
        else
        {
        return view('Garant/garantcreate');
        }
    }

    public function store(request $request)
    {

        if($test=garant::where('garant',$request->garant)->first())
        {
            $refus="refus";
            //dd($refus);
        }
        else
        {
            $accord="accord";
            //dd($accord);
        }
        if(isset($accord))
        {
        $request -> validate([

            'garant'=>'required',

        ]);

        garant::create($request->all());

        $garant=garant::all();

        $validate="ok";
        $garant=garant::latest()->paginate(5);
        return view('Garant.listegarant',compact('garant','validate'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        if(isset($refus))
        {
            return redirect()->route('garant.create')->with('message','impossible');        }
        }

    public function store2(request $request,$id,$date,$duree)
    {
        $request -> validate([

            'garant'=>'required',

        ]);

        garant::create($request->all());

        return redirect()->route('caution.creation',[$id,$date,$duree]);
    }

    public function destroy($id)
    {
        $garant=garant::find($id);
        $garant->delete ();
        return redirect()->route('garant.index')->with('message','supprimé');
    }

    public function edit($id)
    {
        $garant=garant::findOrFail($id);

        return view('Garant.editGarant',compact('garant'));
    }


    public function update(request $request,$id)
    {
            $validate=$request->validate([
            'garant'=>'required'
            ]);

            garant::whereId($id)->update($validate);

            $garant=garant::latest()->paginate(5);
            $modifier='ok';
            return view('Garant.listegarant',compact('garant','modifier'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('modifier','valider');

    }
}
