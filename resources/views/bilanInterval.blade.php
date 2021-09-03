
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 415px;"></h2>
<form method="Get" action="{{route('intervalle')}}">


    @csrf
    <textarea style="visibility: hidden;" name="choix" id="" cols="0" rows="0"> {{$choix}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 style="text-align: center" class="card-title"> selectionner les deux dates</h2>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px;"> date de depart </th>
                <th style="width: 50px;"> date de fin</th>
                <th style="width: 50px;"> action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 50px;"><input name="date1" type="date" >  </td>

                <td style="width: 50px;"><input name="date2" type="date" >  </td>
                <td><button type="submit" class="btn btn-primary">
                    envoyer</button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>
    </div>
 </form>

@endsection
@extends('layouts.foot')
