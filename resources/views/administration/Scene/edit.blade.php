@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/scene">Gére Scene</a>><a href="#" class="current">Modifier Scene</a> </div>
<h2 style="text-align:center;">Modifier Scene "{{$scene->nomScene}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editer Scene</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['SceneController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name' =>'basic_validate']) !!}
              {{csrf_field()}}  
                 <div class="control-group">
                      {{Form::label('nomscn', 'Nom du Scene' ,['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::text('nomScene', $scene->nomScene, ['class' => 'form-control', 'placeholder' => 'Nom du Scene'])}}
                      </div>
                  </div>
                  <div class="control-group">
                      {{Form::label('adrscn', 'Adresse du Scene' ,['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::text('adrScene', $scene->adrScene, ['class' => 'form-control', 'placeholder' => 'Adresse du Scene'])}}
                      </div>
                  </div>
                  <div class="control-group">
                      {{Form::label('capscn', 'Capacité du Scene' ,['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::number('capScene', $scene->capScene, ['class' => 'form-control', 'placeholder' => 'Capacité du Scene'])}}
                      </div>
                  </div>
                  <div class="control-group">
                      {{Form::label('upimg', 'Retelecharger la photo du Scene',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::file('ImgScene')}}
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
    $('#gerescene').addClass('active');
});
</script>
@endsection
