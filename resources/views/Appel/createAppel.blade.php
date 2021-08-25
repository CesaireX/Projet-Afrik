
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

          <h2 class="card-title"> Ajouter un appel doffre </h2>

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
                <td style="width: 0px;"><input name="Duree_Validite" type="text" required></td>
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
