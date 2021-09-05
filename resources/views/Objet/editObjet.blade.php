
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 440px;">Appel N*{{$secondaire}}</h2>

<form method="post" action="{{ route('objet.update',[$objet->id]) }}">

    @csrf @method('PATCH')

    <textarea style="visibility: hidden;" name="appel_id" id="" cols="0" rows="0"> {{$secondaire}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 class="card-title"> Modifier objet </h2>

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
                <td style="width: 0px;"><textarea name="titre" id="" cols="40" rows="5" required>{{$objet->titre}}</textarea></td>
                <td style="width: 190px;"><button style="margin-left: 150px;margin-top: 40px;" name="envoie" type="submit" class="btn btn-primary" > Modifier </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>
    </div>
 </form>

@endsection
@extends('layouts.foot')
