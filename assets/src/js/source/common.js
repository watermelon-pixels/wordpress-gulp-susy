// Gulpsy Javascript Document

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
		if ($('.up-footer').is(':hidden')) {
				$(this).css('background-position','0 0');
				$('.up-footer').slideDown('slow', function() {
				    $(this)
					    .addClass('open')
						.filter( ".middle" )
						.focus();
					$('.icon-arrow-up')
						.removeClass('icon-arrow-up')
						.addClass('icon-arrow-down');
				});
			} else {
				$(this).css('background-position','0 0');
				//alert("Cliquer pour continuer");
				$(".up-footer").slideUp('slow', function() {
					$('.icon-arrow-down')
						.css({transition: 'all 0.3s ease-in-out 0.2s'})
						.removeClass('icon-arrow-down')
						.addClass('icon-arrow-up');
				});
			}
		return false;			   
	});


	//File Upload 
/*    jQuery('input.fakae-upload').FakeUpload({
        defaultTxt : 'Parcourir ...',
        hasFakeButton : 1,
        hasFakeButtonTxt : 'Choisir un fichier',
    });*/

});