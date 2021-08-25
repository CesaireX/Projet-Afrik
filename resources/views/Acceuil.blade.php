
@extends('layouts.head')

@extends('layouts.body')

@section('content')

@if ($message = Session::get('success'))

<script>

swal({
    position: 'top-end',
  icon: 'success',
  title: 'Nouveau dossier ajouté avec success',
  showConfirmButton: false,
  timer: 1500,
     });

 </script>

    @endif

<h2 style="margin-left: 330px">Les dossiers de entreprise</h2>
<div class="col-lg-12 margin-tb">

    <a style="margin-left: 900px;" class="btn btn-success" href="{{ route('dossier.create') }}"> Creer nouveau dossier </a>

</div>
<table class="table table-bordered table-hover">
    <tr>
        <th>Numero</th>
        <th>Dossiers</th>
        <th width="340px">Action</th>
    </tr>
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->NomDossier }}</td>
        <td>
            <form action="{{ route('dossier.destroy',$value->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('dossier.show',$value->id) }}">Appel doffre</a>
                <a class="btn btn-primary" href="{{ route('dossier.edit',$value->id) }}">Modifier</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $data->links('pagination::simple-tailwind') }}



@endsection

@extends('layouts.foot')
