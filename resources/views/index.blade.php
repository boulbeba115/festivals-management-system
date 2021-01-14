@extends('layouts.main')

@section('content')
      <!-- START CONTENT -->
      <div class="main section-wrapper" id="fullpage">
         <!-- START HOME SECTION -->
         <section class="l-screen home-section ">
            <div class="container-fluid">
               <!-- START HOME CONTENT -->
               <div id="container" class="wrapper">
                  <ul id="scene" class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15" data-mode="cursor">
                     <li id="parallax-home" class="layer" data-depth="0.10">
                        <div id="background-home-2"></div>
                     </li>
                     <li>
                        <div class="bg_pattern"></div>
                     </li>
                     <li class="layer" data-depth="0.20">
                        <div class="home_title"><img src="images/home-logo.png" class="home-logo"  alt="logo" ></div>
                     </li>
                     <li class="layer" data-depth="0.20">
                        <h6 class="title_content">&nbsp; {{$fest->nomFes}} &nbsp;</h6>
                     </li>
                     <li class="layer" data-depth="0.20">
                        <h6 class="date_content">&nbsp; DU {{$fest->dateDebFes}} AU {{$fest->dateFinFes }} &nbsp;</h6>
                     </li>
                  </ul>
               </div>
               <!--END HOME CONTENT-->
            </div>
         </section>
         <!--END HOME SECTION -->
         <!-- START TIMELINE SECTION-->
        
<section class="l-screen timeline-section">
<div class="tl-wrapper" style="width:95%;">
@if(count($fest->soires)>0)
  <ul class="timeline">
  @foreach($fest->soires as $soire)
    <li class="tl-item" data-year="{{$soire->dateSoi}}">
      <div class="tl-image"><img style="" class="img-cover" src="storage/soire/{{$soire->ImgSoi}}"/></div>
      <div class="tl-copy">
        <h3 style="text-align:center">{{$soire->nomSoi}}</h3>
        <hr>
        <h4 align="center">{{$soire->dateSoi}}</h4>
        <div class="progcont">
        @foreach($soire->spectacles as $spec)
        <div class="tl-description">
        <h5>SPECTACLE : {{$spec->nomSpec}}<h5>
        <h6>De {{$spec->tempDebSpec}} Au {{$spec->tempFinSpec}}</h6>
        <h6>Type : {{$spec->typeSpec}}</h6>
        </div>
        @endforeach
        <hr>
        <p>{{$soire->desSoi}}</p>
        </div>
      </div>
    </li>
    @endforeach
  
  </ul>    
  @else
  <header class="top-bar" id="artist_head"  >
  <h2 class="top-bar__headline">Ce Festivale Ne Contient Pas Des Soiré</h2>
  </header>
    @endif
</div>
            
