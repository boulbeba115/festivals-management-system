@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i  class="icon-home" ></i>Dashboard</a><i >></i> <a href="/music" >Gére Musique</a>><a class="current"  href="/music">Affecter Musique Liste</a></div></div>
  <div class="container-fluid">
 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Affectation Liste de musique</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" action="{{url('affectmusic')}}" class="form-horizontal">
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
              <label style="width: 183px;" class="control-label">Ajouter Les musiques </label>
              <div class="controls">
                <select multiple name="musics[]" id="musics" >
                @foreach($musics as $music)
                  <option>{{$music->idMu}},{{$music->libMu}}</option>
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
    $('#geremusic').addClass('active');
});
</script>
@endsection
