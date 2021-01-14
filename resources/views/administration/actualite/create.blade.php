@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/actualite">Géré Actualité</a>><a href="actualité/create" class="current">Ajouter Actualité</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Ajouter Actualité </h2>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Actualité</h5>
          </div>
          <div class="container-fluid">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('actualite')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label style="width:160px !important;" class="control-label">Festivale</label>
                <div class="controls">
                <select name="festivale">
                @foreach($festivales as $festivale)
                  <option>{{$festivale->idFes}},{{$festivale->nomFes}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Titre Article</label>
                <div class="controls">
                  <input type="text" name="titreAct" id="titreAct" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Sujet Article</label>
                <div class="controls">
                  <input type="text" name="sujAct" id="sujAct" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">télécharger photo :</label>
              <div class="controls">
                <input type="file" name="imgAct"  required/>
              </div>
              </div>
              <div class="control-group">
                <label  class="control-label"><h5 class="current">Article</h5></label>
            </div>
            <div class="control-group">
                <textarea name="corpAct" id="corpAct" required ></textarea>
            </div>


              <div class="form-actions">
                <input type="submit" value="Ajouter" class="btn btn-success">
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
    $('#gereact').addClass('active');
});
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'corpAct' );
    </script>
@endsection
