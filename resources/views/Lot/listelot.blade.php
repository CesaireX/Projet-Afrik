@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if (isset($message))

<script>

    swal({
        position: 'top-end',
      icon: 'success',
      title: 'Nouvel objet ajouté avec success',
      showConfirmButton: false,
      timer: 1500,
         });

</script>

@endif
<h2 style="text-align: center">Les lots deja Choisit dans le grand titre N-{{$data->id}}</h2>
<a style="margin-left: 800px;margin-bottom: -40px;" class="btn btn-primary" href="{{ route('objet.lister',[$appel->id]) }}"> Retour </a>
<a style="margin-left: 900px;" class="btn btn-success" href="{{ route('lot.creation',[$data->id]) }}"> Creer nouveau lot </a>

<br>
<table class="table table-bordered table-hover">
    <tr>
        <th style="width: 50px">Lots</th>
        <th width="50px">Action</th>
    </tr>
    @foreach ($listelot as $key => $value)
    <tr>
        <td>Lot {{ $value->lot }}</td>
        <td>
            <form action="#" method="POST">

                <a class="btn btn-info" href="{{ route('lot.show',[$value->id]) }}">Cautions</a>
                <a class="btn btn-primary" href="#">Modifier</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>

    @endforeach

</table>

@endsection
@extends('layouts.foot')
