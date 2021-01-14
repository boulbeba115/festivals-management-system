@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/spectacle">Géré Spectacles</a>><a href="spectacle/create" class="current">Ajouter Spectacle</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Ajouter Spectacle</h2>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Spectacle Form</h5>
          </div>
          <div class="container-fluid">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('spectacle')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner La Soiré </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="soire" style="width: 60%;" >
                @foreach($soires as $soire)
                  <option>{{$soire->idSoi}},{{$soire->nomSoi}} le {{$soire->dateSoi}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group"   >
              <label style="width: 183px;" class="control-label">Selectionner l'Artiste </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="artist"  style="width: 60%;"  >
                @foreach($artists as $artist)
                  <option>{{$artist->idArt}},{{$artist->NomArt}} {{$artist->PrenomArt}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nom Spectacle</label>
                <div class="controls">
                  <input type="text" name="nomSpec" id="nomSpec" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Type Spectacle</label>
                <div class="controls">
                  <input type="text" name="typeSpec" id="typeSpec" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Temp Debut Spectacle</label>
              <div class="controls"> 
                  <input type="time"  id="tempDebSpec" name="tempDebSpec"  required>
            </div>
            <div class="control-group">
              <label class="control-label">Temp Fin Spectacle</label>
              <div class="controls"> 
                  <input type="time"  id="tempFinSpec" name="tempFinSpec"  required>
            </div>
            
              <div class="control-group">
              <label class="control-label">Photo Spectacle</label>
              <div class="controls">
                <input type="file" name="imgSpec"  required/>
              </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Validate" class="btn btn-success">
              </div>
            </form>
          </div>
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
