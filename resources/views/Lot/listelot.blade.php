@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if (isset($message))

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



@if (isset($modifier))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Lot modifié avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

 @endif


<h2 style="text-align: center">Les lots deja Choisit dans le grand titre N-{{$data->id}}</h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('objet.lister',[$appel->id]) }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('lot.creation',[$data->id]) }}"><i class="fas fa-plus"></i> Creer nouveau lot </a>

<br>
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Lots</th>
        <th width="50px">Action</th>
    </tr>
    @foreach ($listelot as $key => $value)
    <tr>
        <td>Lot{{ $value->lot }}</td>
        <td>

            <form name="form" action="{{route('lot.destroy',[$value->id])}}" method="POST">

                <a class="btn btn-info" href="{{ route('lot.show',[$value->id]) }}">Cautions</a>
                <a class="btn btn-primary" href="{{route('lot.editer',[$value->id,$data->id])}}">Modifier</a>

                @csrf

                <input name="_method" type="hidden" value="DELETE">

                <button style="width: 100px;" type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Supprimer</button>

            </form>

        </td>
    </tr>

    @endforeach

</table>
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
