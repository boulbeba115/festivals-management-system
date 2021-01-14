@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/actualite" class="current">Géré Actualité</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Actualité</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Actualité </h4>
  <a style="float: right;" href="actualite/create" class="btn btn-primary">Ajouter Actualité</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Actualités Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Actualité</th>
                  <th>Titre Actualité</th>
                  <th>Sujet Actualité</th>
                  <th>Num Festivale</th>
                  <th>Festivale</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($actualites as $actualite)
                <tr >
                  <td style="text-align:center;">{{$actualite->idAct}}</td>
                  <td style="text-align:center;">{{$actualite->titreAct}}</td>
                  <td style="text-align:center;">{{$actualite->sujAct}}</td>
                  <td style="text-align:center;">{{$actualite->festivale->idFes}}</td>
                  <td style="text-align:center;">{{$actualite->festivale->nomFes}}</td>
                  <td style="text-align:center;"><a href="{{action('ActualiteController@edit', $actualite->idAct)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Scene ?")' ,'action' => ['ActualiteController@destroy', $actualite->idAct], 'method' => 'POST'])!!}
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
    $('#gereact').addClass('active');
});
</script>
@endsection
