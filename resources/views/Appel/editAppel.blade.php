
@extends('layouts.head')

@extends('layouts.body')

@section('content')


<h2 style="margin-left: 430px">Dossier N-{{$secondaire}}</h2>
<form method="post" action="{{route('appel.update',[$appel->id])}}">

    @csrf @method('PATCH')

    <textarea style="visibility: hidden" name="dossier_id" id="" cols="0" rows="0"> {{$secondaire}}  </textarea>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 class="card-title"> Modifier un appel doffre </h2> <p style="color: rgb(184, 184, 184)">NB:Les attributs de cette zone sont tres sensible et il est deconseiller de les modifié</p>

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
                <td style="width: 0px;"><input value="{{$appel->Duree_Validite}}" name="Duree_Validite" type="text" required pattern="[0-9]{1,5}" min="1"> <span class="validity"><p style="color: white;">NB: La durée doit etre superieure a 0 et ne doit pas depasser 5 chiffre</p> </span></td>
                <td style="width: 0px;"><input value="{{$appel->Date_Publication}}" name="Date_Publication" type="date" required></td>
                <td style="width: 190px;"><button name="" type="submit" class="btn btn-primary" > Modifier </button></td>

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
