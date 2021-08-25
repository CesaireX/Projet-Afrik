
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

                                <h1 style="text-align: center; margin-top: 50px;"> Details sur la caution N-{{$caution->id}}/{{ $dossier->NomDossier }}/{{ $appel->id }}/{{ $objet->id }}.{{ $lot->lot }} </h1>

                                <a style="margin-left: 50px; margin-top: -10px;" href="{{ route('lot.show',[$lot->id]) }}" class="btn btn-primary"> Retour vers la liste des cautions </a>


                        </div>

    <br><br>


    <table>

    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> DOSSIER:</h3></td><td><h4 style="display: inline;  margin-left: 260px;">      {{ $dossier->NomDossier }}     </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> APPEL              :              </h3></td><td><h4 style="display: inline;  margin-left: 260px;">      {{ $appel->id }}      </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> GRAND TITRE              :             </h3></td><td> <h5 style="display: inline;  margin-left: 260px;">      {{ $objet->titre }}       </h5></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> LOT    :             </h3></td><td><h4 style="display: inline;  margin-left: 260px;">      {{ $lot->lot }}       </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> CAUTION :             </h3></td><td> <h4 style="display: inline;  margin-left: 260px;">      {{ $caution->Type_Caution }}         </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> GARANT       :             </h3></td><td> <h4 style="display: inline;  margin-left: 260px;">      {{ $caution->Garant }}         </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> MONTANT CAUTION       :             </h3></td><td> <h4 style="display: inline;  margin-left: 260px;">      {{ $caution->Montant }} FCFA        </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> DATE DE SOUMISSION    :             </h3></td><td> <h4 style="display: inline;  margin-left: 260px;">      {{ $caution->Date_Soumission }}         </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> DATE EFFET       :             </h3></td><td> <h4 style="display: inline;  margin-left: 260px;">      {{ $caution->Date_effet }}         </h4></td></tr>
    <tr><td><h3 style="display: inline;text-align: center;margin-left: 240px;"> DATE EXPIRATION        :             </h3></td><td> <h4 style="display: inline;  margin-left: 260px;">      {{ $date1 }}         </h4></td></tr>
    <tr><td></td><td> @if (isset($message2))

        @else

        @if($caution->Status==NULL)

        <a style="margin-top: -9px;margin-left: 250px;" href="{{route('caution.lever',[$jours,$date1,$caution->id]) }}" class="btn btn-success"> Lever la main sur cette caution </a>

        @endif

        @endif</td></tr>

    </table>

    @if($caution->Status==NULL)

    <h1 style="text-align: center">Il vous reste <i>{{$jours}}</i> jours avant expiration de cette caution </h1>

    @else

    <h3 style="color: red; margin-left: 230px;">NB: Cette caution a déja ete levee merci de contacter votre banque pour les en informer</h3>

    @endif


@endsection

@extends('layouts.foot2')
