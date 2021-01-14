@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/music">Gére Musique</a>><a href="sponseurs/create" class="current">Ajouter Musique</a> </div>
<h2 style="text-align:center;">Ajouter Musique </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Musique Form</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('music')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Tite Musique</label>
                <div class="controls">
                  <input type="text" name="libMu" id="libMu" required>
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">télécharger la Musique</label>
              <div class="controls">
                <input type="file" name="musicLink"  required/>
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
    $('#geremusic').addClass('active');
});
</script>
@endsection
