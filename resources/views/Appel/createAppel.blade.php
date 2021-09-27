
@extends('layouts.head')

@extends('layouts.body')

@section('content')


<h2 style="margin-left: 430px">Dossier N-{{$id}}</h2>
<form method="post" action="{{route('appel.store',$id)}}">

    @csrf

    <textarea style="visibility: hidden" name="dossier_id" id="" cols="0" rows="0"> {{$id}}  </textarea>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 class="card-title"> Ajouter un appel doffre <a style="margin-left: 950px; margin-top: -30px;" class="btn btn-outline-light" href="{{ route('dossier.show',[$id]) }}"> <i class="fas fa-arrow-circle-left"></i> </a> </h2>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;">Duree de validité</th>
                <th style="width: 50px;">Date de publication</th>
                <th style="width: 50px;"> executer </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 0px;"><input name="Duree_Validite" type="text" required pattern="[0-9]{1,5}" min="1"> <span class="validity"><p style="color: white;">NB: La durée doit etre superieure a 0 et ne doit pas depasser 5 chiffre</p> </span></td>
                <td style="width: 0px;"><input name="Date_Publication" type="date" required></td>
                <td style="width: 190px;"><button name="envoie" type="submit" class="btn btn-primary" > Ajouter </button></td>

              </tr>
            </tbody>
          </table>
        </div>
          </div>


          <!-- /.row -->
    </div>

    </form>

@endsection
@extends('layouts.foot')
