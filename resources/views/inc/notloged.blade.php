
@if(count($errors)>0)
<script>window.location.href = "/#reserver";</script>
@endif
<div id="back">
  <canvas id="canvas" class="canvas-back"></canvas>
  <div class="backRight">    
  </div>
  <div class="backLeft">
  </div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2>Sign Up</h2>
        <form id="form_signup" method="POST" action="{{ route('register') }}" >
        {{ csrf_field() }}
        <div class="row">
         <div class="col-sm-6">
         <div class="form-element form-stack {{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
         </div>
         <div class="col-sm-6">
         <div class="form-element form-stack {{ $errors->has('prenom') ? ' has-error' : '' }}">
          <input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Prenom" required>
            @if ($errors->has('prenom'))
                <span class="help-block">
                    <strong>{{ $errors->first('prenom') }}</strong>
                </span>
            @endif          
            </div>
         </div>
         </div>
          

          <div class="form-element form-stack {{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email" required>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif          
          </div>
          <div class="row">
         <div class="col-sm-6">
         <div class="form-element form-stack {{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="cin" type="number"  name="cin" value="{{ old('cin') }}" placeholder="Cin" required>
          @if ($errors->has('cin'))
              <span class="help-block">
                  <strong>{{ $errors->first('cin') }}</strong>
              </span>
          @endif   
          </div>
         </div>
         <div class="col-sm-6">
         <div class="form-element form-stack {{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="tel" type="number"  name="tel" value="{{ old('tel') }}" placeholder="Numero Telephone" required>
          @if ($errors->has('numTel'))
              <span class="help-block">
                  <strong>{{ $errors->first('tel') }}</strong>
              </span>
          @endif  
          </div>
         </div>
         </div>
          <div class="form-element form-stack">
          <input id="pwd" type="password"  name="password" placeholder="Mot de Pass"required>
          @if ($errors->has('pwd'))
              <span class="help-block">
                  <strong>{{ $errors->first('pwd') }}</strong>
              </span>
          @endif          
          </div>
          <div class="form-element form-stack">
          <input id="pwd2" type="password"  name="pwd2" placeholder="Confirmer Mot de Pass" required>
          </div>
          <div class="form-element form-submit">
            <button id="signUp" class="signup" type="submit" name="signup">Crée Compte</button>
            <button id="goLeft" class="signup off">Connecter</button> 
          </div>
        </form>
      </div>
    </div>
    <div class="right">
      <div class="content">
        <h2>Connecter Sur Votre Compte</h2>
        <form id="form-login" method="POST" action="{{ route('login') }}">
           {{ csrf_field() }}
          <div class="form-element form-stack {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-element form-stack {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="password" class="form-label">Mot de Pass</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-element form-submit">
            <button id="logIn" class="login" type="submit" name="login">Connecter</button>
            <button id="goRight" class="login off" name="signup">S'inscrire</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
