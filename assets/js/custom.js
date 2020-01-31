/**
 * File main.js.
 *
 * Handles custom events for the theme.

 */
(function() {

var $ = jQuery;


document.querySelector(".menu-toggle").addEventListener("click", function(e){
  e.preventDefault();

  if(!document.querySelector(".menu-toggle").classList.contains('toggled')) {

    document.querySelector(".menu-toggle").classList.add('toggled');
    document.querySelector(".site-header").classList.add('active');
    //document.getElementById("site-navigation").classList.add('active');
    $(".main-navigation").slideDown(120);
    document.querySelector(".menu-toggle").setAttribute('aria-expanded', 'true');

  } else {

  document.querySelector(".menu-toggle").classList.remove('toggled');
  //document.getElementById("site-navigation").classList.remove('active');
  $(".main-navigation").slideUp(120);
  document.querySelector(".site-header").classList.remove('active');
  document.querySelector(".menu-toggle").setAttribute('aria-expanded', 'false');
}
});



//Minimize Header
function minimize() {

  var header = document.querySelector('.site-header'),
      height = header.clientHeight,
      body = $('body');

  if($(window).scrollTop() > height / 2 && body.hasClass('fix-head')) {
    header.classList.add('minimize');
  } else {
    header.classList.remove('minimize');
  }
}


function parallax() {
	// vertical parallax
  var threshold = .2;
	var hero =  document.getElementById('hero');
	if(hero) {
	var header = document.querySelector('.site-header').clientHeight;
	var banner = hero.clientHeight;
	var bgs = document.querySelectorAll('#hero .slide:only-child > img, #hero .slide.is-selected img');
	var total = header + banner;
	var scrolled = window.pageYOffset;
		for (var i = 0; i < bgs.length; i++) {
			if (window.innerWidth >= 992) {
				if(scrolled < banner + header) {
					bgs[i].style.transform = 'translateY(' + (scrolled * threshold) + 'px) scale(1.2)';
				} else {
						bgs[i].style.transform = 'translateY(0) scale(1.2)';
					}
				} else {
					bgs[i].style.transform = 'translateY(0) scale(1.2)';
				}
	  }
	}
}

// General Carousel Class
function carousel() {

  var carousel = $('.carousel');

  if(carousel) {

    carousel.each(function(index) {

      if($(this).children().length > 1) {
        var arg;
        if($(this).attr('id') == 'hero') {
          arg = false;
        } else {
          arg = true;
        }
        var carousel = $(this).flickity({
          contain: true,
          groupCells: '100%',
          imagesLoaded: true,
          cellAlign:'left',
          autoPlay: 6000,
          wrapAround: true,
          accessibility: false,
          selectedAttraction: 0.085,
          friction: 0.5,
          watchCSS: arg
          //draggable: arg
        //  adaptiveHeight: true
        });
        carousel.on( 'change.flickity', function( event, index ) {
            parallax();
        });

      }
    });
  }

}


function headerPad() {

  var height = $('.site-header').outerHeight();
      slider = $('.flickity-viewport').outerHeight(),
      hero = $('#hero'),
      innerHead = $('.header-container').outerHeight();
      abs = $('body').hasClass('abs-head'),
      trans = $('body').hasClass('trans'),
      fixed = $('body').hasClass('fix-head'),
      body = $('body'),
      not_carousel = $('#hero:not(.flickity-enabled) .container'),
      container = $('#hero .flickity-viewport .container .hero-content'),
      viewport = $('#hero .flickity-viewport'),
      pad = $('.site-header .custom-logo-link img').css('padding-top');
      pad = parseInt(pad, 10),
      buttons = $('#hero').find('.flickity-prev-next-button');

  if(abs || trans && fixed) {
    container.css('margin-top', (height / 2) - pad / 2);
    buttons.css('margin-top', (height / 2) - innerHead / 2);
    viewport.css('height', slider + height);
    not_carousel.css('margin-top', height - pad);
    if(fixed && trans && !hero.length) {
      body.css('padding-top', height);
    }
  } else if (fixed && !trans) {
    body.css('padding-top', height);
  } else {
    if(hero.length && fixed || hero.length && abs) {
     body.css('padding-top', height);
   }
  }
}


function sliderHeight() { // set slides to the tallest slide height

  var height = $('.site-header').outerHeight(),
      hero = $('#hero.carousel'),
      content =  hero.find('.slide .hero-content'),
      viewport = hero.find('.flickity-viewport');

  var elementHeights = content.map(function() {
    return $(this).outerHeight();
  }).get();

  var maxHeight = Math.max.apply(null, elementHeights);

  viewport.css('height', maxHeight);

  // full height
  var newHeight = $('.full-height #hero .container .hero-content').outerHeight();

  $('.full-height #hero .container .hero-content').css('margin-top', height / 2);
  $('.full-height #hero .slide').css('min-height', newHeight * 1.5);
  $('.full-height.fix-head:not(.trans)').css('margin-top', - height);
  $('.full-height.fix-head:not(.trans) #hero .container').css('padding-top', height / 2);


}


function mobileNav() {
    //if(window.innerWidth < 900) {
      $('.menu-item-has-children a .mobile-toggle').on('click', function(e) {
        e.preventDefault();
        if($(this).hasClass('active')) {
          $(this).removeClass('active');
          $(this).parents('a').siblings('ul').slideUp(60);
        } else {
          $(this).addClass('active');
          $(this).parents('a').siblings('ul').slideDown(60);
        }
      });
  //  }

  if(window.innerWidth > 900) {

    $('.site-header').removeClass('active');
  } else {
    if($('.menu-toggle').hasClass('toggled')) {
      $('.site-header').addClass('active');
    }
  }
}


function tabletSearch() {

  var button = $('.header-search .search-form button'),
      field = $('.header-search .search-form');

  button.hover(function(e) {
    e.preventDefault();
		$(this).addClass('hovered');
	});

	button.on('click', function() {
		if($(this).hasClass('hovered')) {
			return true;
		} else if(!$(this).hasClass('hovered')) {
		    $(this).one('click',function() {
			       return false;
		     });
		  }
	});
}


var $ = jQuery;

  function gallery() {

    var elements = document.querySelectorAll(".gallery-item");

    for (var i = 0; i < elements.length; i++) {
      elements[i].addEventListener("click", function(e) {
        e.preventDefault();
        $('.lightbox').fadeIn(100);

          if (e.target.closest('div').classList.contains('gallery-icon')) {
            console.log('yep');
            var items = $(this).closest('.gallery').find('figure');
            var urls = [];
            items.each(function() {
              //	console.log('yep');
              urls.push($(this).find('img').attr('src'));
            });

          } else {
            var items = $(this).closest('.widget-area').find('a');
            var urls = [];
            items.each(function() {
              //	console.log('yep');
              urls.push($(this).attr('href'));
            });
          }
          //console.log(urls);
          urls.forEach(function(e) {
            $('.lightbox .gallery-container').append('<div class="img-wrapper"><img src="' + e + '"/></div>');
          });
          var cur_url = $(this).attr('href');
          if (e.target.closest('div').classList.contains('gallery-icon')) {
            var cur_url = $(this).find('img').attr('src');
          }
          var cur = urls.indexOf(cur_url);
          //	console.log(cur);


        if ($('.gallery-container').children().length > 1) {

          var current = $(this).attr('href');
          var carousel = $('.gallery-container').flickity({
            cellAlign: 'center',
            contain: true,
            wrapAround: false,
            groupCells: '100%',
            imagesLoaded: true,
            selectedAttraction: 0.15,
            friction: 0.8
          });
          if (cur) {
            carousel.flickity('select', cur, true, true);
          }
        }
      });
    }

    // Close Lightbox
    $('.close').on('click', function(e) {
      e.preventDefault();
      $('.lightbox').fadeOut(50).removeClass('single-image');
      if ($('.gallery-container').hasClass('flickity-enabled')) {
        setTimeout(function() {
          $('.gallery-container').flickity('destroy').html('');
        }, 300);
      } else {
        setTimeout(function() {
          $('.gallery-container').html('');
        }, 300);
      }
    });
  }



  function tabs() {

    $('.tab').on('click', function(e) {
      e.preventDefault();
      $('.tab').removeClass('active');
      $(this).addClass('active');
      var data = $(this).attr('data-attr');
      console.log(data);
      $('.panel').hide();
      $('.panel[data-attr="'+data+'"]').show();
    });

  }



// Init

  carousel();
  sliderHeight();
  headerPad();
  //parallax();
  tabletSearch();
  mobileNav();
  gallery();
  tabs();


window.addEventListener("scroll", function() {

  //headerPad();
 //parallax();
 minimize();

});

window.addEventListener("resize", function() {

  minimize();
  sliderHeight();
  headerPad();

});

$( window ).on( "orientationchange", function() {

    // recalculate measurements on orientation change
    $('body').css('padding','0');
    setTimeout(function(){
      sliderHeight();
      headerPad();
    }, 300);

});

})();
