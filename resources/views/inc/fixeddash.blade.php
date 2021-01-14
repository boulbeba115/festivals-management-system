<!--Header-part-->
<div id="header">
  <h1 style='background: url("{{asset('images/backend_img/logo.png') }}") no-repeat scroll 0 0 transparent;'>
  <a href="dashboard.html">Matrix Admin</a>
</h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bonjour Boulbeba</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> Mon Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> Mes Objectif</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Déconnection</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> nouvelle message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    
    <li class=""><a title="" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i><span class="text">Logout</span></a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i>Dashboard</a>
  <ul>
    <li id="#dashboard" class="active"><a href="/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li id="gerefest"> <a href="/festivale"><i class="icon icon-signal"></i> <span>Géré Festivales</span></a> </li>
    <li id="gerespec" class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Programe</span></a>
      <ul>
        <li><a href="/soire">Ajouter soiré</a></li>
        <li><a href="/spectacle">Ajouter spectacle au Soiré</a></li>
        <li><a href="/affectticket">Affecté ticket au Soiré</a></li>
      </ul>
    </li>
    <li id="consultres"> <a href="/lesreservation"><i class="icon icon-inbox"></i> <span>Les Réservations </span></a> </li>
    <li id="gereart"><a href="/artiste"><i class="icon icon-th"></i> <span>Géré Artistes</span></a></li>
    <li id="geretik"> <a href="/ticket"><i class="icon icon-th-list"></i> <span>Géré Tickets</span></a> </li>
    <li id="gereact"><a href="/actualite"><i class="icon icon-fullscreen"></i> <span>Géré Actualité</span></a></li>
    <li id="gerepv"><a href="/pointvente"><i class="icon icon-tint"></i> <span>Géré Point Ventes</span></a></li>
    <li id="gerescene"><a href="/scene"><i class="icon icon-tint"></i> <span>Géré Scénes</span></a></li>
    <li id="gerespon"><a href="/sponseurs"><i class="icon icon-pencil"></i> <span>Géré Sponseurs</span></a></li>
    <li id="gerepm"><a href="/partmedia"><i class="icon icon-file"></i> <span>Géré Partenaires Média</span></a></li>
    <li  id="geremusic"> <a href="/music"><i class="icon icon-info-sign"></i> <span>Géré Musiques</span></a></li>      
</div>
<!--sidebar-menu-->