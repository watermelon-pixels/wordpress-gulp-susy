<?php
/* Template Name: Contact */
//include dirname( __FILE__ ) . '/../z-protect.php';
get_header();
the_post();
?>
<div class="page-inner main">
	<div class=" content">
	<section id="content" >
		<h1><?php the_title(); ?> test</h1>
		<article class="">
			<?php the_content(); ?>
			<?php do_action('wputh_contact_content'); ?>
		</article>
		<aside class="sidebar">
			<p>Summary</p>
			<?php get_sidebar(); ?>
		</aside>
	</section>
	</div>
</div>
<?php get_footer(); ?>