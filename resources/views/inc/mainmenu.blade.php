<!-- START MENU -->
<div class="navTrigger"><i></i>
      </div>
      <nav class="nav nav1">
         <div class="nav1__links row">
            <a href="#home-section" class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>Accueil</span><br>
               </div>
            </a>
            <a href="#timeline-section" class="nav1__link col-md-3 col-sm-4 col-xs-12" >
               <div class="menu-text" >
                  <span>Programe De Festivale</span>
               </div>
            </a>
            <a href="#artist-section" class="nav1__link col-md-3 col-sm-4 col-xs-12" >
               <div class="menu-text" >
                  <span>ARTISTS</span>
               </div>
            </a>
            <a href="#gallery-section"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>Actualité</span>
               </div>
            </a>
            <a href="#sponsor-section"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>Sponseur et Partenaire Média</span>
               </div>
            </a>
            <a href="#askus-section"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>Point de Vente</span>
               </div>
            </a>
            <a href="#map"  class="nav1__link col-md-3 col-sm-4 col-xs-12" >
               <div class="menu-text" >
                  <span>Position Point de Vente</span>
               </div>
            </a>
            <a href="#reserver"  class="nav1__link col-md-3 col-sm-4 col-xs-12" >
               <div class="menu-text" >
                  @if( Auth::check() )
                  <div class="menu-text" >
                  <span>Reservation</span><br>
                  </div> 
                  @else
                  <div class="menu-text" >
                  <span>Connecter ou Registrer</span><br>
                  </div> 
                  @endif
                  <span></span>
               </div>
            </a>
            <a href="#contact-section"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>CONNECT</span>
               </div>
            </a>
            <a href="#footer-section"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>CREDITS</span>
               </div>
            </a>
            @if( Auth::check() )
            <a href="/user"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span>Mes Reservation</span>
               </div>
            </a>
            @else
            <a href="#footer-section"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span> </span>
               </div>
            </a>
            @endif
            @if( Auth::check() )
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();" class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
            <div class="menu-text" >
            <span>Se Déconnecter</span>
            </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
            @else
            <a href="#"  class="nav1__link col-md-3 col-sm-4 col-xs-12"  >
               <div class="menu-text" >
                  <span> </span>
               </div>
            </a>
            @endif
         </div>
      </nav>
      <!-- END MENU  -->