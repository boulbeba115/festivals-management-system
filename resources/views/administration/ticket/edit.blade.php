@extends('layouts.dash')

@section('content')
<div id="content-header">
<div id="breadcrumb"> <a href="/dashboard" title="dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>><a href="/ticket">Ticket</a>><a href="#" class="current">Modifier Ticket</a> </div>
@include('inc.messages')
<h2 style="text-align:center;">Modifier Ticket "{{$ticket->typeTic}}" </h2>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Ticket</h5>
          </div>
          <div class="widget-content nopadding">
              {!! Form::open(['action' => ['TicketController@update', $id],'class'=>'form-horizontal','method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'basic_validate','name'=>'basic_validate','novalidate'=>'novalidate']) !!}
              {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Type Ticket</label>
                <div class="controls">
                  <input type="text" name="typeTic" id="typeTic" value="{{$ticket->typeTic}}" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Court Description</label>
                <div class="controls">
                <textarea class="form-control" rows="7" style="width:40%;" name="desTic" id="desTic" required>{{$ticket->desTic}}</textarea>
                </div>
            </div>
                  {{Form::hidden('_method','PUT')}}
                  <div class="form-actions">
                  {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                  </div>
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
    $('#geretik').addClass('active');
});
</script>
@endsection
