
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