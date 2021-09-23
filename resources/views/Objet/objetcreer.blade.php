@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if ($message = Session::get('success'))

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

 @if (isset($suppression))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Grand Titre supprimé avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

 @endif

 @if (isset($appelcorrespondant))


<h2 style="text-align: center">Dossier {{$dossiercorrespondant->NomDossier}} / Appel N-{{$appelcorrespondant->id}}</h2>
<h2 style="text-align: center">Les Grands titres deja Choisit</h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('dossier.show',[$dossiercorrespondant->id]) }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('objet.creation',[$appelcorrespondant->id]) }}"><i class="fas fa-plus"></i> Creer nouvel objet </a>
<br>

@if (!$objet->isEmpty())
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Code Objet </th>
        <th style="width: 50px;">Grand titre</th>
        <th width="50px">Action</th>
    </tr>
    @foreach ($objet as $key => $value)
    <tr>
        <td> {{ $value->id}}/{{$appelcorrespondant->id}}/{{ $value->appel->dossier->NomDossier}}</td>
        <td>{{ $value->titre }}</td>
        <td>
            <form name="form" action="{{route('objet.destroy',[$value->id])}}" method="POST">

                <a class="btn btn-info" href="{{ route('objet.show',[$value->id]) }}">Lot</a>
                <a class="btn btn-primary" href="{{ route('objet.editer',[$value->id,$appelcorrespondant->id]) }}">Modifier</a>

                @csrf

                <input name="_method" type="hidden" value="DELETE">

                <button style="width: 100px;" type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Supprimer</button>

            </form>
        </td>
    </tr>
    @endforeach
</table>

@else
<table class="table table-bordered">
    <tr>
        <th style="width: 50px;text-align: center">Liste des Grands titre</th>
    </tr>

    <tr><td><h3 style="text-align: center">Aucun Grand titre pour cet Appel</h3></td></tr>
</table>
@endif

<script type="text/javascript">



    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();

         swal({

             title: `Etes vous sur de vouloir supprimer cet Objet?`,

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

@endforelse


@endsection
@extends('layouts.foot')
