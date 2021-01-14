@extends('layouts.dash')

@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/ticket" class="current">Géré Tickets</a></div>  
</div>
@include('inc.messages')
  <h3 style="text-align:center; color:#ed9d9d;">Géré Les Tickets</h3>
  <div class="container-fluid">
  <h4 style="text-align:center;">Liste des Tickets </h4>
  <a style="float: right;" href="ticket/create" class="btn btn-primary">Ajouter Ticket</a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Les Tickets Enregistrer</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Num Ticket</th>
                  <th>Type</th>
                  <th>Courte Description</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tickets as $ticket)
                <tr >
                  <td style="text-align:center;">{{$ticket->idTic}}</td>
                  <td style="text-align:center;">{{$ticket->typeTic}}</td>
                  <td style="text-align:center;">{{$ticket->desTic}}</td>
                  <td style="text-align:center;"><a href="{{action('TicketController@edit', $ticket->idTic)}}" class="btn btn-warning">Modifier</a></td>
                  <td style="text-align:center;">
                  {!!Form::open(['onclick'=>'return confirm("Tu est sur de Supprimer cette Ticket, elle peut etre affecter a une soiré ?")' ,'action' => ['TicketController@destroy', $ticket->idTic], 'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                   {!!Form::close()!!}
                  </td>
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
    $('#geretik').addClass('active');
});
</script>
@endsection
