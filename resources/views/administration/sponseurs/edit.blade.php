@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/sponseurs">Gére Sponseurs</a>><a href="#" class="current">Modifier Sponseur</a> </div>
@include('inc.messages');
<h2 style="text-align:center;">Modifier Sponseur "{{$sponseur->nomSpon}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Sponseur</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['SponseurController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data'],'id'=>'basic_validate','name' =>'basic_validate') !!}
              {{csrf_field()}}  
                  <div class="control-group">
                      {{Form::label('NomSpon', 'Nom Sponseur' ,['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::text('nomSpon', $sponseur->nomSpon, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                      </div>
                  </div>

                  <div class="control-group">
                      {{Form::label('SponSite', 'Site Sponseur commencer avec http://',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::Text('siteSpon', $sponseur->siteSpon, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                      </div>
                  </div>
                  <div class="control-group">
                      {{Form::label('ImgSpon', 'Image Du Sponseur',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::file('sponImg')}}
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
    $('#gerespon').addClass('active');
});
</script>
@endsection
