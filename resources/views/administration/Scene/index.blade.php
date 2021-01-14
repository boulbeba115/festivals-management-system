@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/scene" class="current">Géré Scene</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Les Scene</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Scene </h4>
  <a style="float: right;" href="scene/create" class="btn btn-primary">Ajouter Scene</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Scenes Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Scene</th>
                  <th>Nom Scene</th>
                  <th>Adresse Scene</th>
                  <th>Capacité Scene</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($scenes as $scene)
                <tr >
                  <td style="text-align:center;">{{$scene->idScene}}</td>
                  <td style="text-align:center;">{{$scene->nomScene}}</td>
                  <td style="text-align:center;">{{$scene->adrScene}}</td>
                  <td style="text-align:center;">{{$scene->capScene}}</td>
                  <td style="text-align:center;"><a href="{{action('SceneController@edit', $scene->idScene)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Scene ?")' ,'action' => ['SceneController@destroy', $scene->idScene], 'method' => 'POST'])!!}
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
    $('#gerescene').addClass('active');
});
</script>
@endsection
