@extends('layouts.head')

@extends('layouts.body')

@section('content')



@if (isset($validate))

<script>

swal({
    position: 'top-end',
  icon: 'success',
  title: 'Nouvelle Institution financière ajoutée avec success',
  showConfirmButton: false,
  timer: 1500,
     });

 </script>



    @endif


@if (isset($supprimer))

<script>

swal({
    position: 'top-end',
  icon: 'success',
  title: 'Garant supprimé avec success',
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
  title: 'Institution financiére modifiée avec success',
  showConfirmButton: false,
  timer: 1500,
     });

 </script>

    @endif



<h2 style="text-align: center">Liste de tout les Garants de notre Entreprise</h2>
<br>
<div class="col-lg-12 margin-tb">

    <a style="margin-left: 900px;" class="btn btn-success" href="{{ route('garant.create') }}"> Creer une nouvelle institution financière </a>

</div>
@if (!$garant->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Code garant </th>
        <th style="width: 50px;"> Institution financière </th>
        <th width="50px">Details</th>
    </tr>

    @foreach ($garant as $garants)
    <tr>
        <td>{!! $garants->id !!} </td>
        <td>{{ $garants->garant }}</td>
        <td> <form name="form" action="{{ route('garant.destroy',$garants->id) }}" method="POST">

            <a class="btn btn-primary" href="{{ route('garant.edit',$garants->id) }}">Modifier</a>

            @csrf

            <input name="_method" type="hidden" value="DELETE">

            <button style="width: 100px;" type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Supprimer</button>

        </form> </td>
    </tr>
    @endforeach

</table>
{{ $garant->links('pagination::simple-tailwind') }}

@else
<table class="table table-bordered">
    <tr>
        <th style="width: 150px; text-align: center">Liste des Garants</th>
    </tr>

    <tr><th><h3 style="text-align: center">Aucun Garant disponible</h3></th></tr>
</table>
@endif

<script type="text/javascript">



    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();

         swal({

             title: `Etes vous sur de vouloir supprimer cette institution financière?`,

             text: "Si jamais vous confirmez vous la perdrer pour toujours",

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
