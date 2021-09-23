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
@if (isset($suppression))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Appel supprimé avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

 @endif

 @if (isset($interdiction))

<script>

    swal({
        position: 'top-end',
      icon: 'warning',
      title: 'cet Appel que vous tentez de modifier contient deja des cautions et donc ne peut etre modifié',
      showConfirmButton: false,
      timer: 4500,
         });

</script>

 @endif




<h2 style="text-align: center">Dossier N-{{$dossierx->id}} / {{ $dossierx->NomDossier}} /Liste des Appels</h2>
<br>
<h2 style="text-align: center">Ici vous avez la liste des appels postulés dans le dossier {{ $dossierx->NomDossier}} </h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('dossier.index') }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('appel.show',[$dossierx->id,$dossierx->NomDosssier]) }}"><i class="fas fa-plus"></i> Creer nouvel appel </a>
<br>


@if (!$appel->isEmpty())


<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 150px;">Code Appel</th>
        <th style="width: 50px;">Duree de validité</th>
        <th style="width: 50px;">Date de publication</th>
        <th style="width: 50px;">Statut</th>
        <th style="width: 150px;">Finaliser statut</th>
        <th width="170px">Action</th>
    </tr>
    @foreach ($appel as $key => $value)
    <tr>
        <td>{!! $value->id !!} /{{ $dossierx->NomDossier}}/{{ $value->Date_Publication }}</td>
        <td>{{ $value->Duree_Validite }} jours</td>
        <td>{{ $value->Date_Publication }}</td>
        <td>
            @if ($value->status==NULL)
            <span class="badge bg-warning" style="width: 220px;">  <h6 style="color:black;">EN COURS DE TRAITEMENT...</h6> </span>
           @endif
           @if ($value->status=="VALIDE")
            <span class="badge bg-success" style="width: 210px;">  <h6 style="color:white;">APPEL RECU AVEC SUCCESS</h6> </span>
           @endif
           @if ($value->status=="REJET")
            <span class="badge bg-danger" style="width: 150px;">  <h6 style="color:white;">APPEL REJETÉ</h6> </span>
           @endif
           @if ($value->status=="ABANDON")
            <span class="badge bg-dark" style="width: 220px;">  <h6 style="color:white;">ABANDON PAR INSUFFISANCE</h6> </span>
           @endif
        </td>
        <td>
            <form method="GET" action="{{route('appel.actualiser',[$value->id,$dossierx->id])}}">
                @csrf
                <select style="width:125px;" name="status" id=""><option value="VALIDE"> Appel gagner </option><option value="REJET"> Appel rejeter </option><option value="ABANDON"> Appel abandonner </option></select>
                <button name="envoie" type="submit" class="btn btn-primary" > <i class="fa fa-check"></i> </button>
            </form>
        </td>
        <td>
                <form name="form" action="{{route('appel.destroy',[$value->id])}}" method="POST">

                <a class="btn btn-info" href="{{ route('objet.lister',[$value->id]) }}"> Objet </a>
                <a class="btn btn-primary" href="{{ route('appel.verif',[$value->id,$dossierx->id] )}}">Modifier</a>

                @csrf

                <input name="_method" type="hidden" value="DELETE">

                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>

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

<script type="text/javascript">



    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();

         swal({

             title: `Etes vous sur de vouloir supprimer cet Appel?`,

             text: "Si jamais vous confirmez vous le perdrer pour toujours",

             icon: "warning",

             buttons: true,

             dangerMode: true,

         })

         .then((willDelete) => {

           if (willDelete) {

             form.submit();

           }

         });

     });



</script>
@endsection
@extends('layouts.foot')
