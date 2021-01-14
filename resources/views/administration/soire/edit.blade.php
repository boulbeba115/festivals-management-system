@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/soire">Géré Soiré</a>><a href="#" class="current">Modifier Soiré</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Modifier Soiré "{{$soi->nomSoi}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editer Soiré</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['SoireController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name' =>'basic_validate']) !!}
              {{csrf_field()}}  
              <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner Le festivale </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="festivale" style="width: 60%;" disabled>
                  <option>{{$soi->festivale->idFes}},{{$soi->festivale->nomFes}}, Edition: {{$soi->festivale->tourFes}} De {{$soi->festivale->dateDebFes}} Au {{$soi->festivale->dateFinFes}}</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner Le Scene du Soiré </label>
              <div class="controls" style="margin-left: 323px;">
                <select name="scene"  style="width: 60%;" disabled >
                  <option>{{$soi->scene->idScene}},{{$soi->scene->nomScene}}</option>
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nom Sorié</label>
                <div class="controls">
                  <input type="text" value="{{$soi->nomSoi}}" name="nomSoi" id="nomSoi" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date de Soiré</label>
              <div class="controls"> 
              <div  data-date="{{$soi->dateSoi}}" class="input-append date datepicker">
                  <input type="text" value="{{$soi->dateSoi}}"  data-date-format="yyyy-mm-dd" id="dateSoi" name="dateSoi" class="span11" required>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
            </div>
            <div class="control-group">
                <label class="control-label">Court Description</label>
                <div class="controls">
                  <textarea name="desSoi" id="desSoi" required>{{$soi->desSoi}}</textarea>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">Photo Soiré</label>
              <div class="controls">
                <input type="file" name="imgSoi" />
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
