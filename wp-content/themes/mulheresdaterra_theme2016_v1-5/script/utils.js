(function ($, root, undefined) {

// Responsive debugger script
$(document).ready(function(){
	var MEASUREMENTS_ID = 'measurements'; // abstracted-out for convenience in renaming
	$("body").append('<div id="'+MEASUREMENTS_ID+'"></div>');
	$("#"+MEASUREMENTS_ID).css({
	    'position': 'fixed',
	    'bottom': '0',
	    'right': '0',
	    'background-color': 'black',
	    'color': 'white',
	    'padding': '5px',
	    'font-size': '10px',
	    'opacity': '0.4'
	});
	getDimensions = function(){
	    return $(window).width() + ' (' + $(document).width() + ') x ' + $(window).height() + ' (' + $(document).height() + ')';
	}
	$("#"+MEASUREMENTS_ID).text(getDimensions());
	$(window).on("resize", function(){
	    $("#"+MEASUREMENTS_ID).text(getDimensions());
	});

	// Menu Dropdown 
	$( ".menu_link" ).click(function() {
		if ($( window ).width() < 979){
			$( ".menu_wpr" ).toggle("blind");
		}
	});
	$( ".menu_wpr" ).click(function() {
		if ($( window ).width() < 979){
			$( ".menu_wpr" ).toggle("blind");
		}
	});

	if ( $('body').hasClass('home')){

		if ($( window ).width() > 800){
			// Madrinhas
			$('.madrinhas_slide').bxSlider({
				minSlides: 2,
				maxSlides: 6,
				slideWidth: 290,
				speed: 2000,
				infiniteLoop: false,
				slideMargin: 0,
				pager: false
			});
			// About = Nós
			$('.nos_slide').bxSlider({
				minSlides: 2,
				maxSlides: 6,
				slideWidth: 235,
				speed: 2000,
				infiniteLoop: false,
				slideMargin: 0,
				pager: false
			});

			// Open Box About
			$( ".madrinhas_slide li, .nos_slide section" ).click(function() {
			  var slide_classname = this.className;
			  var box_classname = slide_classname + '-box';
			  //console.log(box_classname);
			  $( "." + box_classname ).addClass( "box-active" );
			});
			$('.box-item .close').click(function(){
			  $( this ).parent().removeClass( "box-active" );
			})

		} else {
			$('.box-list-madrinhas').accordion({
				heightStyle: 'content',
				collapsible: true,
				active: false
			});
			$('.box-list-nos').accordion({
				heightStyle: 'content',
				collapsible: true,
				active: false
			});
		}

	};


});
  
// Get window height
function getWindowHeight(){
	var windowHeight = $( window ).height();
	var windowWidth = $( window ).width();
	var video_height;
	if(windowWidth < 400){
		video_height = 190;
	} else{
		video_height = windowHeight;
	}
	return video_height;
}

$(function() {

	// Vertical Scrolling Navigation
	$.scrollIt({
	  upKey: 38,             // key code to navigate to the next section
	  downKey: 40,           // key code to navigate to the previous section
	  easing: 'easeInOutCubic',      // the easing function for animation
	  scrollTime: 1000,       // how long (in ms) the animation takes
	  activeClass: 'active', // class given to the active nav element
	  onPageChange: null,    // function(pageIndex) that is called when page is changed
	  topOffset: 0           // offste (in px) for fixed top navigation
	});

	if ( $('body').hasClass('home')){

		
		$('.video').height( getWindowHeight() );
		$('.home_cntt').height( getWindowHeight() - 55 );
		//console.log( windowHeight);

		// Home Mapa - As Mulheres - active inactive box
		$( ".map-bullet" ).click(function() {
		  $( ".map-section" ).removeClass( "map-active" );
		  $( this ).parent().toggleClass( "map-active" );
		});
		$( ".map-section .close" ).click(function() {
		  $( this ).parent().parent().parent().toggleClass( "map-active" );
		});

	
		// Mulheres da Terra - Fotos
		$('.mulheres_slider').bxSlider({
			minSlides: 2,
			maxSlides: 6,
			slideWidth: 250,
			speed: 2000,
			infiniteLoop: false,
			slideMargin: 0,
			pager: false,
			hideControlOnEnd: true
		});

	} else if ( $('body').hasClass('blog') || $('body').hasClass('single') || $('body').hasClass('search') ){
		$('.hover_effect').hover(
			function(){
				$(this).addClass('active');
			}, function(){
				$(this).removeClass('active');
		});
	}
	// Image Orientation - set class
	if ( $(".block_photos")) {
		$( ".block_photos .post_cntt img" ).each(function( ) {
			var img_width = this.width;
			var img_height = this.height;
			var img_src = this.src;
			
			var output = "width: " +  img_width + " height: " + img_height + " src: " + img_src;

			if (img_height > img_width){
		  		$(this).addClass('ori_vert');
		  		output += " ori_vert";
			} else{
		  		$(this).addClass('ori_horiz');
		  		output += " ori_horiz";
			}
			//console.log(output);
	  		$(this).parent().addClass('fancybox');
	  		$(this).parent().attr( "data-fancybox-group", "gallery" );
		});
	}

	// Fancybox Galery modal
	$(".fancybox").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none'
	});

});
	
$(window).scroll(function () {

	// menu effect
	if ( $('body').hasClass('home')){

		var topPage = $(this).scrollTop();
		//console.log(getWindowHeight());
	  
  	if (topPage > getWindowHeight() - 55) {
		$('body').addClass('header_extended');
		$('body').removeClass('header_normal');
  	}
  	else{
  		$('body').addClass('header_normal');
  		$('body').removeClass('header_extended');
  	}
  }
});

})(jQuery, this);
