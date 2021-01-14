@extends('layouts.log')

@section('content')
<div id="loginbox">            
            <form id="loginform" class="" method="POST" action="{{ route('login') }}">
            {{csrf_field()}}
				 <div class="control-group normal_text"> <h3><img src="{{ asset('images/backend_img/logo.png') }}" alt="Logo" /></h3></div>
                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lg"><i class="icon-user"> </i></span><input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="password" type="password" placeholder="password" class="form-control" name="password" required> 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox" style="margin-left: 9%;">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                </div>
                
                <div class="form-actions">
                   <!--Reset password <span class="pull-left"><a href="{{ route('password.request') }}" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    -->
                    <button  type="submit" class="btn btn-primary pull-right">
                                    Login
                                </button>
                </div>
                
            </form>
        </div>
@endsection
