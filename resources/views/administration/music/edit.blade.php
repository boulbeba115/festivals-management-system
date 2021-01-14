@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/music">Musique</a>><a href="#" class="current">Modifier Musique</a> </div>
<h2 style="text-align:center;">Modifier Musique "{{$music->libMu}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Musique</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['MusicController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name' =>'basic_validate']) !!}
              {{csrf_field()}}  
                 <div class="control-group">
                      {{Form::label('titremus', 'Titre de musique' ,['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::text('libMu', $music->libMu, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                      </div>
                  </div>
                  <div class="control-group">
                      {{Form::label('labretelecharger', 'Retelecharger la musique',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::file('musicLink')}}
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
    $('#geremusic').addClass('active');
});
</script>
@endsection
