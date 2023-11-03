// Add your custom JS here.

jQuery(document).ready(function($) {
	var body = $('body');
  var scrolled = false;
  var navbarClasses = $('#main-nav').attr('class');

  jQuery(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 25) {
			body.addClass("scrolled");
      scrolled = true;
      // $('#main-nav').removeClass('navbar-dark');
      // $('#main-nav').addClass('navbar-light');
      $('#main-nav').addClass('bg-primary');
    } else {
			body.removeClass("scrolled");
      scrolled = false;
      // $('#main-nav').removeClass('navbar-light navbar-dark').addClass(navbarClasses);
      $('#main-nav').removeClass('bg-primary').addClass(navbarClasses);
    }

	   if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
	       body.addClass("near-bottom");
	   } else {
			body.removeClass("near-bottom");
	   }

	});

  $('#navbarNavDropdown').on('show.bs.collapse', function () {
    body.addClass('menu-open');
    $('#main-nav').addClass('bg-primary');
  });

  $('#navbarNavDropdown').on('hide.bs.collapse', function () {
    body.removeClass('menu-open');
    // $('#main-nav').removeClass('bg-primary');
  });

  $('.sub-menu-toggler').click(function(e) {
    e.preventDefault();
    $(this).parent().next().toggleClass('show');
    $(this).parent().parent().toggleClass('show');
  });

});

jQuery(function ($) {

  var minimumHeight = 400; // max height in pixels
  // resize the slide-read-more Div

  $(".single-formacion .entry-content .wp-block-list").each( function() {
    var box = $(this);
    var initialHeight = box.innerHeight();
    // reduce the text if it's longer than 200px
    if (initialHeight > minimumHeight) {
      box.after('<div class="slide-read-more-buttons-wrapper"><span class="btn btn btn-outline-primary slide-read-more-button read-more-button">Ver más</span><span class="slide-read-more-button btn btn btn-outline-primary">Ver menos</span></div>')
      box.css('height', minimumHeight);
      $(".read-more-button").show();
      box.addClass('slide-read-more');
    }

    SliderReadMore();

  })

  function SliderReadMore() {
     $(".slide-read-more-button").on('click', function () {

        var box = $(this).parent().prev('.slide-read-more');
        // get current height
        var currentHeight = box.innerHeight();

        // get height with auto applied
        var autoHeight = box.css('height', 'auto').innerHeight();

        // reset height and revert to original if current and auto are equal
        var newHeight = (currentHeight | 0) === (autoHeight | 0) ? minimumHeight : autoHeight;

        box.css('height', currentHeight).animate({
           height: (newHeight)
        })

        box.next().children('.slide-read-more-button').toggle();
     });
  }
});

/* Carruseles */

// jQuery('.slick-slider').slick({
//   dots: true,
//   arrows: true,
//   infinite: true,
//   speed: 300,
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   autoplay: true
// });

jQuery('.slick-carousel, .wp-block-group.is-layout-flex.is-style-slick-carousel, .wp-block-group.is-style-slick-carousel > .wp-block-group__inner-container, .wp-block-gallery.is-style-slick-carousel').slick({
  dots: true,
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 782,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

jQuery('.wp-block-group.is-layout-flex.is-style-slick-carousel-logos, .wp-block-group.is-style-slick-carousel-logos > .wp-block-group__inner-container, .wp-block-gallery.is-style-slick-carousel-logos').slick({
  dots: true,
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 6,
  slidesToScroll: 6,
  autoplay: false,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 782,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

// REPRODUCIR VÍDEO CUANDO LLEGAS A ÉL

// (function($) {

//   $(document).ready(function() { 
  
//     var $win = $(window);
    
//     var elementTop, elementBottom, viewportTop, viewportBottom;

//     function isScrolledIntoView(elem) {
//       elementTop = $(elem).offset().top;
//       elementBottom = elementTop + $(elem).outerHeight();
//       viewportTop = $win.scrollTop();
//       viewportBottom = viewportTop + $win.height();

//       return (elementBottom > viewportTop && elementTop + 300 < viewportBottom);
//     }
    
//     if($('video').length){

//       var loadVideo;

//       $('video').each(function(){
//         $(this).attr('webkit-playsinline', '');
//         $(this).attr('playsinline', '');
//         $(this).attr('muted', 'muted');

//         $(this).attr('id','loadvideo');
//         loadVideo = document.getElementById('loadvideo');
//         loadVideo.load();
//       });

//       $win.scroll(function () { // video to play when is on viewport 
      
//         $('video').each(function(){
//           if (isScrolledIntoView(this) == true && $(this)[0].currentTime < $(this)[0].duration ) {
//               $(this)[0].play();
//           } else {
//               $(this)[0].pause();
//           }
//         });
      
//       });  // video to play when is on viewport

//     } // end .field--name-field-video
    
    
//    });
  
// })(jQuery);