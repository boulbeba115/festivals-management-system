@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/scene">Géré Festivale</a>><a href="#" class="current">Modifier Festivale</a> </div>
<h2 style="text-align:center;">Modifier Festivale "{{$festivale->nomFes}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editer Festivale</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['FestivaleController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name' =>'basic_validate']) !!}
              {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Festivale</label>
                <div class="controls">
                  <input type="text" name="nomFes" value="{{$festivale->nomFes}}" id="nomFes" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Edition</label>
                <div class="controls">
                  <input type="number" value="{{$festivale->tourFes}}" min="0" name="tourFes" id="tourFes" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Debut Festivale</label>
              <div class="controls"> 
              <div  data-date="{{$festivale->dateDebFes}}" class="input-append date datepicker">
                  <input disabled type="text" value="{{$festivale->dateDebFes}}"  data-date-format="yyyy-mm-dd" id="dateDebFes" name="dateDebFes" class="span11" required>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Fin Festivale</label>
              <div class="controls">
              <div  data-date="{{$festivale->dateFinFes}}" class="input-append date datepicker">
                  <input disabled type="text" value="{{$festivale->dateFinFes}}"  data-date-format="yyyy-mm-dd" id="dateFinFes" name="dateFinFes" class="span11" required>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
                 </div>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Num Télephone Contact</label>
                <div class="controls">
                  <input type="text" value="{{$festivale->telFes}}" name="telFes"  id="telFes" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Adresse contact</label>
                <div class="controls">
                  <input type="text" name="adrFes" value="{{$festivale->adrFes}}"  id="adrFes" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email contact</label>
                <div class="controls">
                  <input type="email" name="mailFes" value="{{$festivale->mailFes}}"  id="mailFes" required>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">Photo Couverture de Festivale</label>
              <div class="controls">
                <input type="file" name="coverFesImg"  />
              </div>
              </div>
              
              <div class="control-group">
              <label class="control-label">Logo de Festivale</label>
              <div class="controls">
                <input type="file" name="logoFesImg"  />
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
    $('#gerefest').addClass('active');
});
</script>
@endsection
