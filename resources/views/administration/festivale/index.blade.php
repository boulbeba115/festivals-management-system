@extends('layouts.dash')

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/festivale" class="current">Géré Festivales</a></div>  
</div>
@include('inc.messages')

  <h3 style="text-align:center; color:#ed9d9d;">Sélectionner Le Festivale </h3>

 <form  method="post" action="{{url('selectfestivale')}}" class="form-horizontal">
          {{csrf_field()}} 
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner Le festivale </label>
              <div class="controls">
                <select name="festivale" span12 >
                @foreach($Updatedfestivales as $festivale)
                  <option>{{$festivale->idFes}},{{$festivale->nomFes}}, Edition: {{$festivale->tourFes}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="form-actions" align="center" span12>
              <button type="submit" style="width:213px;height:50px;font-size: 24px;"  class="btn btn-success">Enregistrer</button>
            </div>
  </form>



  <h3 style="text-align:center; color:#ed9d9d;">Géré Les Festivales</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Festivales </h4>
  <a style="float: right;" href="festivale/create" class="btn btn-primary">Ajouter Festivale</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Festivale Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Festivale</th>
                  <th>Nom Festivale</th>
                  <th>Edition</th>
                  <th>Date debut Festivale</th>
                  <th>Date fin Festivale</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($festivales as $festivale)
                <tr >
                  <td style="text-align:center;">{{$festivale->idFes}}</td>
                  <td style="text-align:center;">{{$festivale->nomFes}}</td>
                  <td style="text-align:center;">{{$festivale->tourFes}}</td>
                  <td style="text-align:center;">{{$festivale->dateDebFes}}</td>
                  <td style="text-align:center;">{{$festivale->dateFinFes}}</td>
                  <td style="text-align:center;"><a href="{{action('FestivaleController@edit', $festivale->idFes)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Scene ?")' ,'action' => ['FestivaleController@destroy', $festivale->idFes], 'method' => 'POST'])!!}
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
    $('#gerefest').addClass('active');
});
</script>
@endsection
