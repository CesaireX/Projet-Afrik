
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 415px;">Grand Titre N*{{$secondaire}}</h2>
<form method="post" action="{{ route('lot.update',[$lot->id]) }}">

    @csrf @method('PATCH')

    <textarea style="visibility: hidden;" name="objet_id" id="" cols="0" rows="0"> {{$secondaire}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 style="text-align: center" class="card-title">Modifier un lot</h2>

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
                <td style="width: 50px;"><input value="{{$lot->lot}}" name="lot" type="number" required min="1" max="15">  <p style="display: inline;">notice: saissisez juste le numero du lot</p></td>
                <td style="width: 190px;"><button name="envoie" type="submit" class="btn btn-primary" > Modifier </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>
    </div>
 </form>

@endsection
@extends('layouts.foot')
