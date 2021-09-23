<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<br>
<h1 style="text-align: center"><U>TABLEAU RECAPITULATIF DES CAUTIONS POSSÉDANT UNE LIGNE DE CREDIT</U></h1><br><br>

@php
    $count=0;
    $montant=0;
@endphp

@foreach ($caution as $cautions)

@foreach ($ligne as $lignes)

@if ($lignes->caution_id == $cautions->id)

@php
    $count++;
    $montant=$montant+$cautions->Montant
@endphp

@endif

@endforeach
@endforeach


<h3 style="text-align: left;">Montant total des cautions: <U><i> {{$montant}} </i></U> FCFA</h3>
<h3 style="text-align: right; margin-top: -43px;">Date : {{$date}} </h3>
<h3 style="text-align: left;">  Nombre total des cautions: <U><i> {{$count}}</i></U> @if($count>1)cautions @else caution @endif </h3>

<table style="" border="1px" cellspacing="0px;" >

    <tr>

        <th style="text-align: center; background-color: white;">PROVENANCE</th>
        <th style="text-align: center; background-color: white;">DETAILS CAUTIONS</th>
    </tr>



    <tr>

             <td>

                @foreach ($caution as $cautions)

                @foreach ($ligne as $lignes)

                @if ($lignes->caution_id == $cautions->id)
                @php
                    $count++;
                @endphp
                {{$cautions->lot->objet->appel->dossier->NomDossier}} -- Appel N-{{$cautions->lot->objet->appel->id}} -- {{$cautions->lot->objet->titre}} -- Lot N{{-$cautions->lot->lot}}
                <br><br>


                @endif

                @endforeach
                @endforeach

            </td>

            <td>

                @foreach ($caution as $cautions)

                @foreach ($ligne as $lignes)

                @if ($lignes->caution_id == $cautions->id)


                {{$cautions->lot->objet->titre}} -- Lot N-{{$cautions->lot->lot}} -- {{$cautions->Montant}} FCFA --{{$cautions->Type_Caution}} -- {{$cautions->Garant}} --  @if($cautions->Status==NULL)
                    <p style="color: rgb(3, 145, 155); display: inline;">caution en cours --LIGNE DE CREDIT-- {{$lignes->Montant_Ligne}} FCFA</p>
                    @else

                    @if ($cautions->Status=="MAIN LEVEE")
                   <p style="color: rgb(0, 151, 0); display: inline;">levee --LIGNE DE CREDIT-- {{$lignes->Montant_Ligne}} FCFA</p>
                    @endif

                    @if ($cautions->Status=="EXPIREE")
                    <p style="color: rgb(151, 0, 0); display: inline;">expiree --LIGNE DE CREDIT-- {{$lignes->Montant_Ligne}} FCFA</p>
                    @endif

                @endif
                <br><br>
                @endif

                @endforeach
                @endforeach
               <br>
             </td>

    </tr>

</table>


</html>
