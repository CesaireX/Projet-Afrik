@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if(isset($refus))

<script>

    swal({
        position: 'top-end',
      icon: 'warning',
      title: 'L\'institution financière que vous tenter d\'ajouter existe déja',
      showConfirmButton: false,
      timer: 3500,
         });

</script>

@endif

<form method="post" action="{{ route('garant.store') }}">

    @csrf

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"> Creer une nouvelle Institution Financiére </h5>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;"> Nom du Garant </th>
                <th style="width: 50px;"> executer </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 0px;"><input name="garant" type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" minlength="3"></td>
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
