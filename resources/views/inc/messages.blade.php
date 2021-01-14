@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div align="center" class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div align="center" class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div align="center"  class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if(session('succ'))
@if(count(session('succ')) > 0)
<div align="left" class="alert alert-success">
    @foreach(session('succ') as $succs)
    <li> {{$succs}}</li>
    @endforeach
</div>
@endif
<div>
@endif
@if(session('err'))


@if(count(session('err')) > 0)
<div align="left" class="alert alert-danger">
    @foreach(session('err') as $erre)
            <li>{{$erre}}</li>
    @endforeach
@endif
</div>
@endif