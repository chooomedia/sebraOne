<?php
/**
 * Sidebar setup for footer full
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'SebraOne_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

<!-- ******************* The Footer Full-width Widget Area ******************* -->

<footer id="wrapper-footer">
	<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">
		<div class="row">
			<?php dynamic_sidebar( 'footerfull' ); ?>
		</div>
	</div>
</footer><!-- #wrapper-footer-full -->

<div class="site-footer pt-md-4 pb-md-4" id="colophon">
	<div class="container">
		<div class="row">
			<div class="site-info col-md-6">
				<?php SebraOne_site_info(); ?>
			</div><!-- .site-info -->
			<div class="site-info col-md-6 text-md-right">
				v0.9.1 - Beta Version <a data-toggle="modal" data-target="#bug-issue-form-modal" href="#bug-request-form">Fehler gefunden?</a>
			</div>
		</div>
	</div>
</div><!-- #colophon -->

<?php
endif;
