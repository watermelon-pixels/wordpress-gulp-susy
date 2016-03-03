// Document Javascript Tanguy Groupe Web App

// Remplacer les clicks click(function() par on('tap',function()
'use strict';

jQuery(document).ready(function($) {

	$(".close-menu").on('click', function(){
		$(".toppanel").toggleClass("close-panel");
		$(".close").toggleClass("open");
		return false;
	}); 

	$(".thumbs-icon").on('click', function(){
		$(".slider").toggleClass("close-panel");
		$(".thumbs-icon").toggleClass("selected");
		return false;
	}); 

	//Shrink header bar
/*	$(function(){
	 var shrinkHeader = 100;
	  $(window).scroll(function() {
	    var scroll = getCurrentScroll();
	      if ( scroll >= shrinkHeader ) {
	           $('.site-header').addClass('shrink');
	        }
	        else {
	            $('.site-header').removeClass('shrink');
	        }
	  });
	function getCurrentScroll() {
	    return window.pageYOffset;
	    }
	});
*/

	/*!
	 * prettySticky - v1 - 2014-10-26
	 * https://github.com/moyamiller/prettySticky
	 * Copyright (c) 2014 Moya Miller
	 */

	$(function() {
	    $(window).scroll(function() {
	        var scroll = $(window).scrollTop() + 90;
	        var currentArea = $("section").filter(function() {
	        	return scroll <= $(this).offset().top + $(this).height();
	        });
	        $(".nav a").removeClass("selected");
	        $(".nav a[href=#" + currentArea.attr("id") + "]").addClass("selected");

	        if ($(window).scrollTop() > 100) {
	            $('nav').addClass("navScroll");
	            $('.site-title').addClass("logoScroll");
	            $('.site-header').addClass("shrink");
	            $('div.menu').addClass("menuScroll");
	        } else if ($(window).scrollTop() < 100 ) {
	            $('nav').removeClass("navScroll");
	            $('site-title').removeClass("logoScroll");
	            $('.site-header').removeClass("shrink");
	            $('div.menu').removeClass("menuScroll");
	        }
	    });
	});

    // Login Tabs
    $('.tabs').on('click', 'li a', function(e) {
        e.preventDefault();
        var $tab = $(this),
            href = $tab.attr('href');

        $('.active').removeClass('active');
        $tab.addClass('active');

        $('.show')
            .removeClass('show')
            .addClass('hide')
            .hide();

        $(href)
            .removeClass('hide')
            .addClass('show')
            .hide()
            .fadeIn(550);
    });


	//SHOW/HIDE FOOTER
	$('#slide-toggle').click(function(){	
		if ($(".up-footer").is(":hidden")) {
				$(this).css('background-position','0 0');
				$(".up-footer").slideDown("slow", function() {
				    $( this )
					.filter( ".middle" )
					.focus();
				 });
			} else {
				$(this).css('background-position','0 0');
				//alert("Cliquer pour continuer");
				$(".up-footer").slideUp("slow");
			}
		return false;			   
	});	

});