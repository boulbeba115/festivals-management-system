@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/lesreservation" class="current">Consulter Les Réservation</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Tous Les Réservations</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Réservations </h4>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Réservations</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>Num</th> 
                <th>Festivale</th>
                <th>Soiré</th>
                <th>Nom Utilisateur</th>
                <th>Cin Utilisateur</th>
                <th>jeton</th>
                <th>nb Place</th>
                </tr>
              </thead>
              <tbody>
                @foreach($res as $reservation)
                <tr >
                  <td style="text-align:center;">{{$reservation->idRes}}</td>
                  <td style="text-align:center;">{{$reservation->soire->festivale->nomFes}} Edition : {{$reservation->soire->festivale->tourFes}}</td>
                  <td style="text-align:center;">{{$reservation->soire->nomSoi}}</td>
                  <td style="text-align:center;">{{$reservation->user->name}} {{$reservation->user->prenom}}</td>
                  <td style="text-align:center;">{{$reservation->user->cin}}</td>
                  <td style="text-align:center;">{{ $reservation->codeRes}}</td>     
                  <td style="text-align:center;">{{ $reservation->nbRes }}</td>                                 
                            
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
</div>
</div>
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script>
$(document).ready(function(){
   $("li").removeClass("active");
    $('#consultres').addClass('active');
});
</script>
@endsection
