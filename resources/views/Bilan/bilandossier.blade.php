<!DOCTYPE html>
   <!-- Font Awesome -->
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title> Suivit des cautions</title>

   <link rel="stylesheet" href="{{ asset('access') }}/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('access') }}/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/summernote/summernote-bs4.min.css">
<body style="background-color: rgb(255, 255, 255)">

    <h3 style="text-align: left;">  </h3>

                                <h3 style="text-align: center; margin-top: 50px;"> ETABLISSEMENT DU BILAN GENERAL DU DOSSIER {{$dossier->NomDossier}} </h3><br><br>


                                @php
                                $montant=0;
                                @endphp
                                @foreach ($caution as $cautions)

                                @if($cautions->lot->objet->appel->dossier->NomDossier==$dossier->NomDossier)

                                @php

                                $montant=$montant+$cautions->Montant

                                @endphp
                                @endif
                                @endforeach

<h4 style="text-align: left;">Montant total des cautions: {{$montant}} FCFA</h4><a href="{{ route('impression.dossier',[$dossier->id]) }}" class="btn btn-primary" style="margin-left: 1000px; margin-top: -32px;"><i class="fa fa-print"></i> Imprimer</a><a class="btn btn-warning" style= "margin-left: 1150px; margin-top: -80px;" href="{{route('bilan.dossier')}}">Retour</a><br>


<table border="7px" style="width: 100%;">

    <tr>
        <th style="text-align: center; background-color: darkgrey;">DOSSIER</th>
        <th style="text-align: center; background-color: darkgrey;">NUMERO MARCHÉ </th>
        <th style="text-align: center; background-color: darkgrey;">GRAND TITRE</th>
        <th style="text-align: center; background-color: darkgrey;">LOTS SOUMISSIONNES</th>
        <th style="text-align: center; background-color: darkgrey;">DETAILS CAUTIONS</th>
    </tr>

    <tr>
            <td>{{$dossier->NomDossier}}</td>
            <td>
                @foreach ($appel as $appels)

                @if($appels->dossier_id==$dossier->id)

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


                @if($objets->appel->dossier->NomDossier==$dossier->NomDossier)

                @if(isset($objetprovisoire))
                @if($objets->appel->id != $objetprovisoire && $objets->appel->dossier->NomDossier==$dossierB)

                <br>

                @endif
                @endif

                {{$objets->titre}}

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

                @if($lots->objet->appel->dossier->NomDossier==$dossier->NomDossier)

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


             <td>

                @foreach ($caution as $cautions)

                @if($cautions->lot->objet->appel->dossier->NomDossier==$dossier->NomDossier)

                @if(isset($cautionprovisoire))
                @if($cautions->lot->objet->appel->id != $cautionprovisoire && $cautions->lot->objet->appel->dossier->NomDossier==$dossierD)

                <br>

                @endif
                @endif

                {{$cautions->lot->objet->titre}} -- Lot N-{{$cautions->lot->lot}} -- {{$cautions->Montant}} FCFA --{{$cautions->Type_Caution}} -- {{$cautions->Garant}} -- @if($cautions->Status==NULL)
                    <p style="color: rgb(3, 145, 155); display: inline;">caution en cours</p>
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

</table>

</body>
<script src="{{ asset('access') }}/js/sweetalert.min.js"></script>
</html>
