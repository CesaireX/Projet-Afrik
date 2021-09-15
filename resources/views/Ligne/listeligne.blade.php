@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if (isset($ligneajoutee))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'ligne de credit ajoutée avec success',
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

 <h2 style="text-align: center">Ligne de credit de la caution N-{{$data->id}}</h2>
 <a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="#"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{route('ligne.creer',[$data->id,$objet->id])}}"> Ajouter une ligne de credit </a>



<br>



@if (!$ligne->isEmpty())

<table class="table table-bordered table-hover">

    <tr>
        <th style="width: 50px;">Garant</th>
        <th style="width: 50px;">Montant</th>
        <th style="width: 50px;">Lot Choisit</th>
        <th width="50px">Action</th>
    </tr>

    @foreach ($ligne as $key => $value)
    <tr>
        <td>Ligne N {{ $value->id }}</td>
        <td>Montant {{ $value->Montant_Ligne }}</td>
        <td>Lot N {{ $value->lot }}</td>
        <td>
            <form name="form" action="#" method="POST">

                <a class="btn btn-info" href="#">Cautions</a>
                <a class="btn btn-primary" href="#">Modifier</a>

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
        <th style="width: 50px;text-align: center">Liste des Lignes de credit</th>
    </tr>
    <tr><td><h3 style="text-align: center">Aucune ligne disponible pour ce grand titre</h3></td></tr>
</table>


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
