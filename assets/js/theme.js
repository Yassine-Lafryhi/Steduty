jQuery(function($) {
	
	'use strict';
	
	$("#search-icon").click(function () {
	  $('#search-popup').addClass('popup-box-on');
	  return false;
	});
	  
	$("#search-popup .close").click(function () {
		$('#search-popup').removeClass('popup-box-on');
	});
	
	$("#mobile-search").click(function () {
	  $('#mobile-search-popup').addClass('popup-box');
	  return false;
	});
	  
	$("#close-icon").click(function () {
		$('#mobile-search-popup').removeClass('popup-box');
	});
	
	
	$('.main-menu').clone().appendTo('.mobile-menu');
	$( ".menu-icon" ).on( "click", function() {
		$(".mobile-menu").slideToggle();
	});	
	
	$('.mobile-menu').find('.menu-item-has-children').append('<span class="zmm-dropdown-toggle fa fa-plus"></span>');
	$( ".mobile-menu .main-menu" ).find('.sub-menu').slideToggle();
	
	//dropdown toggle
	$( ".zmm-dropdown-toggle" ).on( "click", function() {
		var parent = $( this ).parent('li').children('.sub-menu');
		$( this ).parent('li').children('.sub-menu').slideToggle();
		$( this ).toggleClass('fa-minus');
		if( $( parent ).find('.sub-menu').length ){
			$( parent ).find('.sub-menu').slideUp();
			$( parent ).find('.zmm-dropdown-toggle').removeClass('fa-minus');
		}
	});
	
	$('.mobile-menu-wrap').find('.mobile-menu').append('<div class="menu-close"><i class="fa fa-times"></i></div>');
	$('.mobile-menu-wrap .main-menu').before($('.menu-close'));
	
	$('.mobile-menu-wrap .menu-close').on("click", function() { $(".mobile-menu").removeAttr("style") } );
	
	if ($(window).width() <= 1024) {
		
		//$( "body" ).addClass( "zmm-open" );
		if($('.menu-icon').on('click', function () {
			$( "body" ).addClass( "zmm-open" ); })
		);
		if($('.menu-close').on('click', function(){
			$( "body" ).removeClass( "zmm-open" ); })
		);
			
	}
	
	
		
});

