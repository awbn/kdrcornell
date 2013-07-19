/* Slider 1 - Parallax slider*/

$(function() {
	$('#da-slider').cslider({
		autoplay	: true,
		interval : 9000
	});
			
});


/* Flex slider */

  $(window).load(function() {
    $('.flexslider').flexslider({
      easing: "easeInOutSine",
      directionNav: false,
      animationSpeed: 1500,
      slideshowSpeed: 5000
    });
  });

/* Image block effects */

$(function() {
      $('ul.hover-block li').hover(function(){
        $(this).find('.hover-content').animate({top:'-3px'},{queue:false,duration:500});
      }, function(){
        $(this).find('.hover-content').animate({top:'125px'},{queue:false,duration:500});
      });
});

/* Slide up & Down */

$(".discover a").click(function(e){
	e.preventDefault();
	var myClass=$(this).attr("id");
	$(".dis-content ."+myClass).toggle('slow');
});


/* Image slideshow */

$('#s1').cycle({ 
    fx:    'fade', 
    speed:  2000,
    timeout: 300,
    pause: 1
 });

/* Support */

$("#slist a").click(function(e){
   e.preventDefault();
   $(this).next('p').toggle(200);
});

/* prettyPhoto Gallery */

jQuery("a[class^='brother']").prettyPhoto({
  overlay_gallery: false, social_tools: false, theme:'pp_default',hook:'data-gallery',slideshow:false,show_title:false
});

jQuery(".gallery a").prettyPhoto({
  overlay_gallery: false, social_tools: false, theme:'pp_default',hook:'data-gallery',show_title:false
});

/* Isotype */

// cache container
var $container = $('#brotherhood');
// initialize isotope
$container.isotope({
  // options...
});

// filter items when filter link is clicked
$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });

  if ( !$container.data('isotope').$filteredAtoms.length ) {
    $('.filter-no-results').fadeIn({
      easing: 'linear',
      duration: 750
    });
  } else {
    $('.filter-no-results').fadeOut({
      easing: 'linear',
      duration: 'fast'
    });
  }

  return false;
});

