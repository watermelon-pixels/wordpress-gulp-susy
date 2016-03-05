<?php
/**
 * Default widget template.
 *
 * Copy this template to /simple-image-widget/widget.php in your theme or
 * child theme to make edits.
 *
 * @package   SimpleImageWidget
 * @copyright Copyright (c) 2015 Cedaro, LLC
 * @license   GPL-2.0+
 * @since     4.0.0
 */
?>

<?php if ( ! empty( $image_id ) ) : ?>
	<div class="product-item">
		<div class="pi-img-wrapper">
			<?php 
				echo $link_open;
				echo wp_get_attachment_image( $image_id, $image_size );
				echo $link_close;
			?>
			<div>
				<a href="#" class="button">View</a>
			</div>
		</div>
			<?php echo $text_link_open; ?>
			<?php
				if ( ! empty( $title ) ) :
					echo $before_title . $title . $after_title;
				endif;
			?>
			<?php echo $text_link_close; ?>
			<?php
				if ( ! empty( $text ) ) :
					echo wpautop( $text );
				endif;
			?>
			<div class="pi-price">$29.00</div>
			<a href="javascript:;" class="button add2cart">Add to cart</a>
	</div>
<?php endif; ?>



<!-- <?php if ( ! empty( $link_text ) ) : ?>
	<p class="more">

	</p>
<?php endif; ?> -->
