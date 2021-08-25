
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<form method="post" action="{{ route('dossier.store') }}">

    @csrf

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"> Creation un nouveau dossier </h5>

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
                <td style="width: 0px;"><input name="NomDossier" type="text" required></td>
                <td style="width: 190px;"><button name="envoie" type="submit" class="btn btn-primary" > Ajouter </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>

    </div>

    </form>

@endsection
@extends('layouts.foot')
