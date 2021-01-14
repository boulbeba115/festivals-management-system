<!doctype html>
<html lang="en">

<!-- Mirrored from app.ergo7.net/FreeSpirit/demo/single-section.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jul 2018 20:44:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
      <title>festival sfax</title>
      <link href="css/login.css" rel="stylesheet">
      <link rel="stylesheet" href="css/reserve.css">
      <!-- BOOTSTRAP -->

      <link href="css/bootstrap.css" rel="stylesheet">
      <!-- FULLPAGE SCROLL  -->
      <link rel="stylesheet" type="text/css" href="css/jquery.fullpage.css" />
      <link rel="stylesheet" type="text/css" href="css/animate.css" /> 
      <link rel="stylesheet" href="css/fonts/font-awesome/css/font-awesome.css">
      <!-- CUSTOM CSS  -->
      <link rel="stylesheet" type="text/css" href="css/style.css" />
      <link rel="stylesheet" type="text/css" href="css/media.css" />
      <!-- GALLERY -->
      <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" media="screen" title="prettyPhoto main stylesheet" />
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css'>
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800'>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.min.js'></script>
      <link rel="stylesheet" type="text/css" href="css/main.css" />
      <link rel="stylesheet" type="text/css" href="css/timeline.css" />  

   </head>
   <body  id="full-page-scroll" >
      <!--START LOADER -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left">
            <div class="hi"></div>
         </div>
      </div>
      <!--   END LOADER  -->
      <!--   START DISCLAIMER  -->
      <div id="active-disclaimer"></div>
      <div id="disclaimer-container">
         <a class="close">X</a>
         <div id="disclaimer-window">
            <div class="modal-content">
               <a href="#" class="your-class"></a>
               <h1 class="disclaimer-welcome">BIENVENUE</h1>
               <p>Pour Commencer</p>
               <h1>Confirmer Termes et Conditions D'Utilisation</h1>
               <p class="disclaimer-check">
                  <input type="checkbox" id="disclaimer-check"> ACCEPTER TERMES ET CONDITIONS D'UTILISATION
               </p>
               <p>TERMS AND CONDITIONS OF USE</p>
               <p   class="terms-conditions">
                  - Votre âge doit être au moins 18 ans pour compléter la réservation.<br/>
                  - la Reservation se fait avec une carte bancaire valide.<br/>
                  - Tu au Droit de Reseré jusqu à 10 personnes par soirée.<br/>
                  - Si la réservation a été effectuer le remboursement de l'argent et impossible.<br/>
                  - En achetant un billet, vous acceptez de vous soumettre à une
                  Recherche à la TSA, y compris le vidage de vos poches et de vos sacs,
                  avoir tous vos articles examinés, une palpation complète, et éventuellement
                  enlever vos chaussures. Nous nous réservons le droit de refuser l'entrée à quiconque.
                  Nous avons une politique de tolérance zéro pour la consommation et la possession de drogue.
                  Les policiers travailleront à l'intérieur et à l'extérieur de l'événement,
                  et toutes les lois sur les stupéfiants seront strictement appliquées. Être responsable,
                  et faire des choix intelligents.
               </p>
               <button type="button" id="disclaimer-button" disabled="disabled" class="btn btn-danger disclaimer-button">ENTER</button>
            </div>
         </div>
      </div>
      <!--   END DISCLAIMER  -->
      <!--   START MUSIC  -->
      <div id="music-wrapper">
         <div class="audio-control">
            <div class="control-wrapper">
               <div class="button" id="prev">
               </div>
               <div class="button" id="next">
               </div>
            </div>
         </div>
         <div class="center-me">
            <div id="equalizer" class="equalizer"></div>
         </div>
         <audio preload></audio>
         <div id="show-play-list" class="show-play-list">
            <p class="button">
            </p>
         </div>
         <div class="play-list" id="play-list">
            <ol>
            @foreach ($fest->musics as $music)
               <li><a href="#" data-src="storage/musique/{{$music->musicLink}}">{{$music->libMu}}</a></li>
            @endforeach
            </ol>
         </div>
      </div>
      <!--   END MUSIC  -->
      <!--  Include Menu  -->
         @include('inc.mainmenu')
      <!--  end  Menu  -->
      <!-- ************************************************************ -->
                            @yield('content')
    <!-- ************************************************************ -->
    <!-- GOOGLE MAP -->
      <!-- GOOGLE MAP -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js'></script>
         <script src="js/reserve.js"></script>
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jquery-migrate.min.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/iscroll.js"></script>
      <script type="text/javascript" src="js/jquery.fullPage.js"></script>
      {!! $map['js'] !!}
      <script src="js/gallery_modernizr.custom.js"></script>
      <!-- GALLERY -->
      <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
      <script src="js/jquery.easing.1.3.js"></script>
      <!-- PARALLAX-->
      <script src="js/parallax.js"></script>
      <!-- MUSIC PLAYER -->
      <script src="js/audio.js"></script>
      <!-- DISCLAIMER -->
      <script src="js/jquery.cookie.js"></script>
      <!-- TWITTER -->
      <script async src="js/widgets.js" charset="utf-8"></script>
      
      <script src="js/eventPause-min.js"></script>
      <!-- CUSTOM JS -->
      <script src="js/contact.js"></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
      <script>var $j = jQuery.noConflict(true);</script>
   <script>
      $(document).ready(function(){
       console.log($().jquery); // This prints v1.4.2
       console.log($j().jquery); // This prints v1.9.1
      });
   </script>
         <script src="js/custom.js"></script>
         <script src="js/actualit.js"></script>
         <script src="js/timeline.js"></script>
         <script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     /*$('#'+dependent).html(result);*/
     /**/
    /* $('#tic').append(result);*/
    $( "#tic" ).empty();
    $(result).appendTo( "#tic" );
    }

   })
  }
 });

 

});
</script>
<script src='js/login.js'></script>
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script> 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src='js/validate.js'></script>
<script src='js/validatemessage.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.3.2/jquery.payment.min.js'></script>
<script src='js/payment.js'></script>

   </body>

</html>

