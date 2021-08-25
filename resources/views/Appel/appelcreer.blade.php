@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if ($message = Session::get('success'))

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

<h2 style="text-align: center">Dossier N-{{$dossierx->id}} / {{ $dossierx->NomDossier}} /Liste des Appels</h2>
<br>
<h2 style="text-align: center">Ici vous avez la liste des appels postulés dans le dossier {{ $dossierx->NomDossier}} </h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('dossier.index') }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('appel.show',[$dossierx->id,$dossierx->NomDosssier]) }}"> Creer nouvel appel </a>
<br>


@if (!$appel->isEmpty())


<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 150px;">Code Appel</th>
        <th style="width: 50px;">Duree de validité</th>
        <th style="width: 50px;">Date de publication</th>
        <th style="width: 50px;">Statut</th>
        <th width="170px">Action</th>
    </tr>
    @foreach ($appel as $key => $value)
    <tr>
        <td>{!! $value->id !!} /{{ $dossierx->NomDossier}}/{{ $value->Date_Publication }}</td>
        <td>{{ $value->Duree_Validite }} jours</td>
        <td>{{ $value->Date_Publication }}</td>
        <td>
          @if ($value->status==NULL)
            <span class="badge bg-warning" style="width: 170px;">  <h6 style="color:black;">en cours de traitement...</h6> </span>
           @endif
        </td>
        <td>
                <form action="#" method="POST">

                <a class="btn btn-info" href="{{ route('objet.lister',[$value->id]) }}"> Objet </a>
                <a class="btn btn-primary" href="#">Modifier</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>


            </form>
        </td>
    </tr>
    @endforeach
</table>


@else
<table class="table table-bordered">
    <tr>
        <th style="width: 150px; text-align: center">Liste des Appels</th>
    </tr>

    <tr><th><h3 style="text-align: center">Aucun Appel disponible pour ce Dossier</h3></th></tr>
</table>
@endif


@endsection
@extends('layouts.foot')
