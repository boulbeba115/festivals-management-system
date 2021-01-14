@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/festivale">Gére Festivales</a>><a href="festivale/create" class="current">Ajouter Festivale</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Ajouter Festivale </h2>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Festivale Form</h5>
          </div>
          <div class="container-fluid">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('festivale')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Festivale</label>
                <div class="controls">
                  <input type="text" name="nomFes" id="nomFes" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Edition</label>
                <div class="controls">
                  <input type="number" name="tourFes" min="0" id="tourFes" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Debut Festivale</label>
              <div class="controls"> 
              <div  data-date="{{$date}}" class="input-append date datepicker">
                  <input type="text" value="{{$date}}"  data-date-format="yyyy-mm-dd" id="dateDebFes" name="dateDebFes" class="span11" required>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Fin Festivale</label>
              <div class="controls">
              <div  data-date="{{$date}}" class="input-append date datepicker">
                  <input type="text" value="{{$date}}"  data-date-format="yyyy-mm-dd" id="dateFinFes" name="dateFinFes" class="span11" required>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
                 </div>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Num Télephone Contact</label>
                <div class="controls">
                  <input type="text" name="telFes"  id="telFes" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Adresse contact</label>
                <div class="controls">
                  <input type="text" name="adrFes"  id="adrFes" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email contact</label>
                <div class="controls">
                  <input type="email" name="mailFes"  id="mailFes" required>
                </div>
            </div>
              <div class="control-group">
              <label class="control-label">Photo Couverture de Festivale</label>
              <div class="controls">
                <input type="file" name="coverFesImg"  required/>
              </div>
              </div>
              
              <div class="control-group">
              <label class="control-label">Logo de Festivale</label>
              <div class="controls">
                <input type="file" name="logoFesImg"  required/>
              </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="valider" class="btn btn-success">
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
    $('#gerefest').addClass('active');
});
</script>

@endsection

