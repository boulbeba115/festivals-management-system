@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/soire">Géré Soirés</a>><a href="soire/create" class="current">Ajouter Soiré</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Ajouter Soiré</h2>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Soiré Form</h5>
          </div>
          <div class="container-fluid">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('soire')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner Le festivale </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="festivale" style="width: 60%;" >
                @foreach($festivales as $festivale)
                  <option>{{$festivale->idFes}},{{$festivale->nomFes}}, Edition: {{$festivale->tourFes}} De {{$festivale->dateDebFes}} Au {{$festivale->dateFinFes}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group"   >
              <label style="width: 183px;" class="control-label">Selectionner Le Scene du Soiré </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="scene"  style="width: 60%;"  >
                @foreach($scenes as $scene)
                  <option>{{$scene->idScene}},{{$scene->nomScene}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nom Sorié</label>
                <div class="controls">
                  <input type="text" name="nomSoi" id="nomSoi" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date de Soiré</label>
              <div class="controls"> 
              <div  data-date="{{$date}}" class="input-append date datepicker">
                  <input type="text" value="{{$date}}"  data-date-format="yyyy-mm-dd" id="dateSoi" name="dateSoi" class="span11" required>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
            </div>
            <div class="control-group">
                <label class="control-label">Court Description</label>
                <div class="controls">
                  <textarea name="desSoi" id="desSoi" required></textarea>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">Photo Soiré</label>
              <div class="controls">
                <input type="file" name="imgSoi"  required/>
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
