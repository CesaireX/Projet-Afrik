<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<h1 style="margin-left: 80px;"><U>TABLEAU RECAPITULATIF DES CAUTIONS ACTUALISEES AVEC AUTRES RESULTATS</U></h1>

<br>
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

<table border="1px" style="width: 100%;">

    <tr>
        <th style="text-align: center; background-color: white;">DOSSIER</th>
        <th style="text-align: center; background-color: white;">NUMERO MARCHÉ </th>
        <th style="text-align: center; background-color: white;">GRAND TITRE</th>
        <th style="text-align: center; background-color: white;">LOTS SOUMISSIONNES</th>
        <th style="text-align: center; background-color: white;">DETAILS CAUTIONS</th>
    </tr>

@foreach ($dossier as $dossiers )

    <tr>
            <td>{{$dossiers->NomDossier}}</td>
            <td>
                @foreach ($appel as $appels)

                @if($appels->dossier_id==$dossiers->id)

                @if(isset($appelprovisoire))
                @if($appels->id != $appelprovisoire && $appels->dossier->NomDossier==$dossierA)

                <br>

                @endif
                @endif


                {{$appels->id}}/{{$appels->Date_Publication}}/{{$appels->dossier->NomDossier}}

                @php
                $appelprovisoire=$appels->id;
                $dossierA=$appels->dossier->NomDossier;
                @endphp
                <br>
                @endif
                @endforeach
             </td>


             <td>
                @foreach ($objet as $objets )


                @if($objets->appel->dossier->NomDossier==$dossiers->NomDossier)

                @if(isset($objetprovisoire))
                @if($objets->appel->id != $objetprovisoire && $objets->appel->dossier->NomDossier==$dossierB)

                <br>

                @endif
                @endif

                *{{$objets->titre}}

                @php
                $objetprovisoire=$objets->appel->id;
                $dossierB=$objets->appel->dossier->NomDossier;
                @endphp
                <br>
                @endif
                @endforeach
             </td>

             <td>
                @foreach ($lot as $lots)

                @if($lots->objet->appel->dossier->NomDossier==$dossiers->NomDossier)

                @if(isset($lotprovisoire))
                @if($lots->objet->appel->id != $lotprovisoire && $lots->objet->appel->dossier->NomDossier==$dossierC)

                <br>

                @endif
                @endif

                {{$lots->objet->titre}} -- Lot N-{{$lots->lot}}


                @php
                $lotprovisoire=$lots->objet->appel->id;
                $dossierC=$lots->objet->appel->dossier->NomDossier;
                @endphp
                <br>
                @endif
                @endforeach
             </td>


             <td style="width: 850px;">

                @foreach ($caution as $cautions)

                @if($cautions->lot->objet->appel->dossier->NomDossier==$dossiers->NomDossier)

                @if(isset($cautionprovisoire))
                @if($cautions->lot->objet->appel->id != $cautionprovisoire && $cautions->lot->objet->appel->dossier->NomDossier==$dossierD)

                <br>

                @endif
                @endif

                @php
                $count=0;
                @endphp

            @foreach ($ligne as $lignes)

            @if ($lignes->caution_id==$cautions->id)
            @php
            $count++;
            @endphp
            @endif

            @endforeach


{{$cautions->lot->objet->titre}} -- Lot N-{{$cautions->lot->lot}} -- {{$cautions->Montant}} FCFA -- {{$cautions->Type_Caution}} -- {{$cautions->Garant}} @if ($count!=0)  <p style="color:red; display: inline;" >--Ligne de credit</p> @else <p style="display: inline;" >--aucune ligne de credit</p>  @endif -- @if($cautions->Status==NULL)

                    <p style="color: rgb(3, 145, 155); display: inline;">en cours</p>
                    @else

                    @if ($cautions->Status=="MAIN LEVEE")
                   <p style="color: rgb(0, 151, 0); display: inline;">levee</p>
                    @endif

                    @if ($cautions->Status=="EXPIREE")
                    <p style="color: rgb(151, 0, 0); display: inline;">expiree</p>
                    @endif

                    @endif

                @php
                $cautionprovisoire=$cautions->lot->objet->appel->id;
                $dossierD=$cautions->lot->objet->appel->dossier->NomDossier;
                @endphp
                <br>

                @endif
                @endforeach

             </td>

    </tr>


 @endforeach


</table>

</html>
