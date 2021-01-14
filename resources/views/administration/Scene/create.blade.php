@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/scene">Gére Scenes</a>><a href="scene/create" class="current">Ajouter Scene</a> </div>
<h2 style="text-align:center;">Ajouter Scene </h2>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Scene Form</h5>
          </div>
          <div class="container-fluid">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('scene')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Scene</label>
                <div class="controls">
                  <input type="text" name="nomScene" id="nomScene" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Adresse Scene</label>
                <div class="controls">
                  <input type="text" name="adrScene" id="adrScene" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Capacité Scene</label>
                <div class="controls">
                  <input type="text" name="capScene" id="capScene" required>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">télécharger la photo du Scene</label>
              <div class="controls">
                <input type="file" name="ImgScene"  required/>
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
    $('#gerescene').addClass('active');
});
</script>
@endsection
