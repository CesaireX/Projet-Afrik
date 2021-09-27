
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<form action="{{route('recherche.dossier')}}" method="">
    <div style="margin-top: -50px;">
        <div class="input-group" style="width: 250px;">
          <input name="recherche" type="search" placeholder="Recherche" aria-label="Search" value="{{ request()->recherche ?? ''}}">
          <div class="input-group-append">
            <button type="submit"class="btn btn-info">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </form>

<U><h2 style="text-align: center">TOUT LES DOSSIERS DE NOTRE ENTREPRISE</h2></U>
<div class="col-lg-12 margin-tb">

    @if(request()->input('recherche'))
    <h4>{{$dossier->total()}} resultat(s) trouvés pour la recherche de "{{request()->input('recherche') }}"</h4>
    @endif
    <a style="margin-left: 900px;" class="btn btn-success" href="{{ route('dossier.create') }}"><i class="fas fa-plus"></i> nouveau dossier </a>

</div>
@if (!$dossier->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th>Numero</th>
        <th>Dossiers</th>
        <th width="340px">Action</th>
    </tr>
    @foreach ($dossier as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->NomDossier }}</td>
        <td>
            <form id="form" action="{{ route('dossier.destroy',$value->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('dossier.show',$value->id) }}">Appel doffre</a>
                <a class="btn btn-primary" href="{{ route('dossier.edit',$value->id) }}">Modifier</a>

                @csrf

                <input name="_method" type="hidden" value="DELETE">

                <button style="width: 100px;" type="submit" class="btn btn-danger show_confirm" dossier-toggle="tooltip" title='Delete'>Supprimer</button>

            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $dossier->links('pagination::simple-tailwind') }}

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
