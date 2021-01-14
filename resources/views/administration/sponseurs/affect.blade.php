@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i  class="icon-home" ></i>Dashboard</a><i >></i><a  href="/sponseurs"> Gére Sponseurs</a>><a class="current"  href="/sponseurs/affect">Affecter Sponseur</a></div></div>
  <div class="container-fluid">
 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Form Elements</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" action="{{url('affectspon')}}" class="form-horizontal">
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
              <label style="width: 183px;" class="control-label">Ajouter Les Sponseur </label>
              <div class="controls">
                <select multiple name="sponseurs[]" id="sponseurs" >
                @foreach($sponseurs as $sponseur)
                  <option>{{$sponseur->idSpon}},{{$sponseur->nomSpon}}</option>
                @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
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
