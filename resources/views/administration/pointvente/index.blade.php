@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/pointvente" class="current">Gére Point de Ventes</a></div>  </div>
  @include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Point de Ventes</h3>
  <hr>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Affectation des Point de Ventes</h4>
  <a style="float: right;" href="pointvente/affect" class="btn btn-primary">Affecter</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Liste Des Affectation des Point de Ventes </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num point de vente</th>
                  <th>Nom point vente</th>
                  <th>Num Festivale </th>
                  <th>Nom Festivale </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affectations as $affectation)
                @foreach($affectation->festivales as $fest)

                <tr >
                  <td style="text-align:center;">{{$affectation->idPv}}</td>
                  <td style="text-align:center;">{{$affectation->nomPv}}</td>
                  <td style="text-align:center;">{{$fest->idFes}}</td>
                  <td style="text-align:center;">{{$fest->nomFes}}</td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Affectation ?")' ,'action' => ['PointventeController@suppaffect', $fest->idFes,$affectation->idPv], 'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                  {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
</div>
</div>
<div id="content-header">
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Point de Ventes </h4>
  <a style="float: right;" href="pointvente/create" class="btn btn-primary">Ajouter Point de Ventes</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Point de Ventes Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num point de vente</th>
                  <th>Nom point de vente</th>
                  <th>Adresse point de vente</th>
                  <th>cordonné x de position</th>
                  <th>cordonné y de position</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pointventes as $pointvente)
                <tr >
                  <td style="text-align:center;">{{$pointvente->idPv}}</td>
                  <td style="text-align:center;">{{$pointvente->nomPv}}</td>
                  <td style="text-align:center;">{{$pointvente->adrPv}}</td>
                  <td style="text-align:center;">{{$pointvente->pvMapx}}</td>
                  <td style="text-align:center;">{{$pointvente->pvMapy}}</td>
                  <td style="text-align:center;"><a href="{{action('PointventeController@edit',$pointvente->idPv)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette musique ?")' ,'action' => ['PointventeController@destroy', $pointvente->idPv], 'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                   {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
</div>
</div>
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script>
$(document).ready(function(){
   $("li").removeClass("active");
    $('#gerepv').addClass('active');
});
</script>
@endsection
