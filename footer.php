<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package _waterpix
*/
?>
	</div><!-- #content -->
		<footer id="colophon" class="site-footer contentinfo" role="contentinfo">
			<button id="slide-toggle" title="Cliquez pour ouvrir">
				<span class="icon-arrow-up"></span>
			</button>
			<div class="up-footer">
				<div class="up-footer-container clearfix">
					<div class="logo-footer-wrapper">
						<a class="logo-footer" href="#home"rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>
					<div class="socials-footer">
						<ul class="socials clearfix">
							<?php if (!empty(get_option('facebook_url'))); {?>
							<li><a href="<?php echo stripslashes(get_option('facebook_url')); ?>"><span class="icon-facebook"></span></a></li>
							<?php };?>
							<?php if (!empty(get_option('facebook_url'))); {?>
							<li><a href="<?php echo stripslashes(get_option('twitter_url')); ?>"><span class="icon-twitter"></span></a></li>
							<?php };?>
							<?php
							$youtube = get_option('youtube_url');
							if ($youtube != '')
							{
							echo '<li><a class="clickevent" href="' . $youtube . '"><span class="icon-youtube"></span></a></li>';
							};
							?>
							<?php if (!empty(get_option('youtube_url'))); {?>
							<li><a href="<?php echo stripslashes(get_option('youtube_url')); ?>"><span class="icon-youtube"></span></a></li>
							<?php };?>
							<?php if (!empty(get_option('pinterest_url'))); {?>
							<li><a href="<?php echo stripslashes(get_option('pinterest_url')); ?>"><span class="icon-pinterest"></span></a></li>
							<?php };?>
							<?php if (!empty(get_option('github_url'))); {?>
							<li><a href="<?php echo stripslashes(get_option('github_url')); ?>"><span class="icon-github"></span></a></li>
							<?php };?>
							<?php if (!empty(get_option('linkedin_url'))); {?>
							<li><a href="<?php echo stripslashes(get_option('linkedin_url')); ?>"><span class="icon-linkedin"></span></a></li>
							<?php };?>
							<li><a href="contact"><span class="icon-mail"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="site-info-container">
				<div class="site-info">
					<div class="copyright">
						<p class=""><!--?php printf( __( '&copy; %s. All Rights Reserved.', 'text-domain' ), get_copyright_years() ); ?--> <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
						<?php get_option("footer_text"); ?>
					</div>
					<?php wp_nav_menu(
						array(
						"theme_location"    => "secondary_nav",
						"container"         => "nav",
						"container_class"   => "secondary-nav-container",
						"menu_class"        => "nav secondary-nav",
						)
					);?>
				</div><!-- .site-info -->
			</div>
		</footer><!-- #colophon -->
	</div><!-- #page -->
		<?php wp_footer(); ?>
		<?php echo stripslashes(get_option('ga_js_code')); ?>
		<a id="toTop" href="#" style="display: inline;">
			<span id="toTopHover" style="opacity: 0;"></span>
		</a>
	</body>
</html>