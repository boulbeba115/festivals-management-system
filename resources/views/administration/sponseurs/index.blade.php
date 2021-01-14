@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/sponseurs"  class="current" >Gére Sponseurs</a></div>  </div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Sponseurs</h3>
  <hr>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Affectation du Sponseurs</h4>
  <a style="float: right;" href="sponseurs/affect" class="btn btn-primary">Affecter</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Liste Des Affectation Du Sponseurs </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Sponseurs</th>
                  <th>Nom Sponseurs</th>
                  <th>Num Festivale </th>
                  <th>Nom Festivale </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affectations as $affectation)
                @foreach($affectation->festivales as $fest)

                <tr >
                  <td style="text-align:center;">{{$affectation->idSpon}}</td>
                  <td style="text-align:center;">{{$affectation->nomSpon}}</td>
                  <td style="text-align:center;">{{$fest->idFes}}</td>
                  <td style="text-align:center;">{{$fest->nomFes}}</td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Affectation ?")' ,'action' => ['SponseurController@suppaffect', $fest->idFes,$affectation->idSpon], 'method' => 'POST'])!!}
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
  <h4 style="text-align:center;">Liste des Sponseur</h4>
  <a style="float: right;" href="sponseurs/create" class="btn btn-primary">Ajouter Sponseur</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Sponseur</th>
                  <th>Nom Sponseur</th>
                  <th>Site Sponseur</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sponseurs as $sponseur)
                <tr >
                  <td style="text-align:center;">{{$sponseur->idSpon}}</td>
                  <td style="text-align:center;">{{$sponseur->nomSpon}}</td>
                  <td style="text-align:center;">{{$sponseur->siteSpon}}</td>
                  <td style="text-align:center;"><a href="{{action('SponseurController@edit', $sponseur->idSpon)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer ce Sponseur ?")' ,'action' => ['SponseurController@destroy', $sponseur->idSpon], 'method' => 'POST'])!!}
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
    $('#gerespon').addClass('active');
});
</script>
@endsection
