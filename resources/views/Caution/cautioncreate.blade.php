
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 450px;">Lot N*{{$id}}</h2>
<form method="post" action="{{route('caution.store',[$id])}}">

    @csrf

    <textarea style="visibility: hidden;" name="lot_id" id="" cols="0" rows="0"> {{$id}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 style="text-align: center" class="card-title">Creer une nouvelle caution</h2>

          <div class="card-tools">


          </div>
        </div>

        <div class="card-body">


          <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 30px;">Cautions</th>
                    <th style="width: 10px">Garant</th>
                    <th style="width: 10px">Montant</th>
                    <th style="width: 10px">Date de soumission</th>
                    <th style="width: 10px">Date effet</th>
                    <th style="width: 10px">Duree Validite</th>
                    <th style="width: 150px">action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 10px;">
                    <select style="width: 250px;" name="Type_Caution" id="">
                        @foreach ($caution as $cautions)


                        <option  value="{{$cautions->type}}"> {{$cautions->type}} </option>


                        @endforeach
                    </select>
                </td>
                <td style="width: 10px;"><input style="width: 100px;" name="Garant" type="text"></td>
                <td style="width: 30px;"><input style="width: 100px;" type="number" name="Montant" id=""></td>
                <td style="width: 30px;"><input type="date" name="Date_Soumission"></td>
                <td style="width: 30px;"><input type="date" name="Date_effet" id=""></td>
                <td style="width: 30px;"><input style="width: 80px;" type="number" name="Duree_Validite"></td>
                <td style="width: 50px;"><button name="envoie" type="submit" class="btn btn-primary" > Ajouter </button></td>
              </tr>
            </tbody>
          </table>
        </div>
          </div>
    </div>
 </form>

@endsection
@extends('layouts.foot')
