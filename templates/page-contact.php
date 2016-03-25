<?php
/**
 * Template Name: Page contact
 *
 *
 * @package _gulpsy
 */
?>
<?php echo '
<style type="text/css">
  .error{
    padding: 6px 10px;
    border: 1px solid red;
    color: red;
    border-radius: 4px;
  }
 
 .success{
    padding: 6px 10px;
    border: 1px solid green;
    color: green;
    border-radius: 4px;
  }
 
  form span{
    color: red;
  }
</style>'
?>
<?php
if(isset($_POST['submitted'])) {
if(trim($_POST['contactName']) === '') {
$nameError = 'Please enter your name.';
$hasError = true;
} else {
$name = trim($_POST['contactName']);
}
if(trim($_POST['email']) === '')  {
$emailError = 'Please enter your email address.';
$hasError = true;
} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
$emailError = 'You entered an invalid email address.';
$hasError = true;
} else {
$email = trim($_POST['email']);
}
if(trim($_POST['comments']) === '') {
$commentError = 'Please enter a message.';
$hasError = true;
} else {
if(function_exists('stripslashes')) {
$comments = stripslashes(trim($_POST['comments']));
} else {
$comments = trim($_POST['comments']);
}
}
if(!isset($hasError)) {
$emailTo = get_option('tz_email');
if (!isset($emailTo) || ($emailTo == '') ){
$emailTo = get_option('admin_email');
}
$subject = '[PHP Snippets] From '.$name;
$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
wp_mail($emailTo, $subject, $body, $headers);
$emailSent = true;
}
} ?>
<?php get_header(); ?>
<div id="container">
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<div class="form-container">
<?php
function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Your Name (required) <br/>';
	echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Subject (required) <br/>';
	echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br/>';
	echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="cf-submitted" value="Send" class="button"></p>';
	echo '</form>';
}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$subject = sanitize_text_field( $_POST["cf-subject"] );
		$message = esc_textarea( $_POST["cf-message"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Thanks for contacting me, expect a response soon.</p>';
			echo '</div>';
		} else {
			echo 'An unexpected error occurred';
		}
	}
}

function cf_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}
	
add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );
?>

<?php echo do_shortcode( '[sitepoint_contact_form]' ); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>