
    @extends('layouts.body2')

    @section('content')

    @if (isset($message2))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Caution leveé avec success',
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
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> DATE EFFET       :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $caution->Date_effet }}         </h4></td></tr>
    @if($caution->Status==NULL && $caution->Duree_Validite!=0)
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 420px;"> DATE EXPIRATION        :             </h3></td><td> <h4 style="display: inline;  margin-left: 5px;">      {{ $date1 }}         </h4></td></tr>
    @else

    @endif
    </table>

    @if($caution->Status==NULL && $caution->Duree_Validite!=0)

    <h1 style="margin-left: 270px;">Il vous reste <i>{{$jours}}</i> jours avant expiration de cette caution </h1>

    @else

    <h3 style="color: red; margin-left: 260px;">NB: Cette caution a déja ete levee merci de contacter votre banque pour les en informer</h3>

    @endif

    @if (isset($message2))

    @else

    @if($caution->Status==NULL && $caution->Duree_Validite!=0)

    <a style="margin-top: -9px;margin-left: 570px;" href="{{route('caution.lever',[$jours,$date1,$caution->id]) }}" class="btn btn-success"> Lever la main sur cette caution </a>

    @endif

    @endif
@endsection

@extends('layouts.foot2')