</section>
         <!-- END TIMELINE  SECTION -->
         <!-- START ARTIST SECTION -->
         <?php $i=1;$j=1;$k=0;?>
         <section class="l-screen  artist-section">
         @if(count($fest->soires) > 0)
            <div class="container-fluid" id="artist_all_container">
               <header class="top-bar" id="artist_head"  >
                  <h2 class="top-bar__headline">ARTISTS</h2>
               </header>
               <div>
                  <div class="row vertical-center">
                     <!-- CLOSE BUTTON-->
                     <span id="artist_back"><a href="#artist-section/0" class="artist-cd-close" title="close"></a></span>
                     <div class="artist_content">
                        <div class="artist_grid"  >
                           <!-- START ARTIST -->
                           <div class="m-artists-container l-slide">
                              <div class="project-top" ></div>
                              <div class="container">
                              @foreach($fest->soires as $soire)
                                @foreach($soire->spectacles as $spec)
                               <!-- START ARTIST -->
                                 <figure class="effect-artist">
                                    <img src="storage/artiste/{{$spec->artist->ImgArt}}" style="filter: grayscale(100%);width:350;height:260px;" alt="" />
                                    <figcaption>
                                       <!-- NAME -->
                                       <h2>{{$spec->artist->NomArt}} {{$spec->artist->PrenomArt}}</h2>
                                       <!-- DETAILS -->
                                       <p> {{$soire->dateSoi}}</p>
                                       <!--VIEW MORE LINK -->
                                       <a href="#artist-section/artist{{$spec->artist->idArt}}"><span class="artist-name">{{$spec->artist->NomArt}}</span> </a>
                                    </figcaption>
                                 </figure>
                                 <!-- END ARTIST -->
                                 
                                 @endforeach
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              @foreach($fest->soires as $soire)
                @foreach($soire->spectacles as $spec)
               <!-- START ARTIST SLIDER CONTENT-->
               <div class="l-slide  artist-slide artist{{$spec->artist->idArt}}"
                  style="background: url(storage/spectacle/{{$spec->imgSpec}}) no-repeat 50% 50%;background-size:cover;"
                   data-anchor="artist{{$spec->artist->idArt}}">
                  <ul id="artist-profile-{{$spec->artist->idArt}}" class="scene unselectable artist-profile" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15" data-mode="cursor">
                     <li  class="layer" data-depth="0.10">
                        <div id="artist-{{$spec->artist->idArt}}" class="artist-image"></div>
                     </li>
                     <li>
                        <div class="bg_pattern11"></div>
                     </li>
                     <li class="layer" data-depth="0.20">
                        <!---->
                     </li>
                     <li class="layer" >
                     <p class="artist-slide-prev"> <i class="fa fa-arrow-left"></i>
                      </p>
                      <p class="artist-slide-next"> <i class="fa fa-arrow-right"></i>
                  </p>
                     <div class="contartist">
                     <div class="detail">
                     <h2 class="artist-title">{{$spec->artist->NomArt}} {{$spec->artist->PrenomArt}}</h2>
                     <h4 class="datespec"><i class="fa fa-calendar"></i> {{$soire->dateSoi}} de {{$spec->tempDebSpec}} au {{$spec->tempFinSpec}}</h4>
                     <h5 class="scenee"><i class="fa fa-map-marker	"></i>  {{$soire->scene->nomScene}}</h5>
                     <hr>
                     <p class="desart">{{$spec->artist->DesArt}}</span>
                        </p>
                     </div>
                        <!-- SOCIAL LINKS 
                        <div class="artist-slide-social">
                           <a target="_blank" href="https://soundcloud.com/"><i class="fa fa-soundcloud"></i></a>
                           <a target="_blank" href="https://www.tumblr.com/"><i class="fa fa-tumblr"></i></a>
                           <a target="_blank" href="http://www.youtube.com/"><i class="fa fa-youtube"></i></a>
                           <a target="_blank" href="https://vimeo.com/"><i class="fa fa-vimeo"></i></a>
                           <a target="_blank" href="https://www.spotify.com/"><i class="fa fa-spotify"></i></a>
                        
                          </div>-->
                        </div>
                     </li>
                  </ul>
                 
               </div>
               @endforeach
               @endforeach
               <!-- END ARTIST SLIDER CONTENT-->
               <div class="artist_desc" id="artist-description">
                  <div class="artistbar">
                     <div class="artist-bar color-1">
                     </div>
                  </div>
                  <div class="artistbar">
                     <div class="artist-bar color-2">
                     </div>
                  </div>
               </div>
            </div>
            @else
          <header class="top-bar" id="artist_head"  >
          <h2 class="top-bar__headline">Pas de Artiste Affecter a Ce Festivale</h2>
          </header>                               
            @endif
         </section>
         <!-- END ARTIST SECTION -->
         <!-- ACTUALITE SECTION -->
          <section class="l-screen gallery-section"><div class="wrapper">
          @if(count($fest->soires) > 0)
          <div class="bg_pattern"></div>
          <header class="top-bar">
          <h2 class="top-bar__headline2 animated">Actualité</h2>
          </header>
          <div class="item-bg"></div>

          <div class="news-slider">
            <div class="news-slider__wrp swiper-wrapper">
              @foreach($fest->actualites as $actualite)
              <div class="news-slider__item swiper-slide">
                <a href="#" class="news__item">
                  <div class="news-date">
                    <span class="news-date__title">{{$actualite->created_at->format('d') }}</span>
                    <span class="news-date__txt">{{$actualite->created_at->format('M') }}</span>
                  </div>
                  <div class="news__title">
                  {{$actualite->titreAct }}
                  </div>

                  <p class="news__txt">
                  {!!trunc($actualite->corpAct, 20) !!}
                  </p>

                  <div class="news__img">
                    <img src="/storage/actualite/{{$actualite->ImgAct }}" alt="news">
                  </div>
                </a>
              </div>
              @endforeach
            </div>

            <div class="news-slider__ctr">

              <div class="news-slider__arrows">
                <button class="news-slider__arrow news-slider-prev">
                  <span class="icon-font">
                    <svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg>
                  </span>
                </button>
                <button class="news-slider__arrow news-slider-next">
                  <span class="icon-font">
                    <svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
                  </span>
                </button>
              </div>

              <div class="news-slider__pagination"></div>

            </div>

          </div>

          </div>

          <svg hidden="hidden">
          <defs>
            <symbol id="icon-arrow-left" viewBox="0 0 32 32">
              <title>arrow-left</title>
              <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
            </symbol>
            <symbol id="icon-arrow-right" viewBox="0 0 32 32">
              <title>arrow-right</title>
              <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
            </symbol>
          </defs>
          </svg>
          @else
          <header class="top-bar" id="artist_head"  >
          <h2 class="top-bar__headline">Pas d'Actualité Trouvé</h2>
          </header>
          @endif
          </section>
         <!--START  SPONSOR  SECTION-->
         <section class="l-screen sponsor-section">
         @if(count($fest->sponseurs) > 0)
            <div class="bg_pattern"></div>
            <div class="sub_div">
               <header class="top-bar">
                
                  <h2 class="top-bar__headline animated">SPONSEUR</h2>
               </header>
               <div class="container  vertical-center">
                  <div class="row ">
                     <div id="sponsors_details">
                     <?php $i=1; ?>
                        <div id="sponsors" class="sponsor-wrap effects">
                           <!-- START SPONSOR -->
                           @foreach ($fest->sponseurs as $sponseur) 
                           <a href="{{$sponseur->siteSpon}}" target="_blank class="col-md-3 col-sm-6" id="sponsor{{$i++}}">
                              <span class="sponsor_text">
                                 <!-- PNG ICON -->
                                 <img src="/storage/sponseur/{{$sponseur->sponImg}}"  alt="{{$sponseur->nomSpon}}">
                              </span>
                           </a>
                           @endforeach
                           <!-- END SPONSOR -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @else
          <header class="top-bar" id="artist_head"  >
          <h2 class="top-bar__headline">Pas de Sponseur Trouvé</h2>
          </header>
          @endif
         </section>
         <!-- END sponseur SECTION -->
        <!--START  partmedia  SECTION-->
          <section class="l-screen partmedia-section sponsor-section">
          @if(count($fest->partmedias) > 0)
            <div class="bg_pattern"></div>
            <div class="sub_div">
               <header class="top-bar">
                  <h2 class="top-bar__headline animated">PARTENAIRES MÉDIA</h2>
               </header>
               <div class="container  vertical-center">
                  <div class="row ">
                     <div id="sponsors_details">
                     <?php $i=1; ?>
                        <div id="sponsors" class="sponsor-wrap effects">
                           <!-- START partenaire media  -->
                           @foreach ($fest->partmedias as $partmedia) 
                           <a href="{{$partmedia->sitePm}}" target="_blank  class="col-md-3 col-sm-6" id="sponsor{{$i++}}">
                              <span class="sponsor_text">
                                 <!-- PNG ICON -->
                                 <img src="/storage/partmedia/{{$partmedia->PmImg}}"  alt="{{$sponseur->nomSpon}}">
                              </span>
                           </a>
                           @endforeach
                           <!-- END partenaire media  -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @else
          <header class="top-bar" id="artist_head"  >
          <h2 class="top-bar__headline">Pas de Partenaire Media Trouvé</h2>
          </header>
          @endif
         </section>

         <!-- END partmedia SECTION -->
         <!--START POINT DE VENTE SECTION -->
         <section class="l-screen askus-section" id="askus">
         @if(count($fest->poinventes) > 0)
            <div class="bg_pattern"></div>
            <div class="container-fluid  " id="askus-container">
               <header class="top-bar">
                  <h2 class="top-bar__headline animated">Point de vente</h2>
               </header>
               <div class="wraper vertical-center">
                  <div class="askus_content_bar ">
                     <div class="askus-head">
                     </div>
                    <?php $i=1; ?>
                     @foreach ($fest->poinventes as $poinvente) 
                     <!--START ASK US 1-->
                     <div class="askusbar col-md-4 col-sm-4 col-xs-12" data-askus-number="{{$i}}">
                        <div class="askus-bar dark">
                           <div class="title">
                              <p class="askus_questions " id="qst_{{$i}}">{{$poinvente->nomPv}} </p>
                              <!-- ASK US QUESTION -->
                              <div class="askus_sub_content">
                                 <!-- DESCRIPTION ON MOUSE CLICK -->
                                 <h3>{{$poinvente->nomPv}}<br><br><i class="fa fa-university"> Adresse:</i> {{$poinvente->adrPv}} <br><br><i class="fa fa-phone"> Tel:</i>{{$poinvente->telPv}}<br><br> <i class="fa fa-fax"> Fax:</i>{{$poinvente->faxPv}}</h3>
                                 <div class="hidden askus-questions__answer-text" data-answer-number="{{$i++}}">
                                 <img class="pointvimg"src="/storage/pointvente/{{$poinvente->pvImg}}"  alt="{{$poinvente->nomPv}}">  
                                </div>
                              </div>
                              <div  class="answer-button"> </div>
                           </div>
                        </div>

                     </div>

                     @endforeach
                     <!--END ASK US1-->
                  </div>
               </div>
               <div id="askus-answers">
               <div id="askus-answers-inner">
                     <h3>Ask us Question </h3>
                     <div class="askus-show-answer">
                     </div>
                  </div>
                  <div class="askus-controls">
                     <div class="askus-controls-inner">
                        <span class="askus-close-button">
                        <a   href="#askus-section"  id="askus_close" class="cd-close" title="close"></a>
                        </span>
                        <a href="#askus-section" class="askus-prev-button">
                        <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#askus-section" class="askus-next-button">
                        <i class="fa fa-angle-right"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div>
            </div>
            @else
          <header class="top-bar" id="artist_head"  >
          <h2 class="top-bar__headline">Pas de Point de Vente Trouvé</h2>
          </header>
          @endif
         </section>

         <!-- END ASK US SECTION -->
