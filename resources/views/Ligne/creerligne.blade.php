
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="text-align: center;" >Caution N-{{$id}} / Lot: {{$lotcorrespondant->lot}} </h2>

<form method="post" action="{{ route('ligne.store',[$id]) }}">

    @csrf

    <textarea style="visibility: hidden;" name="caution_id" id="" cols="0" rows="0"> {{$id}}  </textarea>
    <textarea style="visibility: hidden;" name="lot" id="" cols="0" rows="0"> {{$lotcorrespondant->lot}}  </textarea>
    <table class="table table-bordered table-hover">

        <tr>
            <th style="width: 50px;">Garant</th>
            <th style="width: 50px;">Montant de la ligne de credit</th>
            <th width="50px">Action</th>
        </tr>

        <tr>
            <td style="width: 10px;">
                <select style="width: 100px;" name="Garant">
                    @foreach ($garant as $garants)

                    <option  value="{{$garants->garant}}"> {{$garants->garant}} </option>

                    @endforeach
                </select>
                </td>

                <td style="width: 30px;"><input style="width: 100px;" type="text" name="Montant_Ligne" id="" required></td>

                    <td style="width: 50px;"><button type="submit" class="btn btn-primary" > Ajouter </button></td>
        </tr>

    </table>

 </form>


@endsection

@extends('layouts.foot')
