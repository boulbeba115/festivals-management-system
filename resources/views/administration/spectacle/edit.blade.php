@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/spectacle">Géré Specracles</a>><a href="#" class="current">Modifier Spectacle</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Modifier Spectacle "{{$spectacle->nomSpec}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editer Spectacle</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['SpectacleController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data'],'id'=>'basic_validate','name' =>'basic_validate') !!}
              {{csrf_field()}}  
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner La Soiré </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="soire" style="width: 60%;" disabled>
                  <option>{{$spectacle->soire->idSoi}},{{$spectacle->soire->nomSoi}} le {{$spectacle->soire->dateSoi}}</option>
                </select>
              </div>
            </div>
            <div class="control-group"   disabled>
              <label style="width: 183px;" class="control-label">Selectionner l'Artiste </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="artist"  style="width: 60%;" disabled >
                  <option>{{$spectacle->artist->idArt}},{{$spectacle->artist->NomArt}} {{$spectacle->artist->PrenomArt}}</option>
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nom Spectacle</label>
                <div class="controls">
                  <input type="text" name="nomSpec" value="{{$spectacle->nomSpec}}" id="nomSpec" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Type Spectacle</label>
                <div class="controls">
                  <input type="text" name="typeSpec"  value="{{$spectacle->typeSpec}}" id="typeSpec" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Temp Debut Spectacle</label>
              <div class="controls"> 
                  <input type="time"  id="tempDebSpec" name="tempDebSpec" value="{{$spectacle->tempDebSpec}}"  required>
            </div>
            <div class="control-group">
              <label class="control-label">Temp Fin Spectacle</label>
              <div class="controls"> 
                  <input type="time"  id="tempFinSpec" name="tempFinSpec" value="{{$spectacle->tempFinSpec}}"  required>
            </div>
            
              <div class="control-group">
              <label class="control-label">Photo Spectacle</label>
              <div class="controls">
                <input type="file" name="imgSpec"  />
              </div>
              </div>
                  {{Form::hidden('_method','PUT')}}
                  <div class="form-actions">
                  {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                  </div>
              {!! Form::close() !!}
              </div>
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
