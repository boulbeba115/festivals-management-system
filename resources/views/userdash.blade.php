@extends('layouts.app')

@section('content')
  <div class="container">   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Mes Réservation</h4>
    </div>
    <div class="col-md-5" align="right">
    </div>
   </div>
   <br />
   <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Mes Réservation</h5>
          </div>
          <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
     <thead>
      <tr>
       <th>Num</th> 
       <th>Utilisateur</th>
       <th>Festivale</th>
       <th>Soiré</th>
       <th>nb Place Réservé</th>
       <th>Reservation</th>
      </tr>
     </thead>
     <tbody>
     @foreach($lesres as $row)
      <tr>
       <td>{{ $row->idRes }}</td>
       <td>{{$row->user->cin}}, {{ $row->user->name}} {{ $row->user->prenom}}  </td>
       <td>{{ $row->Soire->festivale->nomFes}}</td>
       <td>{{ $row->Soire->nomSoi }}</td>
       <td>{{ $row->nbRes }}</td>
       <td><a href="{{ url('/user/pdf/'.$row->idRes)}}" _blank class="btn btn-danger">Télecharger</a></td>
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
   </div>
   </div>
 </body>
</html>
@endsection
