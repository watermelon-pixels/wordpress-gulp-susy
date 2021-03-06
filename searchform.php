<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage _gulpsy
 */
?>
<h3>Formulaire de recherche</h3>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _gulpsy( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_gulpsy( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_gulpsy( 'Search for:', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit button" value="<?php echo esc_attr_gulpsy( 'Search', 'submit button' ) ?>" />
</form>