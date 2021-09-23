@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if ($message = Session::get('success'))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Nouveau lot ajouté avec success',
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
      title: ' Lot supprimé avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

 @endif

 @if (isset($objetcorrespondant))

 <h2 style="text-align: center">Les Lots deja Choisit dans le grand titre N-{{$appelcorrespondant->id}}</h2>
 <a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('objet.lister',[$appelcorrespondant->id]) }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('lot.creation',[$objetcorrespondant->id]) }}"><i class="fas fa-plus"></i> Creer nouveau lot </a>


<br>


@if (!$lot->isEmpty())

<table class="table table-bordered table-hover">

    <tr>
        <th style="width: 50px;">Lots</th>
        <th width="50px">Action</th>
    </tr>

    @foreach ($lot as $key => $value)
    <tr>
        <td>Lot {{ $value->lot }}</td>
        <td>
            <form name="form" action="{{route('lot.destroy',[$value->id])}}" method="POST">

                <a class="btn btn-info" href="{{ route('lot.show',[$value->id]) }}">Cautions</a>
                <a class="btn btn-primary" href="{{route('lot.editer',[$value->id,$objetcorrespondant->id])}}">Modifier</a>

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
        <th style="width: 50px;text-align: center">Liste des Lots</th>
    </tr>
    <tr><td><h3 style="text-align: center">Aucun lot disponible pour ce grand titre</h3></td></tr>
</table>


@endif

@endif

<script type="text/javascript">



    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();

         swal({

             title: `Etes vous sur de vouloir supprimer ce lot?`,

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
