<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<h3 style="text-align: center; margin-top: 50px;"><U>ETABLISSEMENT DU BILAN GENERAL DES CAUTIONS DE BONNE FIN</U></h3><br><br>


@php
$montant=0;
@endphp

@foreach($caution as $cautions)
@php

$montant=$montant+$cautions->Montant

@endphp
@endforeach

<h3 style="text-align: left;">Montant total des cautions: <U><i> {{$montant}} </i></U> FCFA</h3>
<h3 style="text-align: right; margin-top: -43px;">Date : {{$date}} </h3>
<h3 style="text-align: left;">  Nombre total des cautions: <U><i> {{$nombre}}</i></U> @if($nombre>1)cautions @else caution @endif </h3>

<table border="1px" style="width: 100%;" cellspacing="0">

<tr>

<th style="text-align: center; background-color: white;">PROVENANCE</th>
<th style="text-align: center; background-color: white;">DETAILS CAUTIONS</th>
</tr>


<tr>

<td>
@foreach ($caution as $cautions)

{{$cautions->lot->objet->appel->dossier->NomDossier}} -- Appel N-{{$cautions->lot->objet->appel->id}} -- {{$cautions->lot->objet->titre}} -- Lot N{{-$cautions->lot->lot}}
<br><br>

@endforeach

</td>

<td>

@foreach ($caution as $cautions)


{{$cautions->lot->objet->titre}} -- Lot N-{{$cautions->lot->lot}} -- {{$cautions->Montant}} FCFA --{{$cautions->Type_Caution}} -- {{$cautions->Garant}} --  @if($cautions->Status==NULL)
<p style="color: rgb(3, 145, 155); display: inline;">caution en cours</p>
@else

@if ($cautions->Status=="MAIN LEVEE")
<p style="color: rgb(0, 151, 0); display: inline;">levee</p>
 @endif

 @if ($cautions->Status=="EXPIREE")
 <p style="color: rgb(151, 0, 0); display: inline;">expiree</p>
 @endif

@endif


<br><br>
@endforeach
<br>
</td>

</tr>



</table>


</html>
