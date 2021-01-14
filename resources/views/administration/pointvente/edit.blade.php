@extends('layouts.dash')

@section('content')
<script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Jrp9PtHe0WapppUzxbIpMDWMAcV3qE4"></script>
  <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
  <style type="text/css">
    #map {
      width: 100%;
      height: 480px;
    }
  </style>

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/pointvente">Géré Point vente</a>><a href="#" class="current">Modifier Point venteue</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Modifier Point Vente "{{$pointvente->nomPv}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Point Vente</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['PointventeController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'form-wizard' ]) !!}
              <div id="form-wizard-1" class="step">
              {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Nom Point Vente</label>
                <div class="controls">
                  <input type="text" name="nomPv" id="nomPv" value="{{$pointvente->nomPv}}" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Adresse Point Vente</label>
                <div class="controls">
                  <input type="text" name="adrPv" id="adrPv" value="{{$pointvente->adrPv}}" required>
                </div>
            </div>
              <div class="control-group">
                <label class="control-label">Num Telephone</label>
                <div class="controls">
                  <input type="text" name="telPv" id="telPv" value="{{$pointvente->telPv}}" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Num Fax</label>
                <div class="controls">
                  <input type="text" name="faxPv" id="faxPv" value="{{$pointvente->faxPv}}" required>
                </div>
            </div>
            </div>
              <div id="form-wizard-2" class="step">
                  <div id="map"></div>
                  <br>
                  <div align="left">
                  <a style="margin-left: 2%;" id="confirmPosition" class="btn btn-success">Confirmer La Position</a>
                </div>
                  <br>
                <div class="control-group">
                <label class="control-label">Cordonné X localité</label>
                <div class="controls">
                <input type="text" name="pvMapx" value="{{$pointvente->pvMapx}}" id="pvMapx" required>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label">Cordonné Y localité</label>
                <div class="controls">
                  <input type="text" name="pvMapy" id="pvMapy" value="{{$pointvente->pvMapy}}" required>
                </div>
                </div>
            </div>
            <div id="form-wizard-3" class="step">
            <div class="control-group">
              <label class="control-label">télécharger la photo de point de vente</label>
              <div class="controls">
              <input type="file" name="pvImg" />
              </div>
              </div>
            </div>
            {{Form::hidden('_method','PUT')}}
              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn btn-primary" type="submit" value="Next" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
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
    $('#gerepv').addClass('active');
});
</script>
<script>
  // Get element references
  var confirmBtn = document.getElementById('confirmPosition');
  var onClickPositionView = document.getElementById('onClickPositionView');
  var onIdlePositionView = document.getElementById('onIdlePositionView');
  var map = document.getElementById('map');

  // Initialize LocationPicker plugin
  var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: 34.736400840085984,
    lng: 10.756306222350304
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });

  // Listen to button onclick event
  confirmBtn.onclick = function () {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    document.getElementById("pvMapx").value=location.lat;
    document.getElementById("pvMapy").value=location.lng;
  };
</script>
@endsection
