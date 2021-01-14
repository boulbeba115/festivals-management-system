@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/artiste">Géré Artist</a>><a href="artiste/create" class="current">Ajouter Artist</a> </div>
<h2 style="text-align:center;">Ajouter Artiste </h2>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Artiste Form</h5>
          </div>
          <div class="container-fluid">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('artiste')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Artist</label>
                <div class="controls">
                  <input type="text" name="NomArt" id="NomArt" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Prenom Artist</label>
                <div class="controls">
                  <input type="text" name="PrenomArt" id="PrenomArt" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description Artist</label>
                <div class="controls">
                <textarea name="DesArt" id="DesArt" required ></textarea>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">télécharger la photo de l'Artist</label>
              <div class="controls">
                <input type="file" name="ImgArt"  required/>
              </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Ajouter Artiste" class="btn btn-success">
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
    $('#gereart').addClass('active');
});
</script>
@endsection
