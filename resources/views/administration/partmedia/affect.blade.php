@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i  class="icon-home" ></i>Dashboard</a><i >></i> <a  href="/partmedia">Affecter Partenaire Media</a>><a class="current" href="/partmedia/affect">Affecter Partenaire Media</a></div></div>
  <div class="container-fluid">
 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Affecter les Parteneaire Media</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" action="{{url('affectpm')}}" class="form-horizontal">
          {{csrf_field()}} 
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner Le festivale </label>
              <div class="controls">
                <select name="festivale" >
                @foreach($festivales as $festivale)
                  <option>{{$festivale->idFes}},{{$festivale->nomFes}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Ajouter Les Partenaire Media </label>
              <div class="controls">
                <select multiple name="partmedias[]" id="partmedias" >
                @foreach($partmedias as $partmedia)
                  <option>{{$partmedia->idPm}},{{$partmedia->nomPm}}</option>
                @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Affecter</button>
            </div>
          </form>
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
