<?php
/**
 * _waterpix functions and definitions
 *
 * @package _waterpix
 */

/****************************************
Theme Setup
*****************************************/

/**
 * Theme initialization
 */
require get_template_directory() . '/lib/init.php';

/**
 * Custom theme functions definited in /lib/init.php
 */
require get_template_directory() . '/lib/theme-functions.php';

/**
 * Helper functions for use in other areas of the theme
 */
require get_template_directory() . '/lib/theme-helpers.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';


/**
 * Options panel website setup.
 */
require get_template_directory() . '/lib/theme_settings.php';

/**
 * Options panel website setup.
 */
//require get_template_directory() . '/lib/theme_panel.php';


/* Options framework */

//require get_template_directory() . '/lib/options.php';


/**
 * http://themeshaper.com/2010/06/03/sample-theme-options/
 */
//require_once get_template_directory() . '/lib/theme-options/theme-options.php';

/**
 * Options panel https://www.damianschwyrz.de/wordpress-theme-simple-option-seite-erstellen-und-integrieren/
 */
//require get_template_directory() . '/lib/functions-theme-options.php';
//require get_template_directory() . '/lib/theme-options.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/lib/inc/jetpack.php';


/****************************************
Require Plugins
*****************************************/

require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require get_template_directory() . '/lib/theme-require-plugins.php';

// add_action( 'tgmpa_register', 'mb_register_required_plugins' );

/* Modules
 -------------------------- */
require_once get_template_directory() . '/inc/modules/contact.php';

/****************************************
Misc Theme Functions
*****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
add_action( 'admin_init', 'mb_add_post_type_caps' );
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}


/** Automatically Updating Copyright Years */

/*if ( ! function_exists( 'get_copyright_years' ) ) {
  function get_copyright_years( $earliest_id = null ) {
    $earliest_args = array(
      'post_type'   => array( 'any' ),
      'numberposts' => 1,
      'orderby'     => 'date',
      'order'       => 'ASC'
    );
    $get_post      = $earliest_id
                   ? get_post( $earliest_id )
                   : null;
    if ( ! $get_post ) {
      $get_post = array_shift( get_posts( $earliest_args ) );
    }
    $earliest_date = date( 'Y', strtotime( $get_post->post_date ) );
    $current_date  = date( 'Y' );
    return $earliest_date == $current_date
           ? $current_date
           : $earliest_date . '&ndash;' . $current_date;
  }
}

if ( ! function_exists( 'copyright_years' ) ) {
  function copyright_years( $earliest_id = null ) {
    echo get_copyright_years( $earliest_id );
  }
}*/