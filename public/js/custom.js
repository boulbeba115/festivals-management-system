/*---------------------------------------------------- 
Theme Name: FreeSpirit
Version:    1.0
 
| ----------------------------------------------------------------------------------
| TABLE OF CONTENT
| ----------------------------------------------------------------------------------
-Fullpage js  
-Home  
-Timeline
-Artist Lineup
-Sponsors
-Gallery
-Ask Us
-Home 2
-Disclaimer
-Music Player
-Google map
-Loader
-Menu
-Window Resize

*/
// Dom Ready Function
$(function() {
    'use strict';
    var windowWidth;
    var windowHeight;
    /* Fullpage js initialise
    /*---------------------------------------------------- */
    var scrollingSpeed = 700;
    var artistBack = $('#artist_back'); //artist artist back button
    var parallaxHome = $('#parallax-home');
    var fullpageWrapper = $('#fullpage');
    var fullPageScroll = $('#full-page-scroll');
    var normalPageScroll = $('#normal-page-scroll');

    var disclaimerButton = $("#disclaimer-button");
    var disclaimerContainer = $("#disclaimer-container");
    var activeDisclaimer = $("#active-disclaimer");

    var musicWrapper = $("#music-wrapper");
    var playList = $("#play-list");
    var showPlayList = $("#show-play-list");
    var showPlayListButton = $("#show-play-list .button");

    var ticketContainer = $('#ticket-item-container');
    var fittextHome = $('#fittext-home'); //home page 2
    if (fullPageScroll.length)
        var anchorsList = ['home-section', 'timeline-section', 'artist-section', 'gallery-section', 'sponsor-section','partmedia-section','askus-section', 'map','reserver', 'contact-section', 'footer-section'];
    else if (normalPageScroll.length)
        var anchorsList = ['home-section', 'timeline-section', 'artist-section', 'gallery-section','sponsor-section','partmedia-section', 'gallery-section', 'socail-section', 'askus-section','map','reserver', 'contact-section', 'footer-section'];
    else
        var anchorsList = ['home-section', 'artist-section'];



    var footerSection = $('.footer-section'); //Follow Us section
    if (fullpageWrapper.hasClass("section-wrapper"))
        var fullpageAutoScrolling = true;
    else
        var fullpageAutoScrolling = false;

    function createFullpage(Overflow, ScrollElements) {
        fullpageWrapper.fullpage({
            anchors: anchorsList,
            scrollingSpeed: scrollingSpeed,
            'navigation': true,
            fitToSection: false,
            sectionSelector: '.l-screen',
            slideSelector: '.l-slide',
            css3: true,
            autoScrolling: fullpageAutoScrolling,
            responsiveWidth: 1200,
            scrollOverflow: Overflow,
            normalScrollElements: ScrollElements,
            afterRender: function() {

            },
            controlArrows: false,
            'afterLoad': function(anchorLink, index) {

                var loadedSection = $(this);
                $(loadedSection).addClass('animated');

                windowWidth = $(window).width();
                windowHeight = $(window).height();
                if (index === 1) {

                    $("#music-wrapper").addClass("active");
                } else {
                    $("#music-wrapper").removeClass("active");
                    $("#play-list").removeClass('active');
                    $("#show-play-list .button").removeClass('active');
                }

            },
            'onLeave': function(index, nextIndex, direction) {
                if (index === 4 && direction === 'down' || index === 6 && direction === 'up') {
                    var sectionElement = $('.section').eq(5);
                    $(sectionElement).next("section").removeAttr("anm-info");
                    $(sectionElement).attr('anm-info', 'animated');
                }

                //Follow us- project counter animation
                if (footerSection.length) {

                    setTimeout(function() {

                        if (footerSection.hasClass('active') && !footerSection.hasClass('animated')) {
                            $('.count').each(function() {
                                $(this).prop('Counter', 0).animate({
                                    Counter: $(this).attr("data-count")
                                }, {
                                    duration: 1000,
                                    easing: 'swing',
                                    step: function(now) {
                                        $(this).text(Math.ceil(now));
                                    }
                                });
                            });
                        }
                    }, 100);
                }

            },

            onSlideLeave: function(anchorLink, index, slideIndex, direction) {
                barStart(direction); //Start artist line-up bars animation on slide leave 
                $.fn.fullpage.setScrollingSpeed(0);
                if (artistBack.hasClass('active')) {
                    artistBack.removeClass('active'); //hide artist artist close button 
                    $("#artist_head").removeClass('active');
                }
            },
            // Display the slides container by fading it in after the next slide has been loaded.
            afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {
                $.fn.fullpage.setScrollingSpeed(scrollingSpeed);
                if (anchorLink === "artist-section") {
                    if (slideIndex !== 0) {
                        setTimeout(function() {
                            artistBack.addClass('active'); //show artist close button 

                        }, 1500);

                        $("#artist_head").addClass('active');

                    } else {
                        if (artistBack.hasClass('active')) {
                            artistBack.removeClass('active'); //hide artist close button 
                        }
                        if ($("#artist_head").hasClass('active')) {
                            setTimeout(function() {
                                $("#artist_head").removeClass("active"); //show right logo
                            }, 1500);
                        }
                        if ($('.m-artists-container').hasClass('hide-slider')) {
                            setTimeout(function() {
                                $('.m-artists-container').removeClass("hide-slider");
                            }, 1000);

                        }

                    }

                }
            },
        });

    }
    if (document.documentElement.clientWidth > 1200 && fullpageWrapper.hasClass("section-wrapper")) {
        var Overflow = true; //Enable each section overflow for desktop
        var ScrollElements = '#disclaimer-container,#active-disclaimer,#play-list';
    } else {
        var Overflow = false;
        var ScrollElements = "";
    }
    //Fullpage js initialising
    createFullpage(Overflow, ScrollElements);
    if (!Overflow)
        $.fn.fullpage.setAllowScrolling(false);
    // HOME  
    /*----------------------------------------------------*/
    //Animate background color for home
    (function($, window, document, undefined) {

        $.fn.animatedBG = function(options) {

            //  var intr=Math.floor(Math.random() * 500) + 10  ;
            var intr = 50;
            var defaults = {
                    colorSet: ['rgba(115, 0, 0, 0.0)', 'rgba(115, 0, 0, 0.6)'], //background colours for home
                    speed: intr
                },
                settings = $.extend({}, defaults, options);

            return this.each(function() {
                var $this = $(this);
                $this.each(function() {
                    var $el = $(this),
                        colors = settings.colorSet;

                    function shiftColor() {
                        var color = colors.shift();
                        colors.push(color);
                        return color;
                    }
                    // initial color
                    var initColor = shiftColor();
                    $el.css('backgroundColor', initColor);
                    setInterval(function() {
                        var intr = Math.floor(Math.random() * 800) + 10;
                        // console.log('speed'+intr);
                        var color = shiftColor();
                        $el.animate({
                            backgroundColor: color
                        }, intr);
                    }, settings.speed);
                });
            });
        };


    }(jQuery, window, document));


    // jQuery Selections
    var $html = $('html'),
        $prompt = $('#prompt'),
        $toggle = $('#toggle'),
        $scene = $('#scene');

    // Resize handler.
    function homeResize() {
        $scene[0].style.height = window.innerHeight + 'px';
        if (!$prompt.hasClass('hide')) {
            if (window.innerWidth < 600) {
                $toggle.addClass('hide');
            } else {
                $toggle.removeClass('hide');
            }
        }
    };


    if (parallaxHome.length) {
        if ($('#background').length)
            $('#background').animatedBG({}); //Initialize home background colour animation for home
        if ($('#background-home-2').length)
            $('#background-home-2').animatedBG({});

        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
        homeResize();
    }


    /* Timeline
    /*---------------------------------------------------- */
    var timeline = $('#timeline-wrap');
    if (timeline.length) {
        var numItems = timeline.find('.time-wrap ').length; //count circle
    }
    if (numItems < 5) {
        var ll = $('#column-one').css("left").replace(/[^-\d\.]/g, '');
        ll = ll / 2;
        $('#timeline-wrap  .wrap-container').css("right", ll + "px"); //Adjust timeline with window size
        if (numItems < 4) $('#timeline-wrap  .wrap-container').css("top", ll + "px");
    }

    /* Artist lineup
    /*---------------------------------------------------- */
    /* artist bar animation */
    $('.artist-profile').each(function() {
        var scene2 = $('#' + this.id).get(0);
        var parallax2 = new Parallax(scene2);
    });

    var barStart = function(direction) {
        $('#artist-description').addClass("active");



        setTimeout(
            function() {
                $('.m-artists-container').addClass("hide-slider");
                $.fn.fullpage.reBuild();
            }, 500);

        setTimeout(
            function() {
                $('#artist-description').removeClass('active');
            }, 2000);


    };

    /* Sponsors
    /*---------------------------------------------------- */
    var contentHeight = $("#sponsors_details").height();
    var windowHeight = $(window).height();
    if (contentHeight > windowHeight) {
        $(".sponsor-section .vertical-center").css("height", "auto");
    }

    /* Gallery
    /*---------------------------------------------------- */
    galleryReset();
    if ($('.gallery-section').length) {
        var galleryHolder = $('#galleryHolder');
        (function() {
            /* initialize prettyPhoto */
            $("area[data-gal^='prettyPhoto']").prettyPhoto();
            $(".gallery:first a[data-gal^='prettyPhoto']").prettyPhoto({
                animation_speed: 'normal',
                theme: 'light_square',
                slideshow: 3000,
                autoplay_slideshow: false
            });
        })();
        $("#filterOptions li a").on("click", function() {
            // fetch the class of the clicked item
            var galleryClass = $(this).attr('data-filter');
            // remove the active class from all gallery filter buttons
            $('#filterOptions li .hi-icon').removeClass('active');
            // update the active state on our clicked button
            $(this).children("#filterOptions .hi-icon").addClass('active');
            if (galleryClass === 'all') {
                // animate all gallery items
                galleryHolder.children('div').removeClass("animate");
                galleryHolder.children('div.item').fadeIn(500, 'swing', function() {
                    galleryHolder.children('div').addClass("animate");
                });;

            } else {
                var cnt = 0;
                var tot = galleryHolder.children('div:not(.' + galleryClass + ')').length;
                // hide all elements that don't share galleryClass
                galleryHolder.children('div:not(.' + galleryClass + ')').fadeOut(0, 'swing', function() {
                    galleryHolder.children('div.' + galleryClass).removeClass("animate");
                    //callback function after animation finished
                    cnt++;
                    if (cnt >= tot) {
                        galleryHolder.children('div.' + galleryClass).fadeIn(500);
                        galleryHolder.children('div.' + galleryClass).addClass("animate");
                    }
                });
            }
            return false;
        });
    }

    function galleryReset() {
        var galleryHolder = $('#galleryHolder');
        galleryHolder.children('div').removeClass("animate");
        // show all our items
        galleryHolder.children('div.item').fadeIn(500, '', function() {
            galleryHolder.children('div').addClass("animate");
            //Reset gallery filterOptions 
            $('#filterOptions li .hi-icon').removeClass('active').first().addClass('active');

        });
    }

    /* Ask Us
    /*----------------------------------------------------  */
    //Replace answer on ask us bar click
    var replaceAnswer = function(text, title) {
        $('#askus-answers-inner').removeClass('active');
        setTimeout(function() {
            $('#askus-answers .askus-show-answer').html(text);
            $('#askus-answers #askus-answers-inner h3').html(title);
            $('#askus-answers-inner').addClass('active');
        }, 650);
    };
    var questionNumber = 1;
    var questionCount = $('.askusbar', '#askus-container').length;
    //Ask us bar click event
    var askusbarClick = function(el) {
        $('.askusbar', '#askus-container').off('click');
        $('#askus .fp-scroller').addClass("show-answer");
        $('#askus-container').addClass("noScroll");
        if (Overflow)
            $.fn.fullpage.reBuild();


        setTimeout(function() {
            $('#askus').toggleClass('showing-answer');
            $('#askus-answers').addClass('active');
        }, 0);
        questionNumber = $(el).data('askus-number');
        replaceAnswer($(el).find('.askus-questions__answer-text').html(), $(el).find('h3').html());
        questionNumber = $(el).attr('data-askus-number');
        questionNumber = parseInt(questionNumber);
    };
    $('.askusbar', '#askus-container').on('click', function() {
        askusbarClick(this);
    });
    //Ask us bar close button event
    $('#askus_close').on('click', function() {
        $('#askus-container').removeClass("noScroll");
        $('.askusbar', '#askus-container').on("click", function() {
            askusbarClick(this);
        });
        $('#askus .fp-scroller').removeClass("show-answer");
        $.fn.fullpage.reBuild();
        $('#askus').toggleClass('showing-answer');
        $('.askus-show-answer', '#askus-answers').removeClass('active');
        $('#askus-answers').removeClass('active');
    });
    //Ask us previous click event
    $('a.askus-prev-button').on('click', function() {
        if (questionNumber !== 1) {
            questionNumber = parseInt(questionNumber, 10) - 1;
        } else {
            questionNumber = questionCount;
        }
        replaceAnswer($('.askus_content_bar').find('[data-answer-number="' + (questionNumber) + '"]').html(), $('.askus_content_bar').find('[data-askus-number="' + (questionNumber) + '"] h3').html());
    });
    //Ask us next click event
    $('a.askus-next-button').on('click', function() {
        if (questionNumber !== questionCount) {
            questionNumber = parseInt(questionNumber, 10) + 1;
        } else {
            questionNumber = 1;
        }
        replaceAnswer($('.askus_content_bar').find('[data-answer-number="' + (questionNumber) + '"]').html(), $('.askus_content_bar').find('[data-askus-number="' + (questionNumber) + '"] h3').html());
    });
    jQuery('.control-bar').children().hide();

    /* Tickets
     /*---------------------------------------------------- */
    if (ticketContainer.length) {
        //switch ticket table
        var price_swither = function(container) {
            container.each(function() {
                var ticket_table = $(this);
                var filter_radios = ticket_table.children('#ticket-switch').find('input[type="radio"]'),
                    ticket_table_wrapper = ticket_table.find('#ticket-item-wrapper');

                //store ticket table items
                var table_elements = {};
                filter_radios.each(function() {
                    var filter_type = $(this).val();
                    table_elements[filter_type] = ticket_table_wrapper.find('div.ticket-item[data-type="' + filter_type + '"]');
                });

                //detect input change event
                filter_radios.on('change', function(event) {
                    event.preventDefault();
                    //detect which radio input item was checked
                    var selected_filter = $(event.target).val();
                    table_elements[selected_filter].addClass('is-selected');
                    ticket_table_wrapper.addClass('is-switched');
                    hide_not_selected_items(table_elements, selected_filter);
                    ticket_table_wrapper.removeClass('is-switched');


                });
            });
        }
        price_swither(ticketContainer);

        var hide_not_selected_items = function(table_containers, filter) {
            $.each(table_containers, function(key, value) {
                if (key != filter) {
                    $(this).removeClass('is-visible is-selected').addClass('is-hidden');

                } else {
                    $(this).addClass('is-visible').removeClass('is-hidden is-selected');
                }
            });
        }
    }

    /* Home 2
     /*---------------------------------------------------- */
    if (fittextHome.length) {
        $('.tlt').textillate({
            loop: true,
            out: {
                effect: 'flipInY',
                delayScale: 1.5,
                delay: 50,
                sync: false,
                shuffle: false,
                reverse: false,
                callback: function() {}
            },
        });
    }

    /* Disclaimer
    /*---------------------------------------------------- */


    if (disclaimerContainer.length) {

        disclaimerButton.on('click', function() {
            disclaimerContainer.fadeOut();
            activeDisclaimer.fadeOut();
            $('body').removeClass('no-overlow');
            initSmoothScroll();
        });

        var visits = jQuery.cookie('visits') || 0;
        visits++;
        jQuery.cookie('visits', visits, {
            expires: 1,
            path: '/'
        });

        if (jQuery.cookie('visits') > 1) {
            activeDisclaimer.hide();
            disclaimerContainer.hide();
            initSmoothScroll();

        } else {

            disclaimerContainer.show();
            $('body').addClass('no-overlow');
        }

        if (jQuery.cookie('noShowWelcome')) {
            disclaimerContainer.hide();
            activeDisclaimer.hide();
        }
        $("#disclaimer-check").on('click', function() {
            disclaimerButton.attr("disabled", !this.checked);
        });

    } else {
        initSmoothScroll();
    }


    $('input[type="radio"]').keydown(function(e) {
        var arrowKeys = [37, 38, 39, 40];
        if (arrowKeys.indexOf(e.which) !== -1) {
            $(this).blur();
            return false;
        }
    });


    function initSmoothScroll() {

        $("html, body").animate({}, {
            duration: 1200,
            easing: "easeInOutExpo"
        });
    }

    /* Music Player
    /*---------------------------------------------------- */
    if (musicWrapper.length) {

        $(function() {
            // Setup the player to autoplay the next track
            var a = audiojs.createAll({
                trackEnded: function() {
                    var next = $('ol li.playing').next();
                    if (!next.length) next = $('ol li').first();
                    next.addClass('playing').siblings().removeClass('playing');
                    audio.load($('a', next).attr('data-src'));
                    audio.play();
                }
            });

            // Load in the first track
            var audio = a[0];
            var first = $('ol a').attr('data-src');
            $('ol li').first().addClass('playing');
            audio.load(first);

            // Load in a track on click
            $('ol li').on('click', function(e) {
                e.preventDefault();
                $(this).addClass('playing').siblings().removeClass('playing');
                audio.load($('a', this).attr('data-src'));
                audio.play();
            });
            $('#next').on('click', function(e) {
                var next = $('li.playing').next();
                if (!next.length) next = $('ol li').first();
                next.click();
            });

            $('#prev').on('click', function(e) {
                var prev = $('li.playing').prev();
                if (!prev.length) prev = $('ol li').last();
                prev.click();
            });

            showPlayList.on('click', function(e) {
                playList.toggleClass('active');
                showPlayListButton.toggleClass('active');

            });

            $(window).on('click', function(e) {
                if (!e.target.id === "music-wrapper" || !$(e.target).parents("#music-wrapper").size()) {
                    if (playList.hasClass('active')) {
                        playList.removeClass('active');
                        showPlayListButton.toggleClass('active');

                    }
                }




            });




        });


    }


    /* Google map
    /*---------------------------------------------------- */
/*if ($("#map_canvas").length && typeof google !== 'undefined') {



        var init = function() {
            var mapOptions = {
                zoom: 16,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(37.970996, 23.730542), // New York
                styles: [{
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#424b5b"
                    }, {
                        "weight": 2
                    }, {
                        "gamma": "1"
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "weight": 0.6
                    }, {
                        "color": "#545b6b"
                    }, {
                        "gamma": "0"
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#1c223a"
                    }, {
                        "gamma": "1"
                    }, {
                        "weight": "10"
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#666c7b"
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#545b6b"
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#424a5b"
                    }, {
                        "lightness": "0"
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#666c7b"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#2e3546"
                    }]
                }]
            };
            var mapElement = document.getElementById('map_canvas');
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(37.969196, 23.730542),
                map: map,
                icon: 'images/map-marker.png',
                title: 'The Partys'

            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    }*/
    /*var init = function() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
      google.maps.event.addDomListener(window, 'load', init);
*/
/*
var init = function() {
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 10,
      center: {lat: -33.9, lng: 151.2},
      styles: [{
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#ffffff"
        }]
    }, {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [{
            "visibility": "on"
        }, {
            "color": "#424b5b"
        }, {
            "weight": 2
        }, {
            "gamma": "1"
        }]
    }, {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [{
            "weight": 0.6
        }, {
            "color": "#545b6b"
        }, {
            "gamma": "0"
        }]
    }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
            "color": "#1c223a"
        }, {
            "gamma": "1"
        }, {
            "weight": "10"
        }]
    }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
            "color": "#666c7b"
        }]
    }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
            "color": "#545b6b"
        }]
    }, {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [{
            "color": "#424a5b"
        }, {
            "lightness": "0"
        }]
    }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
            "color": "#666c7b"
        }]
    }, {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
            "color": "#2e3546"
        }]
    }]
    });
  
    setMarkers(map);
  }
  
  // Data for the markers consisting of a name, a LatLng and a zIndex for the
  // order in which these markers should display on top of each other.
  var beaches = [
    ['Bondi Beach', -33.890542, 151.274856, 4],
    ['Coogee Beach', -33.923036, 151.259052, 5],
    ['Cronulla Beach', -34.028249, 151.157507, 3],
    ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
    ['Maroubra Beach', -33.950198, 151.259302, 1]
  ];
  
  function setMarkers(map) {
    // Adds markers to the map.
  
    // Marker sizes are expressed as a Size of X,Y where the origin of the image
    // (0,0) is located in the top left of the image.
  
    // Origins, anchor positions and coordinates of the marker increase in the X
    // direction to the right and in the Y direction down.
    var image = {
      url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
      // This marker is 20 pixels wide by 32 pixels high.
      size: new google.maps.Size(20, 32),
      // The origin for this image is (0, 0).
      origin: new google.maps.Point(0, 0),
      // The anchor for this image is the base of the flagpole at (0, 32).
      anchor: new google.maps.Point(0, 32)
    };
    // Shapes define the clickable region of the icon. The type defines an HTML
    // <area> element 'poly' which traces out a polygon as a series of X,Y points.
    // The final coordinate closes the poly by connecting to the first coordinate.
    var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18, 1],
      type: 'poly'
    };
    for (var i = 0; i < beaches.length; i++) {
      var beach = beaches[i];
      var marker = new google.maps.Marker({
        position: {lat: beach[1], lng: beach[2]},
        map: map,
        icon: image,
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
      });
    }
  }
  google.maps.event.addDomListener(window, 'load', init);
*/
    /* Menu
    /*---------------------------------------------------- */
    /* menu */
    $(function() {
        var trigger = $(".navTrigger");
        var menuLink = $(".nav1__link");

        trigger.on("click", function() {
            $(this).toggleClass("active");
            $(this).next().toggleClass("active");
        });
        menuLink.on("click", function() {
            setTimeout(function() {
                trigger.toggleClass("active");
                trigger.next().toggleClass("active");
            }, 600);

        });
    });

    /* menu 2 */

    $('#normal-menu').prepend('<div id="menu-button">Menu</div>');
    $('#normal-menu #menu-button').on('click', function() {
        var menu = $(this).next('ul');
        if (menu.hasClass('open')) {
            menu.removeClass('open');
        } else {
            menu.addClass('open');
        }
    });

    /* Window Resize
    /*---------------------------------------------------- */
    var waitForFinalEvent = (function() {
        var timers = {};
        return function(callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout(timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();
    $(window).resize(function() {
        // Check window width has actually changed and it's not just iOS triggering a resize event on scroll
        if ($(window).width() !== windowWidth || $(window).height() !== windowHeight) {
            // Update the window width for next resize
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            waitForFinalEvent(function() {
                var contentHeight = $("#sponsors_details").height();

                if (contentHeight > windowHeight)
                    $(".sponsor-section .vertical-center").css("height", "auto"); //Reset sponsors 

                var resetOverflow = Overflow;
                if (document.documentElement.clientWidth > 1200 && fullpageWrapper.hasClass("section-wrapper")) {
                    Overflow = true;
                    ScrollElements = '#disclaimer-container,#active-disclaimer,#play-list';
                } else {
                    Overflow = false;
                    ScrollElements = '';
                }
                if (resetOverflow !== Overflow) {
                    $.fn.fullpage.destroy('all');
                    createFullpage(Overflow, ScrollElements);



                } else {
                    $.fn.fullpage.reBuild();

                }

                if (!Overflow)
                    $.fn.fullpage.setAllowScrolling(false);


            }, 1000, "some unique string");
            if (parallaxHome.length) {
                homeResize();
            }

        }
    });



});

$(window).on('load', function(e) {
    'use strict';
    //Twitter
    if ($("#twitter-container").length) {
        twttr.ready(function(twttr) {

            twttr.widgets.createGridFromCollection(
                "834269997706919937", //Your twitter id here
                document.getElementById("twitter-container"), {
                    limit: 3,
                    //  height: 300,  //For fixed Sizes
                    //     width: 500,
                    chrome: "nofooter",
                    linkColor: "#820bbb",
                    borderColor: "#a80000"
                }
            );

        });
    }
    //initialise artist artist previous click event
    $(".artist-slide-prev", '#artist_all_container').on("click", function() {
        $.fn.fullpage.moveSlideLeft();
    });
    //initialise artist artist next click event
    $(".artist-slide-next", '#artist_all_container').on("click", function() {
        $.fn.fullpage.moveSlideRight();
    });
    //Remove loader
    $('body').addClass('loaded');

    setTimeout(function() {

        $("#loader-wrapper").remove("#loader-wrapper");
    }, 3500);


});

/***************************************PROGRAME SLIDER********************************************/

/*******************************************ACTUALITE*****************************************/
  
        //CONTENT ANIMATIONS




  /******************************************* Fin ACTUALITE*****************************************/
/****************************************Login form**************************************** */
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }