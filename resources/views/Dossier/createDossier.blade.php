
@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if(isset($refus))

<script>

    swal({
        position: 'top-end',
      icon: 'warning',
      title: 'Le dossier que vous tenter d\'ajouter existe déja',
      showConfirmButton: false,
      timer: 3500,
         });

</script>

@endif

<form method="post" action="{{ route('dossier.store') }}">

    @csrf

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"> Creation un nouveau dossier <a style="margin-left: 950px; margin-top: -30px;" class="btn btn-outline-light" href="{{ route('dossier.index') }}"> <i class="fas fa-arrow-circle-left"></i> </a></h5>

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
                <td style="width: 0px;"><input name="NomDossier" type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" minlength="3"></td>
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
