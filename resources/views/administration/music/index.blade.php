@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/music" class="current">Gére Musique</a></div>  </div>
  @include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Musique</h3>
  <hr>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Affectation de Musiques</h4>
  <a style="float: right;" href="music/affect" class="btn btn-primary">Affecter</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Liste Des Affectation De Musiques </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Musique</th>
                  <th>Titre Musique</th>
                  <th>Num Festivale </th>
                  <th>Nom Festivale </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affectations as $affectation)
                @foreach($affectation->festivales as $fest)

                <tr >
                  <td style="text-align:center;">{{$affectation->idMu}}</td>
                  <td style="text-align:center;">{{$affectation->libMu}}</td>
                  <td style="text-align:center;">{{$fest->idFes}}</td>
                  <td style="text-align:center;">{{$fest->nomFes}}</td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Affectation ?")' ,'action' => ['MusicController@suppaffect', $fest->idFes,$affectation->idMu], 'method' => 'POST'])!!}
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
  <h4 style="text-align:center;">Liste  de Musiques </h4>
  <a style="float: right;" href="music/create" class="btn btn-primary">Ajouter Musiques</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Musique Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Musique</th>
                  <th>Titre Musique</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($musics as $musics)
                <tr >
                  <td style="text-align:center;">{{$musics->idMu}}</td>
                  <td style="text-align:center;">{{$musics->libMu}}</td>
                  <td style="text-align:center;"><a href="{{action('MusicController@edit', $musics->idMu)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette musique ?")' ,'action' => ['MusicController@destroy', $musics->idMu], 'method' => 'POST'])!!}
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
    $('#geremusic').addClass('active');
});
</script>
@endsection
