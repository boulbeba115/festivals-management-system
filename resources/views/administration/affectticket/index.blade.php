@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/affectticket" class="current">Affecter Ticket au Soiré</a></div>  </div>
  @include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Affecter Ticket au Soiré</h3>
  <hr>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Affectation</h4>
  <a style="float: right;" href="affectticket/create" class="btn btn-primary">Affecter</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Liste Des Affectation </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Soire</th>
                  <th>Nom Soire</th>
                  <th>Num Ticket </th>
                  <th>Type Ticket </th>
                  <th>Prix Ticket </th>
                  <th>Quantité Ticket </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affectations as $affectation)
                @foreach($affectation->tickets as $ticket)
                <tr >
                  <td style="text-align:center;">{{$affectation->idSoi}}</td>
                  <td style="text-align:center;">{{$affectation->nomSoi}}</td>
                  <td style="text-align:center;">{{$ticket->idTic}}</td>
                  <td style="text-align:center;">{{$ticket->typeTic}}</td>
                  <td style="text-align:center;">{{$ticket->pivot->prixTic}}</td>
                  <td style="text-align:center;">{{$ticket->pivot->nbTicDes}}</td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Affectation ?")' ,'action' => ['AffectticketController@suppaffect', $affectation->idSoi,$ticket->idTic], 'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                  {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach

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
    $('#gerespec').addClass('active');
});
</script>
@endsection
