@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if (isset($message))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Nouvel objet ajouté avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

@endif

<h2 style="text-align: center">Dossier {{$dossier->NomDossier}} / Appel N*{{$data->id}} </h2>
<h2 style="text-align: center">Les Grands titres deja Choisit</h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('dossier.show',[$dossier->id]) }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('objet.creation',[$data->id]) }}"> Creer nouvel Objet </a>
<br>
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Code Objet </th>
        <th style="width: 50px">Grand Titre </th>
        <th width="50px">Action</th>
    </tr>
    @foreach ($listeobjet as $key => $value)
    <tr>
        <td>{{ $value->id }}/{{ $data->id}}/{{ $data->Date_Publication }}</td>
        <td>{{ $value->titre }}</td>
        <td>
            <form action="#" method="POST">

                <a class="btn btn-info" href="{{ route('objet.show',[$value->id]) }}">Lot</a>
                <a class="btn btn-primary" href="#">Modifier</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
@extends('layouts.foot')
