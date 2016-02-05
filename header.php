<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _waterpix
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_waterpix' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="site-branding">
				<h1 class="site-title" role="banner">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="uk-margin uk-margin-remove" width="90" height="30" alt="Logo <?php bloginfo( 'name' ); ?>" src="http://getuikit.com/docs/images/logo_uikit.svg">
					</a>
				</h1>
				<h2 class="site-baseline"><?php bloginfo( 'description' ); ?></h2>
			</div>
			<button class="menu-toggle"><?php _e( 'Primary Menu', '_waterpix' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
