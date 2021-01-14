
  
  <!--
  <div>
  <div class="container box">
   <div class="form-group">
        <select name='soire' id="soire" class="form-control input-lg dynamic" data-dependent ="ticket">
        <option value="">Select soire</option>
        @foreach($fest->soires as $soire)
        <option value="{{$soire->idSoi}}" >{{$soire->idSoi}}</option>
        @endforeach
        </select>
  </div>

  <div class="form-group">
        <select name='ticket' id="ticket" class="form-control input-lg">
        <option value="">Select ticket</option>
        </select>
        {{ csrf_field() }}
  </div>
  </div>
  <div id="tic"></div>
</div>

-->





<div class="wraper vertical-center">
<form method="POST" action="{{ route('reserver') }}" id="reservationform">
{{ csrf_field() }}
<div class="container">
    <div id="app">
        <step-navigation :steps="steps" :currentstep="currentstep">
        </step-navigation>
        
        <div v-show="currentstep == 1">
        <h2 class="top-bar__headline ">RESERVÉ</h2>
            <h3>Choisir la Soiré a Réervé</h3>
            <div class="form-group">
                <select name='soire' id="soire" class="form-control input-lg dynamic" data-dependent ="ticket">
                <option value="">Select soire</option>
                @foreach($fest->soires as $soire)
                <option value="{{$soire->idSoi}}" >{{$soire->nomSoi}} Le: {{$soire->dateSoi}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div v-show="currentstep == 2">
            <div id="tic" class="row" ></div>
            <div class="form-group">
                {{ csrf_field() }}
            </div>
        </div>

        <div v-show="currentstep == 3">
        <div id="payment-stripe" class="container">
                    <div class= "row">
                    <h3 style="color:black;">Details de Payment
                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png"></h3>
                    </div>
                    <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                <input type="text" class="form-control" id="nom" disabled name="nom" placeholder="Nom" required value="{{Auth::user()->name}}"  />
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                            </div>
                    </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                            <div class="input-group">
                            <input type="text"  class="form-control" id="prenom" disabled name="Prenom" placeholder="prenom" value="{{Auth::user()->prenom}}"   required  />
                            <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                        </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                <input type="text" class="form-control" disabled  id="cin" name="cin" placeholder="cin" value="{{Auth::user()->cin}}" disabled  required  />
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                            <div class="input-group">
                            <input type="text" class="form-control" disabled id="tel" name="tel" placeholder="tel" value="{{Auth::user()->tel}}"  required  />
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        </div>
                        </div>
                            </div>
                        </div>
                   
                    <div class="form-group">
                    <div class="input-group">
                    <input type="email" class="form-control" disabled name="email" placeholder="email" value="{{Auth::user()->email}}" required  />
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                   </div>
                   </div> 
        <div class="row">   
        <div class="col-sm-12"> 
        <div class="form-group">            
        <label class="lab" id="labo">Nombre de place a Reserver : </label> 
        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
        <input type="number" id="number" name="nbplacedis" id="nbplacedis" min="1" max="10" value="1" />
        </div> 
        </div> 
        </div>
  <div class="row text-left">
    <div class="col-sm-12">
      <div class="form-group">
        <label for="cc-number" class="control-label" style="color:black">numero carte bancaire<small class="text-muted">[<span data-payment="cc-brand"></span>]</small></label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>                                    
          <input id="cc-number" type="tel" class="input-lg form-control cc-number" name="cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" data-payment='cc-number' required>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="form-group">
        <label style="color:black" >Expiration (MM/YYYY)</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" name="cc-exp"  autocomplete="cc-exp" placeholder="•• / ••••" data-payment='cc-exp' required>
        </div>
      </div>
    </div>        
    <div class="col-sm-4">
      <div class="form-group">
        <label style="color:black" >CVC Code</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" name="cc-cvc"  autocomplete="off" placeholder="•••" data-payment='cc-cvc' required>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>

        <step v-for="step in steps" :currentstep="currentstep" :key="step.id" :step="step" :stepcount="steps.length" @step-change="stepChanged">
        </step>

        <script type="x-template" id="step-navigation-template">
            <ol class="step-indicator">
                <li v-for="step in steps" is="step-navigation-step" :key="step.id" :step="step" :currentstep="currentstep">
                </li>
            </ol>
        </script>

        <script type="x-template" id="step-navigation-step-template">
            <li :class="indicatorclass">
                <div class="step"><i :class="step.icon_class"></i></div>
                <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
            </li>
        </script>

        <script type="x-template" id="step-template">
            <div class="step-wrapper" :class="stepWrapperClass">
                <button type="button" class="btn btn-primary" @click="lastStep" :disabled="firststep">
                    Précedent
                </button>
                <button type="button" class="btn btn-primary" @click="nextStep" :disabled="laststep">
                    Suivant
                </button>
                <button type="submit" class="btn btn-primary" v-if="laststep">
                    Submit
                </button>
            </div>
        </script>
    </div>
</div>
</form>
</div>
