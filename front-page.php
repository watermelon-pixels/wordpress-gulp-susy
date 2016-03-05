<?php
/**
* The template for displaying the front page.
*
* This is the template that displays on the front page only.
*
* @package _waterpix
*/
get_header(); ?>


<div id="primary" class="full-width content-area">
	<main id="main" class="site-main" role="main">
		<div class="products-list clearfix">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home_column') ) : ?>
			<?php endif; ?>
<!-- 			<div class="product-container">
	<div class="product-item">
		<div class="pi-img-wrapper">
			<img src="https://s-media-cache-ak0.pinimg.com/564x/ab/b1/46/abb14675bf53482002307781b5d5ea8b.jpg" alt="Berry Lace Dress">
			<div>
				<a href="#" class="button">Zoom</a>
				<a href="#" class="button">View</a>
			</div>
		</div>
		<h3><a href="shop-item.html">Berry Lace Dress</a></h3>
		<div class="pi-price">$29.00</div>
		<a href="javascript:;" class="button add2cart">Add to cart</a>
		<div class="sticker sticker-new"></div>
	</div>
</div>
<div class="product-container">
	<div class="product-item">
		<div class="pi-img-wrapper">
			<img src="https://s-media-cache-ak0.pinimg.com/564x/2a/e6/78/2ae6784a9221f0853fe49fe8ac812d98.jpg" alt="Berry Lace Dress">
			<div>
				<a href="#" class="button">Zoom</a>
				<a href="#" class="button">View</a>
			</div>
		</div>
		<h3><a href="shop-item.html">Berry Lace Dress</a></h3>
		<div class="pi-price">$29.00</div>
		<a href="javascript:;" class="button add2cart">Add to cart</a>
	</div>
</div>
<div class="product-container">
	<div class="product-item">
		<div class="pi-img-wrapper">
			<img src="https://s-media-cache-ak0.pinimg.com/564x/5e/5a/b6/5e5ab644d4baa455753f2c5588774968.jpg" alt="Berry Lace Dress">
			<div>
				<a href="#" class="button">Zoom</a>
				<a href="#" class="button">View</a>
			</div>
		</div>
		<h3><a href="shop-item.html">Berry Lace Dress</a></h3>
		<div class="pi-price">$29.00</div>
		<a href="javascript:;" class="button add2cart">Add to cart</a>
	</div>
</div> -->
		</div>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'parts/content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>


<div class="flat-form clearfix">
  <ul class="tabs">
    <li>
      <a href="#login" class="active">Login</a>
    </li>
    <li>
      <a href="#register">Register</a>
    </li>
    <li>
      <a href="#reset">Reset Password</a>
    </li>
  </ul>
  <div id="login" class="form-action show">
    <h1>Login on Flat UI</h1>
    <p>Lorem ipsum by <a href="http://codepen.io/davideast">David East</a> dolor sit amet, consectetur adipisicing elit. Veritatis, magni culpa facilis.</p>
    <form>
		<input type="text" placeholder="Username" />
		<input type="password" placeholder="Password" />
		<input type="submit" value="Login" class="button" />
    </form>
  </div>
  <!--/#login.form-action-->
  <div id="register" class="form-action hide">
    <h1>Register</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa repudiandae.</p>
    <form>
		<input type="text" placeholder="Username" />
		<input type="password" placeholder="Password" />
		<input type="submit" value="Login" class="button" />
    </form>
  </div>
  <!--/#register.form-action-->
  <div id="reset" class="form-action hide">
    <h1>Reset Password</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, provident in accusamus possimus.</p>
    <form>
		<input type="text" placeholder="Username" />
		<input type="password" placeholder="Password" />
		<input type="submit" value="Login" class="button" />
    </form>
  </div>
  <!--/#register.form-action-->
</div>


	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>