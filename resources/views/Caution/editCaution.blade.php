
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 450px;">Lot N-{{$secondaire}}</h2>


<form method="post" action="{{ route('caution.update',[$cautiontrouvee->id]) }}">

    @csrf @method('PATCH')

    <textarea style="visibility: hidden;" name="lot_id" id="" cols="0" rows="0"> {{$secondaire}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 style="text-align: center" class="card-title">Modifier caution -- <p style="color: rgb(168, 168, 168); display: inline;">NB: Duree de validité Appel: <i>{{$duree}} Jours </i></p> </h2>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 30px;">Cautions</th>
                    <th style="width: 10px">Institution financière</th>
                    <th style="width: 10px">Montant</th>
                    <th style="width: 10px">Date de soumission</th>
                    <th style="width: 10px">Duree Validite</th>
                    <th style="width: 150px">action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 10px;">
                    <select style="width: 250px;" name="Type_Caution" id="">

                        @foreach ($caution as $cautions)


                        <option  value="{{$cautions->type}}">{{$cautions->type}} </option>


                        @endforeach
                    </select>
                </td>
                <td style="width: 10px;">
                <select style="width: 100px;" name="Garant">

                    @foreach ($garant as $garants)

                    <option  value="{{$garants->garant}}"> {{$garants->garant}} </option>

                    @endforeach

                </select>
                </td>
                <td style="width: 30px;"><input value="{{$cautiontrouvee->Montant}}" style="width: 100px;" type="number" name="Montant" id="" min="100000" required></td>
                <td style="width: 30px;"><input value="{{$cautiontrouvee->Date_Soumission}}" type="date" name="Date_Soumission" min="{{$date}}" required></td>
                <td style="width: 30px;"><input value="{{$cautiontrouvee->Duree_Validite}}" style="width: 80px;" type="number" name="Duree_Validite" required min="{{$duree}}"></td>
                <td style="width: 50px;"><button name="envoie" type="submit" class="btn btn-primary" > Modifier </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>
    </div>
 </form>


@endsection

@extends('layouts.foot')
