@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a class="current" href="/partmedia"> Gére Partenaire Media</a></div>  </div>
  @include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Partenaire Media</h3>
  <hr>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Affectation du Partenaire Media Au Festivale</h4>
  <a style="float: right;" href="partmedia/affect" class="btn btn-primary">Affecter</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Liste Des Affectation Du Partenaire Media</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Partenaire Media</th>
                  <th>NOM Partenaire Media</th>
                  <th>Num Festivale </th>
                  <th>Nom Festivale </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affectations as $affectation)
                @foreach($affectation->festivales as $fest)

                <tr >
                  <td style="text-align:center;">{{$affectation->idPm}}</td>
                  <td style="text-align:center;">{{$affectation->nomPm}}</td>
                  <td style="text-align:center;">{{$fest->idFes}}</td>
                  <td style="text-align:center;">{{$fest->nomFes}}</td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Affectation ?")' ,'action' => ['PartmediaController@suppaffect', $fest->idFes,$affectation->idPm], 'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                  {!!Form::close()!!}</td>
                </tr>
                @endforeach

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
</div>
</div>
<hr>
  <div class="container-fluid">
  <h3 style="text-align:center;">Liste des Partenaire Media</h3>
  <a style="float: right;" href="partmedia/create" class="btn btn-primary">Ajouter Partnaire Media</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Liste Des Partenaire Media</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Partenaire Media</th>
                  <th>Nom Partenaire Media</th>
                  <th>Site Partenaire Media </th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($partmedias as $partmedia)
                <tr >
                  <td style="text-align:center;">{{$partmedia->idPm}}</td>
                  <td style="text-align:center;">{{$partmedia->nomPm}}</td>
                  <td style="text-align:center;">{{$partmedia->sitePm}}</td>
                  <td style="text-align:center;"><a href="{{action('PartmediaController@edit', $partmedia->idPm)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer ce Partenaire Media ?")' ,'action' => ['PartmediaController@destroy', $partmedia->idPm], 'method' => 'POST'])!!}
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
    $('#gerepm').addClass('active');
});
</script>
@endsection
 