@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/artists" class="current">Géré Artistes</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Les Artistes</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Scene </h4>
  <a style="float: right;" href="artiste/create" class="btn btn-primary">Ajouter Artiste</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Artistes Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Artiste</th>
                  <th>Nom Artiste</th>
                  <th>Prenom Artistes</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($artists as $artist)
                <tr >
                <td style="text-align:center;">{{$artist->idArt}}</td>
                  <td style="text-align:center;">{{$artist->NomArt}}</td>
                  <td style="text-align:center;">{{$artist->PrenomArt}}</td>
                  <td style="text-align:center;"><a href="{{action('ArtistController@edit',$artist->idArt)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Scene ?")' ,'action' => ['ArtistController@destroy', $artist->idArt], 'method' => 'POST'])!!}
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
    $('#gereart').addClass('active');
});
</script>
@endsection
