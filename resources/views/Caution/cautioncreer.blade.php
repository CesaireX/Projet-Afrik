@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if ($message = Session::get('success'))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Nouvelle caution enregistrée avec success',
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
      title: 'Caution supprimé avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

 @endif

 @if (isset($message2))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: ' caution Levee avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

 @endif

 @if (isset($lotcorrespondant))

 <h2 style="text-align: center">Les Cautions generées pour le lot N-{{$lotcorrespondant->lot}}</h2>
 <a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('objet.show',[$objetcorrespondant->id]) }}"> Retour </a>
 <a style="margin-left: 900px;" class="btn btn-success" href="{{ route('caution.creation',[$lotcorrespondant->id,$date,$duree]) }}"> Creer nouvelle caution </a>


<br>

@if(!$caution->isEmpty())

<table class="table table-bordered table-hover">

    <tr>
        <th style="width: 50px;">Cautions</th>
        <th style="width: 50px">Garant</th>
        <th style="width: 30px">Montant</th>
        <th style="width: 50px">Date de soumission</th>
        <th style="width: 50px">Date effet</th>
        <th style="width: 20px">Duree Validite</th>
        <th style="width: 50px">Statut</th>
        <th style="width: 250px">action</th>
    </tr>

    @foreach ($caution as $key => $value)
    <tr>
        <td>{{$value->Type_Caution}}</td>
        <td>{{$value->Garant}}</td>
        <td>{{$value->Montant}}</td>
        <td>{{$value->Date_Soumission}}</td>
        <td>{{$value->Date_effet}}</td>
        <td style="width: 10px;">
                                @if($value->Status==NULL)


            {{$value->Duree_Validite}}  jours

                                 @else
                                 0 jours
                                 @endif
        </td>
        <td>

        @if ($value->Status==NULL)
        <span class="badge bg-warning" style="width: 70px;"> <h6> en cours.. </h6></span>
        @else
        <span class="badge bg-success" style="width: 175px;"> <h6>LA CAUTION A ETE LEVEE</h6></span>
        @endif

        </td>
        <td>
            <form name="form" action="{{route('caution.destroy',[$value->id])}}" method="POST">

                <a class="btn btn-info" href="{{route('caution.verifier',[$value->Date_effet,$value->Duree_Validite,$value->id]) }}">Details</a>
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
        <th style="width: 50px;text-align: center">Liste des Cautions</th>
    </tr>
    <tr><td><h3 style="text-align: center">Aucune caution disponible pour ce lot</h3></td></tr>
</table>


@endif

@endif

<script type="text/javascript">



    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();

         swal({

             title: `Etes vous sur de vouloir supprimer cette caution?`,

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