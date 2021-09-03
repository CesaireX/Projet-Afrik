<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\garant;

class garantController extends Controller
{
    public function index()
    {
        $garant=garant::all();
        return view('Garant.listegarant',compact('garant'));
    }


    public function create()
    {
        return view('Garant.garantcreate');
    }

    public function store(request $request)
    {
        $request -> validate([

            'garant'=>'required',

        ]);

        garant::create($request->all());

        $garant=garant::all();
        $validation='ok';
        return view('Garant.listegarant',compact('garant','validation'));
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
}
