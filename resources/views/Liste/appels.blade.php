@extends('layouts.head')

@extends('layouts.body')

@section('content')


<h2 style="text-align: center">Liste de tout les Appels de notre Entreprise</h2>
<br>
@if (!$appel->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Code Appel </th>
        <th style="width: 50px;">date de publication</th>
        <th width="50px">Duree de validite</th>
        <th width="50px">Details</th>
    </tr>

    @foreach ($appel as $appels)
    <tr>
        <td>{!! $appels->id !!} /{{ $appels->dossier->NomDossier}}/{{ $appels->Date_Publication }}</td>
        <td>{{ $appels->Date_Publication }}</td>
        <td>{{ $appels->Duree_Validite }} jours</td>
        <td> <a class="btn btn-info" href="{{ route('objet.lister',[$appels->id]) }}">Objets</a></td>
    </tr>
    @endforeach
</table>
@else
<table class="table table-bordered">
    <tr>
        <th style="width: 150px; text-align: center">Liste des Appels</th>
    </tr>

    <tr><th><h3 style="text-align: center">Aucun Appel disponible</h3></th></tr>
</table>
@endif
{{ $appel->links('pagination::simple-tailwind') }}
@endsection
@extends('layouts.foot')
