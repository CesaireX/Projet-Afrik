
@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if ($message = Session::get('success'))

<script>

swal({
    position: 'top-end',
  icon: 'success',
  title: 'Nouveau dossier ajouté avec success',
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
  title: 'Dossier modifié avec success',
  showConfirmButton: false,
  timer: 1500,
     });

 </script>

    @endif



@if ($message = Session::get('delete'))

<script>

swal({
    position: 'top-end',
  icon: 'success',
  title: 'Dossier supprimé avec success',
  showConfirmButton: false,
  timer: 1500,
     });

 </script>

    @endif




<h2 style="text-align: center">Tous les dossiers de notre Entreprise</h2>
<div class="col-lg-12 margin-tb">

    <a style="margin-left: 900px;" class="btn btn-success" href="{{ route('dossier.create') }}"> Creer nouveau dossier </a>

</div>
@if (!$data->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th>Numero</th>
        <th>Dossiers</th>
        <th width="340px">Action</th>
    </tr>
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->NomDossier }}</td>
        <td>
            <form id="form" action="{{ route('dossier.destroy',$value->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('dossier.show',$value->id) }}">Appel doffre</a>
                <a class="btn btn-primary" href="{{ route('dossier.edit',$value->id) }}">Modifier</a>

                @csrf

                <input name="_method" type="hidden" value="DELETE">

                <button style="width: 100px;" type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Supprimer</button>

            </form>
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

<script type="text/javascript">



    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();

         swal({

             title: `Etes vous sur de vouloir supprimer ce dossier?`,

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
