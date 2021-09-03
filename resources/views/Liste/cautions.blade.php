@extends('layouts.head')

@extends('layouts.body')

@section('content')


<h2 style="text-align: center">Liste de toutes les cautions de notre Entreprise</h2>
<br>
@if (!$caution->isEmpty())

<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px;">Cautions</th>
        <th style="width: 50px">Garant</th>
        <th style="width: 10px">Montant</th>
        <th style="width: 50px">Date de soumission</th>
        <th style="width: 50px">Date effet</th>
        <th style="width: 20px">Duree Validite</th>
        <th style="width: 50px">Statut</th>

    </tr>

    @foreach ($caution as $cautions)
    <tr>

            <td>{{$cautions->Type_Caution}}</td>
            <td>{{$cautions->Garant}}</td>
            <td style="width: 10px;">{{$cautions->Montant}}</td>
            <td>{{$cautions->Date_Soumission}}</td>
            <td>{{$cautions->Date_effet}}</td>
            <td style="width: 10px;">
                @if($cautions->Status==NULL)


{{$cautions->Duree_Validite}}  jours

                 @else
                 0 jours
                 @endif
</td>
<td style="width: 250px;">

    <a style="margin-top: 5px; margin-left: 20px;" class="btn btn-info" href="{{route('caution.verifier',[$cautions->Date_effet,$cautions->Duree_Validite,$cautions->id]) }}">Details</a>

@if ($cautions->Status==NULL)
<span class="badge bg-warning" style="width: 70px;"> <h6> en cours.. </h6></span>
@else
<span class="badge bg-success" style="width: 175px;"> <h6>LA CAUTION A ETE LEVEE</h6></span>
@endif

</td>

    </tr>
    @endforeach
</table>
@else
<table class="table table-bordered">
    <tr>
        <th style="width: 150px; text-align: center">Liste des Cautions</th>
    </tr>

    <tr><th><h3 style="text-align: center">Aucune Caution disponible </h3></th></tr>
</table>
@endif

@endsection
@extends('layouts.foot')
