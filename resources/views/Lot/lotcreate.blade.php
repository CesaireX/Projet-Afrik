
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 415px;">Grand Titre N*{{$id}}</h2>
<form method="post" action="{{ route('lot.store',[$id]) }}">

    @csrf

    <textarea style="visibility: hidden;" name="objet_id" id="" cols="0" rows="0"> {{$id}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 style="text-align: center" class="card-title">Creer un nouveau lot</h2>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;"> Lot </th>
                <th style="width: 50px;"> executer </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 50px;"><input name="lot" type="number">  <p style="display: inline;">notice: saissisez juste le numero du lot</p></td>
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
