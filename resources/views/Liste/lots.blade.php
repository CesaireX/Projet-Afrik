@extends('layouts.head')

@extends('layouts.body')

@section('content')


<h2 style="text-align: center">Liste de tout les lots de notre Entreprise</h2>
<br>
@if (!$lot->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Lots</th>
        <th style="width: 50px">Details</th>
    </tr>

    @foreach ($lot as $lots)
    <tr>
            <td>Lot N-{{$lots->lot}} -- {{$lots->objet->titre}} -- {{$lots->objet->appel->dossier->NomDossier}}</td>
            <td> <a class="btn btn-info" href="{{ route('lot.show',[$lots->id]) }}">Cautions</a></td>
    </tr>
    @endforeach
</table>
@else
<table class="table table-bordered">
    <tr>
        <th style="width: 150px; text-align: center">Liste des Lots</th>
    </tr>

    <tr><th><h3 style="text-align: center">Aucun Lot disponible </h3></th></tr>
</table>
@endif

{{ $lot->links('pagination::simple-tailwind') }}

@endsection
@extends('layouts.foot')
