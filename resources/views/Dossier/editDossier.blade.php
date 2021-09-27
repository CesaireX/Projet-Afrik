
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<form method="post" action="{{route('dossier.update',$dossier->id)}}">

    @csrf @method('PATCH')

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"> Modification du dossier {{$dossier->NomDossier}} </h5> <a style="margin-left: 950px; margin-top: -30px;" class="btn btn-outline-light" href="{{ route('dossier.index') }}"> <i class="fas fa-arrow-circle-left"></i> </a>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;"> Nom du dossier </th>
                <th style="width: 50px;"> executer </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 0px;"><input value="{{$dossier->NomDossier}}" name="NomDossier" type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" minlength="3"></td>
                <td style="width: 190px;"><button name="" type="submit" class="btn btn-primary" > Modifier </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>

    </div>

    </form>

@endsection
@extends('layouts.foot')
