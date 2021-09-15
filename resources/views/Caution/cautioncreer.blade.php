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
        <th style="width: 20px">Duree Validite</th>
        <th style="width: 20px">Ligne de credit</th>
        <th style="width: 50px">Statut</th>
        <th style="width: 350px">action</th>
    </tr>

    @foreach ($caution as $key => $value)
    <tr>
        <td>{{$value->Type_Caution}}</td>
        <td style="width: 10px;">{{$value->Garant}}</td>
        <td>{{$value->Montant}}</td>
        <td>{{$value->Date_Soumission}}</td>
        <td style="width: 10px;">
                                @if($value->Status==NULL)


            {{$value->Duree_Validite}}  jours

                                 @else
                                 0 jours
                                 @endif
        </td>
        <td>
            @php
                $count=0;
            @endphp
            @foreach ($ligne as $lignes)

            @if ($lignes->caution_id==$value->id)
            @php
            $count++;
            @endphp
            @endif

            @endforeach

            @if ($count!=0)
            <p>OUI</p>
            @else
            <p>AUCUNE</p>
            @endif
        </td>
        <td>

        @if ($value->Status==NULL)
        <span class="badge bg-warning" style="width: 70px;"> <h6> en cours.. </h6></span>
        @else

        @if ($value->Status=="MAIN LEVEE")
        <span class="badge bg-success" style="width: 175px;"> <h6>LA CAUTION A ETE LEVEE</h6></span>
        @endif

        @if ($value->Status=="EXPIREE")
        <span class="badge bg-danger" style="width: 175px;"> <h6>LA CAUTION A EXPIREE</h6></span>
        @endif

        @endif

        </td>
        <td style="width: 175px;">
            <form name="form" action="{{route('caution.destroy',[$value->id])}}" method="POST">

                <a class="btn btn-info" href="{{route('caution.verifier',[$value->Date_Soumission,$value->Duree_Validite,$value->id]) }}">Details</a>
                <a class="btn btn-primary" href="{{route('caution.editer',[$value->id,$lotcorrespondant->id,$value->Duree_Validite,$value->Date_Soumission]) }}">Modifier</a>

                <a class="btn btn-warning" href="{{route('ligne.lister',[$value->id,$lotcorrespondant->id])}}">Ligne de credit</a>
                @csrf

                <input name="_method" type="hidden" value="DELETE">

                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='supprimer?'><span class="fas fa-trash"></span></button>

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
