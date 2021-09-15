@extends('layouts.head')

@extends('layouts.body')

@section('content')


<h2 style="text-align: center">Liste de tout les objets de notre Entreprise</h2>
<br>
@if (!$objet->isEmpty())
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Code Objet </th>
        <th style="width: 50px;">Grand titre</th>
        <th width="50px">Action</th>
    </tr>

    @foreach ($objet as $objets)
    <tr>
            <td> Objet N-{{$objets->id}} </td>
            <td> {{$objets->titre}} -- {{$objets->appel->dossier->NomDossier}}</td>
            <td> <a class="btn btn-info" href="{{ route('objet.show',[$objets->id]) }}">lots</a></td>
    </tr>
    @endforeach
</table>
@else
<table class="table table-bordered">
    <tr>
        <th style="width: 150px; text-align: center">Liste des Objets</th>
    </tr>

    <tr><th><h3 style="text-align: center">Aucun Objet disponible </h3></th></tr>
</table>
@endif


{{ $objet->links('pagination::simple-tailwind') }}


@endsection
@extends('layouts.foot')
