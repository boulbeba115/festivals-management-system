@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/sponseurs">Gére Sponseurs</a>><a href="sponseurs/create" class="current">Ajouter Sponseur</a> </div>
<h2 style="text-align:center;">Ajouter Sponseur </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Sponseur Form</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('sponseurs')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Sponseur</label>
                <div class="controls">
                  <input type="text" name="nomSpon" id="nomSpon" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Site Sponseur (commencer avec http://)</label>
                <div class="controls">
                  <input type="text" name="siteSpon" id="siteSpon">
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">L'image Du Sponseur</label>
              <div class="controls">
                <input type="file" name="sponImg"  required/>
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
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script>
$(document).ready(function(){
   $("li").removeClass("active");
    $('#gerespon').addClass('active');
});
</script>
@endsection
