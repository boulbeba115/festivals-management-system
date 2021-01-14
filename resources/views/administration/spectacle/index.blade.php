@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/spectacle" class="current">Géré Spectacles</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Les Spectacles</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Spectacles </h4>
  <a style="float: right;" href="spectacle/create" class="btn btn-primary">Ajouter Spectacle</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Spectacles Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Spectacle</th>
                  <th>Nom Spectacle</th>
                  <th>Type Spectacle</th>
                  <th>Temp Debut Spectacle</th>
                  <th>Temp Fin Spectacle</th>
                  <th>Soiré</th>
                  <th>Artist</th>
                  <th>Festivale</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($spectacles as $spectacle)
                <tr >
                  <td style="text-align:center;">{{$spectacle->idSpec}}</td>
                  <td style="text-align:center;">{{$spectacle->nomSpec}}</td>
                  <td style="text-align:center;">{{$spectacle->typeSpec}}</td>
                  <td style="text-align:center;">{{$spectacle->tempDebSpec}}</td>
                  <td style="text-align:center;">{{$spectacle->tempFinSpec}}</td>
                  <td style="text-align:center;">{{$spectacle->soire->idSoi}},{{$spectacle->soire->nomSoi}} le {{$spectacle->soire->dateSoi}}</td>
                  <td style="text-align:center;">{{$spectacle->artist->idArt}},{{$spectacle->artist->NomArt}} {{$spectacle->artist->PrenomArt}}</td>
                  <td style="text-align:center;">{{$spectacle->soire->festivale->idFes}},{{$spectacle->soire->festivale->nomFes}} Edition {{$spectacle->soire->festivale->tourFes}}</td>
                  <td style="text-align:center;"><a href="{{action('SpectacleController@edit', $spectacle->idSpec)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Scene ?")' ,'action' => ['SpectacleController@destroy', $spectacle->idSpec], 'method' => 'POST'])!!}
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
    $('#gerespec').addClass('active');
});
</script>
@endsection
