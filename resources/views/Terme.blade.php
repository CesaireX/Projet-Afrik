@extends('layouts.head')

@extends('layouts.body')

@section('content')

<div class="row">
    <div class="col-2 col-sm-3 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Dossiers</span>
          <span class="info-box-number">
            {{$dossier}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-flag"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Appels</span>
          <span class="info-box-number">{{$appel}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-venus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Objets</span>
          <span class="info-box-number">{{$objet}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Lots</span>
            <span class="info-box-number">{{$lot}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 style="margin-left: 400px;" class="card-title"> Graphe récapitulatif du suivit des cautions</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>


                <div class="row">
                            <div class="col-md-10 offset-md-1">

                                <div class="panel panel-default">

                                    <div class="panel-body">

                                        <canvas id="canvas" width="20px" height="10px" style="background-color: white;">

                                            <script>

                                                new Chart(document.getElementById("canvas"),
                                                {
                                                    type: 'bar',
                                                      data: {
                                                        labels: ["Total des cautions", "Cautions déja levées","Cautions en cours","Caution expirées"],
                                                      datasets: [
                                                    {
                                                          label: "total des cautions",
                                                          backgroundColor: ["#000080", "#00FF00","#00FFFF","#c45850"],
                                                          data: [ {{$caution2}} , {{$cautionactuelle}}, {{$cautionrestante}}, {{$cautionexpiree}},  0]
                                                    }
                                                ]
                                                },
                                                options: {
                                                    legend: { display: false },
                                                    title: {
                                                      display: true,
                                                    }
                                                  }
                                              });
                                              </script>
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
               </div>
          </div>
@php

$count=0;

@endphp

@foreach ($caution as $cautions)

@if($date->diff(new DateTime(date("Y-m-d", strtotime($cautions->Date_effet ."+$cautions->Duree_Validite days"))))->days <=10 && $cautions->Duree_Validite!=0)
<script>
var message=4;
    swal({
        position: 'top-end',
      icon: 'warning',
      title: 'Certaines cautions expireront si jamais vous ne lever pas vite la main',
      showConfirmButton: false,
      timer: 6000,
         });

</script>
@php


$count++;


@endphp
@endif

@endforeach

    <div class="col-md-12">
        <div class="card">

    <div class="card-header">

        <h2 class="card-title"> Liste des cautions presque a terme </h2>

    </div>


      <div class="card-body">


<table class="table table-bordered table-hover">


    <tr>
        <th>Dossier </th>
        <th>Numero Appel</th>
        <th>Numero Objet</th>
        <th> Lot </th>
        <th>Numero Caution</th>
        <th>Jours restants</th>
        <th>Action</th>
    </tr>

    @if($count!=0)

    @foreach ($caution as $cautions)

    @if($date->diff(new DateTime(date("Y-m-d", strtotime($cautions->Date_effet ."+$cautions->Duree_Validite days"))))->days <=10 && $cautions->Duree_Validite!=0)

    <tr>
        <td>{{$cautions->lot->objet->appel->dossier->NomDossier}}</td>
        <td>{{$cautions->lot->objet->appel->id}}/{{$cautions->lot->objet->appel->Date_Publication}}/{{$cautions->lot->objet->appel->dossier->NomDossier}}</td>
        <td>{{$cautions->lot->objet->id}}</td>
        <td>Lot {{$cautions->lot->lot}}</td>
        <td>{{$cautions->id}} / ({{$cautions->Type_Caution}})</td>
        <td> <p style="color:rosybrown">{{$date->diff(new DateTime(date("Y-m-d", strtotime($cautions->Date_effet ."+$cautions->Duree_Validite days"))))->days}} jours</p> </td>
        <td> <a style="display: inline;" class="btn btn-info" href="{{route('caution.verifier',[$cautions->Date_effet,$cautions->Duree_Validite,$cautions->id]) }}">Aller vers la caution</a></td>
    </tr>

    @endif

    @endforeach

    @else

<table class="table table-bordered table-hover">
        <tr><td><h3 style="text-align: center;"> Aucune Caution presque a terme <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check"></i></span></h3></td></tr>
</table>

    @endif
</table>

</div>
</div>
</div>


<a style="margin-left: 430px;" class="btn btn-success" href="{{ route('dossier.index') }}"> Aller vers la liste des dossiers </a>

@endsection


@extends('layouts.foot')
