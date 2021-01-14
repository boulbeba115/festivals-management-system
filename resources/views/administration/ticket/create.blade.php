@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/ticket">Gére Tickets</a>><a href="ticket/create" class="current">Ajouter Ticket</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Ajouter Ticket </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Ajouter Ticket Form</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('ticket')}}" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Type Ticket</label>
                <div class="controls">
                  <input type="text" name="typeTic" id="typeTic" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Court Description</label>
                <div class="controls">
                <textarea class="form-control" rows="7" style="width:40%;" name="desTic" id="desTic" required></textarea>
                </div>
            </div>
              <div class="form-actions">
                <input type="submit" value="Enregistrer" class="btn btn-success">
              </div>
            </form>
          </div>
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
