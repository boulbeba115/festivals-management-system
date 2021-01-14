@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i  class="icon-home" ></i>Dashboard</a><i >></i> <a href="/affectticket" >Affecter Ticket au Soiré</a>><a class="current"  href="/affectticket/create">Ajouter Affectation</a></div></div>
@include('inc.messages')
  <div class="container-fluid">
 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Ajouter Affectation du ticket de Soiré </h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" action="{{url('affectticket')}}" class="form-horizontal" name="basic_validate" id="basic_validate" novalidate="novalidate">
          {{csrf_field()}} 
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner La Soiré </label>
              <div class="controls">
                <select name="soire" >
                @foreach($soires as $soire)
                  <option>{{$soire->idSoi}},{{$soire->nomSoi}},{{$soire->dateSoi}} , {{$soire->festivale->nomFes}} , Edition {{$soire->festivale->tourFes}}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
              <label style="width: 183px;" class="control-label">Selectionner La Ticket</label>
              <div class="controls">
              <select name="ticket" >
                @foreach($tickets as $ticket)
                  <option>{{$ticket->idTic}},{{$ticket->typeTic}}</option>
                @endforeach
                </select>
              </div>
              </div>
              <div class="control-group">
                <label class="control-label">Prix Ticket</label>
                <div class="controls">
                <input type="number" min="0" name="prixTic" id="prixTic" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Quantité Ticket</label>
                <div class="controls">
                <input type="number" min="0" name="nbTicDes" id="nbTicDes" required>
                </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
</div>
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script>
$(document).ready(function(){
   $("li").removeClass("active");
    $('#gerespec').addClass('active');
});
</script>
@endsection
