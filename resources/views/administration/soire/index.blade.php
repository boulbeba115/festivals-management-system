@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/soire" class="current">Géré Soirés</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Les Soirés</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Soirés </h4>
  <a style="float: right;" href="soire/create" class="btn btn-primary">Ajouter Soirés</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Soirés Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Soirés</th>
                  <th>Nom Soirés</th>
                  <th>Date Soirés</th>
                  <th>Festivale</th>
                  <th>Scene</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($soires as $soire)
                <tr >
                  <td style="text-align:center;">{{$soire->idSoi}}</td>
                  <td style="text-align:center;">{{$soire->nomSoi}}</td>
                  <td style="text-align:center;">{{$soire->dateSoi}}</td>
                  <td style="text-align:center;">{{$soire->festivale->nomFes}} Edition :{{$soire->festivale->tourFes}}</td>
                  <td style="text-align:center;">{{$soire->scene->idScene}},{{$soire->scene->nomScene}}</td>
                  <td style="text-align:center;"><a href="{{action('SoireController@edit', $soire->idSoi)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Scene ?")' ,'action' => ['SoireController@destroy', $soire->idSoi], 'method' => 'POST'])!!}
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
