@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/artiste">Gére Artist</a>><a href="#" class="current">Modifier Artist</a> </div>
<h2 style="text-align:center;">Modifier Artist "{{$artiste->NomArt}} {{$artiste->PrenomArt}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Editer Artist</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['ArtistController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name' =>'basic_validate']) !!}
              {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Artist</label>
                <div class="controls">
                  <input type="text" value="{{$artiste->NomArt}}" name="NomArt" id="NomArt" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Prenom Artist</label>
                <div class="controls">
                  <input type="text" value="{{$artiste->PrenomArt}}" name="PrenomArt" id="PrenomArt" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description Artist</label>
                <div class="controls">
                <textarea name="DesArt" id="DesArt" required >{{$artiste->DesArt}}</textarea>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">télécharger la photo de l'Artist</label>
              <div class="controls">
                <input type="file" name="ImgArt" />
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
    $('#gereart').addClass('active');
});
</script>
@endsection
