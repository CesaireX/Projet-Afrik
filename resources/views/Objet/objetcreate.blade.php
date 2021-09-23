
@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if(isset($refus))

<script>

    swal({
        position: 'top-end',
      icon: 'warning',
      title: 'L\'Objet que vous tenter d\'ajouter existe déja',
      showConfirmButton: false,
      timer: 3500,
         });

</script>

@endif

<h2 style="margin-left: 440px;">Appel N*{{$id}}</h2>

<form method="post" action="{{ route('objet.store',[$id]) }}">
    @csrf
    <textarea style="visibility: hidden;" name="appel_id" id="" cols="0" rows="0"> {{$id}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 class="card-title"> Creer un nouvel objet </h2>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;"> Grand Titre</th>
                <th style="width: 50px;"> executer </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 0px;"><textarea name="titre" id="" cols="40" rows="5" required></textarea></td>
                <td style="width: 190px;"><button style="margin-left: 150px;margin-top: 40px;" name="envoie" type="submit" class="btn btn-primary" > Ajouter </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>
    </div>
 </form>

@endsection
@extends('layouts.foot')
