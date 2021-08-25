@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if (isset($message))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Nouvel appel ajouté avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

@endif

<h2 style="text-align: center">Dossier N-{{$data->id}} / {{ $data->NomDossier}} /Liste des Appels</h2>
<h2 style="text-align: center">Ici vous avez les appels postulés dans le dossier {{ $data->NomDossier}} </h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('dossier.index') }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('appel.show',[$data->id,$data->NomDossier]) }}"> Creer nouvel appel </a>
<br>
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 150px;">Code Appel</th>
        <th style="width: 50px;">Duree de validité</th>
        <th style="width: 50px;">Date de publication</th>
        <th style="width: 50px;">Statut</th>
        <th width="170px">Action</th>
    </tr>
    @foreach ($listeappel as $key => $value)
    <tr>
        <td>{{ $value->id }}/{{ $data->NomDossier}}/{{ $value->Date_Publication }}</td>
        <td>{{ $value->Duree_Validite }}</td>
        <td>{{ $value->Date_Publication }}</td>
        <td>
            @if ($value->status==NULL)
              <span class="badge bg-warning" style="width: 170px;">  <h6 style="color:black;">en cours de traitement...</h6> </span>
             @endif
        </td>
        <td>
            <form action="#" method="POST">

                <a class="btn btn-info" href="{{ route('objet.lister',[$value->id]) }}">Objet</a>
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
