
@extends('layouts.head')

@extends('layouts.body')

@section('content')


<U><h2 style="text-align: center">TOUT LES DOSSIERS DE NOTRE ENTREPRISE</h2></U>
<br><br>
@if (!$data->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th>Numero</th>
        <th>Dossiers</th>
        <th width="340px">Action</th>
    </tr>
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ $value->id }}
        </td>
        <td>{{ $value->NomDossier }}</td>
        <td>
                <a class="btn btn-info" href="{{ route('dossier.choisit',$value->id) }}"> Bilan-General </a>
        </td>
    </tr>
    @endforeach
</table>
{{ $data->links('pagination::simple-tailwind') }}

@else
<table class="table table-bordered">
    <tr>
        <th style="width: 50px;text-align: center">Liste des dossiers</th>
    </tr>
    <tr><td><h3 style="text-align: center"> Aucun dossier disponible </h3></td></tr>
</table>

@endif


@endsection

@extends('layouts.foot')
