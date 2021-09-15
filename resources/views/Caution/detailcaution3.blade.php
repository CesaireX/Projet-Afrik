
    @extends('layouts.body2')

    @section('content')

    @if (isset($prolonger))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Caution prolongée avec success',
      showConfirmButton: false,
      timer: 2000,
         });

</script>

@endif

    <div class="card-header bg-white border-0">
    <h3 style="text-align: left;">  </h3>

                                <h1 style="margin-left: 370px; margin-top: 50px;"> Details sur la caution N-{{$caution->id}}/{{ $dossier->NomDossier }}/{{ $appel->id }}/{{ $objet->id }}.{{ $lot->lot }} </h1>

                                <a style="margin-left: -8px; margin-top: -65px;" href="{{ route('lot.show',[$lot->id]) }}" class="btn btn-primary"> Retour vers la liste des cautions </a>


                        </div>

    <br><br>


    <table>

    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> DOSSIER:</h3></td><td><h4 style="display: inline;  margin-left: 5px;">      {{ $dossier->NomDossier }}     </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> APPEL              :              </h3></td><td><h4 style="display: inline;  margin-left: 5px;">      {{ $appel->id }}      </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> GRAND TITRE              :             </h3></td><td> <h5 style="display: inline;  margin-left: 5px;">      {{ $objet->titre }}       </h5></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> LOT    :             </h3></td><td><h4 style="display: inline;  margin-left: 5px;">      {{ $lot->lot }}       </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> CAUTION :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $caution->Type_Caution }}         </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> GARANT       :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $caution->Garant }}         </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> MONTANT CAUTION       :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $caution->Montant }} FCFA        </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> DATE DE SOUMISSION    :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $caution->Date_Soumission }}         </h4></td></tr>
    @if($caution->Status==NULL && $caution->Duree_Validite!=0)
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> DATE EXPIRATION        :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $date1 }}         </h4></td></tr>
    @else

    @endif
    </table>

    @if($caution->Status==NULL && $caution->Duree_Validite!=0)

    <h1 style="margin-left: 270px;">Il vous reste <i>{{$jours}}</i> jours avant expiration de cette caution </h1>

    @else

    @if($caution->Status=="MAIN LEVEE")

    <h3 style="color: rgb(17, 85, 17); margin-left: 260px;">NB: Cette caution a déja ete levee merci de contacter votre banque pour les en informer</h3>

    @endif

    @if($caution->Status=="EXPIREE")

    <h3 style="color: red; text-align: center">NB: CETTE CAUTION A DEJA ÉTÉ EXPIRÉE</h3>

    @endif

    @endif

    @if (isset($message2))

    @else

    @if($caution->Status==NULL && $caution->Duree_Validite!=0)

    <a style="margin-top: -9px;margin-left: 450px;" href="{{route('caution.lever',[$jours,$date1,$caution->id]) }}" class="btn btn-success"> Lever la main sur cette caution </a>

    <button style="margin-top: -9px" id="afficher" class="btn btn-info" ><i class="fa fa-plus"> PROLONGEMENT </i></button>

<script type="text/javascript">

    $(document).ready(function(){

    $("#afficher").click(function(event) {

        $('#affichage').toggle("slide");

        });
    });

</script>

<div id="affichage" style="display: none; margin-left: 390px;">

    <form method="GET" action="{{ route('caution.prolonger',[$caution->id,$caution->Duree_Validite,$caution->Date_Soumission]) }}">

       @csrf

       <div class="col-md-12">
         <div class="card">
           <div style="margin-left: 40px;" class="card-header">

           <U> <h3 class="card-title"> Prolongement de la caution N-{{$caution->id}}/{{ $dossier->NomDossier }}/{{ $appel->id }}/{{ $objet->id }}.{{ $lot->lot }} </h3> </U>

             <div class="card-tools">

             </div>
           </div>

           <div class="card-body">


             <table border="1" cellspacing="5" cellpadding="30">
               <thead>
                 <tr>
                   <th style="width: 50px;"> Nombre de jours a prolonger</th>
                   <th style="width: 50px;"> executer </th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td style="width: 0px;"><input name="Duree_Validite" type="number" required pattern="^[A-Za-z '-]+$" maxlength="20" minlength="3"></td>
                   <td style="width: 190px;"><button name="envoie" type="submit" class="btn btn-info" > Prolonger </button></td>
                 </tr>
               </tbody>
             </table>
           </div>
             </div>

       </div>

       </form>

   </div>


    @endif

    @endif
@endsection

@extends('layouts.foot2')
