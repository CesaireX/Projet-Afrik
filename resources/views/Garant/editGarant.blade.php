
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<form method="post" action="{{route('garant.update',$garant->id)}}">

    @csrf @method('PATCH')

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"> Modification du Garant {{$garant->garant}} </h5>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;"> Nom du Garant</th>
                <th style="width: 50px;"> executer </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 0px;"><input value="{{$garant->garant}}" name="garant" type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" minlength="3"></td>
                <td style="width: 190px;"><button name="" type="submit" class="btn btn-primary" > Modifier </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>

    </div>

    </form>

@endsection
@extends('layouts.foot')
