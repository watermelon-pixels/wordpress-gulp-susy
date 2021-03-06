<?php
/**
 * _gulpsy functions and definitions
 *
 * @package _gulpsy
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
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Options panel website setup.
 */
//if ( is_admin() ) require_once( TEMPLATEPATH . '/lib/theme-options/settings.php' );

// OLD Options panel
// require_once( TEMPLATEPATH . '/lib/theme-options/gulpsy-options.php' );

/**
 * Options panel website setup.
 */

if ( file_exists( STYLESHEETPATH . '/lib/theme-options/theme-options.php' ) ) {
  require_once( STYLESHEETPATH . '/lib/theme-options/theme-options.php' );
}

if ( file_exists( STYLESHEETPATH . '/inc/modules/disable-embeds.php' ) ) {
  require_once( STYLESHEETPATH . '/inc/modules/disable-embeds.php' );
}


if ( file_exists( STYLESHEETPATH . '/inc/modules/disable-emojis.php' ) ) {
  require_once( STYLESHEETPATH . '/inc/modules/disable-emojis.php' );
}




/* Modules
 -------------------------- */

require_once get_template_directory() . '/inc/modules/contact.php';


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