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
	getOrientation = function(){
		if ($(window).width() >= $(window).height()){
			return 'horizontal';
		}else{
			return 'vertical';
		}
	}
	setOrientation = function(){
	    if (getOrientation() == 'vertical' && !$('body').hasClass('vertical')){
	    	$('body').addClass('vertical');
	    } else if (getOrientation() == 'horizontal' && $('body').hasClass('vertical')){
	    	$('body').removeClass('vertical');
	    }
	}
	setOrientation();

	$("#"+MEASUREMENTS_ID).text(getDimensions());
	$(window).on("resize", function(){
	    $("#"+MEASUREMENTS_ID).text(getDimensions());
	    setOrientation();
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

		
		// $('.video').height( getWindowHeight() );
		// $('.home_cntt').height( getWindowHeight());
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

	// Video Play/Pause
	var homeVideo = $('.home_video'); 
    if (homeVideo.get(0).paused) {
    	$(this).addClass('pause');
    }
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    if (iOS){
    	$('.playPause').addClass('pause');
    }

	$('.playPause').click(function(){
    	$(this).toggleClass('pause');

	    if (homeVideo.get(0).paused) 
	        homeVideo.get(0).play(); 
	    else 
	        homeVideo.get(0).pause();
	});

});
	
$(window).scroll(function () {

	// menu effect
	if ( $('body').hasClass('home')){

		function isScrolledIntoView(elem){
		    var $elem = $(elem);
		    var $window = $(window);

		    var docViewTop = $window.scrollTop();
		    var docViewBottom = docViewTop + $window.height();

		    var elemTop = $elem.offset().top;
		    var elemBottom = elemTop + $elem.height();

		    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		}
		function isVisible(){

			var block_as_mulheres_01 = $('#asmulheres_01');
			var block_as_mulheres_02 = $('#asmulheres_02');
			var block_as_mulheres_03 = $('#asmulheres_03');
			
			var block_documentario_01 = $('#documentario_01');
			var block_documentario_02 = $('#documentario_02');
			var block_documentario_03 = $('#documentario_03');

			var block_colabore_01 = $('#colabore_01');
			var block_colabore_02 = $('#colabore_02');
			var block_colabore_03 = $('#colabore_03');
			
			if( isScrolledIntoView(block_as_mulheres_01) || isScrolledIntoView(block_as_mulheres_02) || isScrolledIntoView(block_as_mulheres_03) ){
				// console.log('mulheres!');
				$('#bgsection').removeClass("reach_top");
				$('#bgsection').removeClass("documentario");
				$('#bgsection').removeClass("colabore");
				$('#bgsection').addClass("as-mulheres");

			}else if( isScrolledIntoView(block_documentario_01) || isScrolledIntoView(block_documentario_02) || isScrolledIntoView(block_documentario_03) ){
				// console.log('documentário!');
				$('#bgsection').removeClass("reach_top");
				$('#bgsection').removeClass("as-mulheres");
				$('#bgsection').removeClass("colabore");
				$('#bgsection').addClass("documentario");
			
			}else if( isScrolledIntoView(block_colabore_01) || isScrolledIntoView(block_colabore_02) || isScrolledIntoView(block_colabore_03)){
				// console.log('colabore!');
				$('#bgsection').removeClass("reach_top");
				$('#bgsection').removeClass("as-mulheres");
				$('#bgsection').removeClass("documentario");
				$('#bgsection').addClass("colabore");

			}else if($(window).scrollTop() < 0){
				$('#bgsection').removeClass("as-mulheres");
				$('#bgsection').removeClass("documentario");
				$('#bgsection').removeClass("colabore");
				$('#bgsection').addClass("reach_top");
			}
		}
		isVisible();
	
		var topPage = $(this).scrollTop();
	 	var video_height = $('.video_wpr').height();

		if (topPage >= 0 && topPage < video_height){
	  		$('body').addClass('header_normal');
	  		$('body').removeClass('header_extended');
		}else if (topPage < 0){
	  		$('body').addClass('header_normal');
	  		$('body').removeClass('header_extended');
		}else {
			$('body').addClass('header_extended');
			$('body').removeClass('header_normal');
		}



	}
});

})(jQuery, this);
