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
/* globals jQuery,ajaxurl */

'use strict';

/* ----------------------------------------------------------
  Set Contact form
---------------------------------------------------------- */

function set_wputh_contact_form() {
    var $wrapper = jQuery('.wputh-contact-form-wrapper');

    function submit_form(e) {
        e.preventDefault();
        $wrapper.addClass('contact-form-is-loading');
        $wrapper.find('button').attr('aria-disabled', 'true').attr('disabled', 'disabled');
        $wrapper.trigger('wputh_contact_before_ajax');
        jQuery(this).ajaxSubmit({
            target: $wrapper,
            url: ajaxurl,
            success: ajax_success
        });
    }

    function ajax_success() {
        $wrapper.removeClass('contact-form-is-loading');
        $wrapper.trigger('wputh_contact_after_ajax');
    }

    /* Events -------------------------- */

    /* Form submit */
    $wrapper.on('submit', '.wputh__contact__form', submit_form);

    /* Special actions before AJAX send */
    $wrapper.on('wputh_contact_before_ajax', function() {
        jQuery('html, body').animate({
            scrollTop: $wrapper.offset().top - 50
        }, 300);
    });

}


jQuery(document).ready(function() {
    set_wputh_contact_form();
});
// Avoid console errors in browsers that lack a console.
'use strict';

(function() {
    var method;
    var noop = function noop() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/*( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
} )( jQuery );*/

/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
'use strict';


( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
} )();

'use strict';

( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();
