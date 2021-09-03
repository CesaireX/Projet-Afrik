
@extends('layouts.head')

@extends('layouts.body')

@section('content')

<h2 style="margin-left: 450px;">Lot N-{{$id}}</h2>

<button id="afficher" class="btn btn-info" ><i class="fa fa-plus"> Nouvelle Institution financiere</i></button>

<script type="text/javascript">

    $(document).ready(function(){

    $("#afficher").click(function(event) {

        $('#affichage').toggle("slide");

        });
    });

</script>

<div id="affichage" style="display: none;">

    <form method="GET" action="{{ route('garant.enregistrer',[$id,$date,$duree]) }}">

       @csrf

       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
             <h5 class="card-title"> Creer une nouvelle Institution Financiére </h5>

             <div class="card-tools">


             </div>
           </div>

           <div class="card-body">


             <table class="table table-bordered">
               <thead>
                 <tr>
                   <th style="width: 50px;"> Nom du Garant </th>
                   <th style="width: 50px;"> executer </th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td style="width: 0px;"><input name="garant" type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" minlength="3"></td>
                   <td style="width: 190px;"><button name="envoie" type="submit" class="btn btn-primary" > Ajouter </button></td>
                 </tr>
               </tbody>
             </table>
           </div>
             </div>

       </div>

       </form>

   </div>

<form method="post" action="{{route('caution.store',[$id])}}">

    @csrf

    <textarea style="visibility: hidden;" name="lot_id" id="" cols="0" rows="0"> {{$id}}  </textarea>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h2 style="text-align: center" class="card-title">Creer une nouvelle caution -- <p style="color: rgb(168, 168, 168); display: inline;">NB: Duree de validité Appel: <i>{{$duree}} Jours </i></p> </h2>

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
                <td style="width: 10px;">
                <select style="width: 100px;" name="Garant">
                    @foreach ($garant as $garants)


                    <option  value="{{$garants->garant}}"> {{$garants->garant}} </option>

                    @endforeach
                </select>
                </td>
                <td style="width: 30px;"><input style="width: 100px;" type="number" name="Montant" id="" min="100000" required></td>
                <td style="width: 30px;"><input type="date" name="Date_Soumission" min="{{$date}}" required></td>
                <td style="width: 30px;"><input type="date" name="Date_effet" min="{{$date}}" id="" required></td>
                <td style="width: 30px;"><input style="width: 80px;" type="number" name="Duree_Validite" required min="{{$duree}}"></td>
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
