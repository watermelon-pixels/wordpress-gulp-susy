/* globals jQuery,ajaxurl */

'use strict';

jQuery(document).ready(function() {
    set_wputh_contact_form();
});

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


jQuery.noConflict();
jQuery(document).ready(function() {

	//var $ = JQuery;

	// Responsive menu 
	jQuery('.menu-toggle').click(function() {
	  jQuery(this).toggleClass('menu-expanded');
	});

	// Login Tabs
	jQuery('.tabs').on('click', 'li a', function(e){
	  e.preventDefault();
	  var $tab = jQuery(this),
	       href = $tab.attr('href');

	   jQuery('.active').removeClass('active');
	   $tab.addClass('active');

	   jQuery('.show')
	      .removeClass('show')
	      .addClass('hide')
	      .hide();
	  
	    jQuery(href)
	      .removeClass('hide')
	      .addClass('show')
	      .hide()
	      .fadeIn(550);
	});

 });
// Avoid `console` errors in browsers that lack a console.
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