<!--Map -->
<section class="l-screen  map ">

            {!! $map['html'] !!}

</section>
<!-- Map -->
<!--Reservé -->
<section class="l-screen  reserver">
@if( Auth::check() )
@include('inc.loged')
@else
@include('inc.notloged')
@endif

</section>
<!-- Reservé -->

         <!--START CONTACT SECTION -->
         
         <section class="l-screen contact-section" id="contact-form-container">
            <div class="bg_pattern"></div>
            <header class="top-bar">
               <h2 class="top-bar__headline ">CONNECTER</h2>
            </header>
            <div class="container-fluid vertical-center">
               <div class="contact">
                  <div class="contact-content">
                     <div class="container">
                        <div class="col-md-12 contact-right">
                           <!--START CONTACT DETAILS -->
                           <div class="contact-info-wrapper">
                              <div class="contact-info text-center col-sm-12 fadeIn animated">
                                 <div class="col-sm-4">
                                    <h3>{{$fest->nomFes}}</h3>
                                    <p>{{$fest->adrFes}}</p>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="phone">
                                       <h3>Appelez-Nous</h3>
                                       <p>+216 {{$fest->telFes}}</p>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="email">
                                       <h3>Envoyer email</h3>
                                       <p>{{$fest->mailFes}}</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--END CONTACT DETAILS -->
                           <!--START CONTACT FORM INPUTS-->
                           <form action="#" id="mail_form" method="post">
                              <input type="text" placeholder="Nom" name="contact[name]">
                              <input type="text" placeholder="Email" name="contact[email]">
                              <textarea placeholder="Message" id="message" name="contact[message]"></textarea>
                              <br>
                              <div class="submit">
                                 <span> <input type="submit" value="Envoyer Message"></span>
                              </div>
                           </form>
                           <!--END CONTACT FORM INPUTS-->
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="result"></div>
                  </div>
               </div>
            </div>
         </section>
         <!-- END CONTACT SECTION -->
         </section>
         <section class="l-screen footer-section"  >
            <div class="bg_pattern"></div>
            <header class="top-bar">
               <h2 class="top-bar__headline ">CRÉDITS</h2>
            </header>
            <div class="container-fluid vertical-center">
               <div class="credit-wrapper">
                  <div class="footer-box-container ">
                     <div class="footer-box box1">
                        <div class="inner">
                           <p><span class="number count" data-count="{{count($fest->sponseurs)}}">{{count($fest->sponseurs)}}</span> <span class="credit-number-desc">Nombre de Sponsors</span>
                           </p>
                        </div>
                     </div>
                     <div class="footer-box box2">
                        <div class="inner">
                           <p><span class="number count"  data-count="{{count($fest->partmedias)}}">{{count($fest->partmedias)}}</span> <span class="credit-number-desc">Partenaire Media</span>
                           </p>
                        </div>
                     </div>
                     <div class="footer-box box3">
                        <div class="inner">
                           <p><span class="number count"  data-count="{{count($fest->poinventes)}}">{{count($fest->poinventes)}}</span><span class="credit-number-desc">Point de Vente</span>
                           </p>
                        </div>
                     </div>
                     <div class="footer-box box4">
                        <div class="inner">
                           <p><span class="number count"  data-count="{{$nbres}}">{{$nbres}}</span><span class="credit-number-desc">Total de Reservation</span>
                           </p>
                        </div>
                     </div>
                     
                  </div>
                  <div class="footer-text">
                     <p><span class="top-head">Life  begins  </span>  at Night
                        <br><span class="top-head">Make the most out of fest and   </span> worry about it all tomorrow
                        <br> <span class="top-head">There are shortcuts to happiness,<br>  </span> and dancing is one of them
                        <span class="top-head">If you obey all the rules you miss  </span>
                        <br>all the fun
                        <span class="top-head">Drink all day  </span>play all night
                     </p>
                  </div>
                  <div class="footer-box-container ">
                     <div class="footer-box2 box1">
                        <div class="inner">
                           <img src="images/5.png"  alt="credit-logo">
                        </div>
                     </div>
                     <div class="footer-box2 box2" >
                        <div class="inner">
                           <img src="images/7.png" alt="credit-logo">
                        </div>
                     </div>
                     <div class="footer-box2 box3">
                        <div class="inner">
                           <img src="images/11.png" alt="credit-logo">
                        </div>
                     </div>
                     <div class="footer-box2 box4">
                        <div class="inner">
                           <img src="images/10.png" alt="credit-logo">
                        </div>
                     </div>
                  </div>
                  <ul class="credits-social">
                     <li><a target="_blank" href="https://soundcloud.com/" class="bt-icon"><i class="fa fa-soundcloud"></i></a>
                     </li>
                     <li><a target="_blank"  href="https://vimeo.com/" class="bt-icon"><i class="fa fa-vimeo"></i></a>
                     </li>
                     <li><a target="_blank" href="http://www.youtube.com/" class="bt-icon"><i class="fa fa-youtube"></i></a>
                     </li>
                     <li><a target="_blank" href="https://www.spotify.com/" class="bt-icon"><i class="fa fa-spotify"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
         </section>
      </div>
      <!-- END MAIN DIV -->

@endsection
<!---------------------------------------------------------->
<?php
        function trunc($phrase, $max_words) {
          $phrase_array = explode(' ',$phrase);
          if(count($phrase_array) > $max_words && $max_words > 0)
              $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
          return $phrase;
        }
?>
<!---------------------------------------------------------->
