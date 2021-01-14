@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/partmedia">Gére Partenaire Media</a>><a href="#" class="current">Modifier Partenaire Media</a> </div>
<h2 style="text-align:center;">Modifier Partenaire Media  "{{$partmedia->nomPm}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Partenaire Media</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['PartmediaController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name' =>'basic_validate']) !!}
              {{csrf_field()}}  
                  <div class="control-group">
                      {{Form::label('NomPmd', 'Nom Partenaire Media' ,['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::text('Nompart', $partmedia->nomPm, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                      </div>
                  </div>

                  <div class="control-group">
                      {{Form::label('sitePmd', 'Site Partenaire Media commencer avec http://',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::Text('sitePm', $partmedia->sitePm, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                      </div>
                  </div>
                  <div class="control-group">
                      {{Form::label('PmImg', 'Image Du Partenaire Media',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::file('PmImg')}}
                      </div>
                  </div>
                  {{Form::hidden('_method','PUT')}}
                  <div class="form-actions">
                  {{Form::submit('Submit', ['onclick'=>'return confirm("Tu est sur de Modifier ce Partenaire Media ?")' ,'class'=>'btn btn-success'])}}
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
    $('#gerepm').addClass('active');
});
</script>
@endsection
