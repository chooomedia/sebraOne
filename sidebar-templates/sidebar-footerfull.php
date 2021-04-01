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

<footer class="wrapper" id="wrapper-footer">
	<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">
		<div class="row">
			<?php dynamic_sidebar( 'footerfull' ); ?>
		</div>
	</div>
</footer><!-- #wrapper-footer-full -->

<div class="site-footer py-3" id="colophon">
	<div class="container">
		<div class="site-info">
			<?php SebraOne_site_info(); ?>
		</div><!-- .site-info -->
	</div>
</div><!-- #colophon -->

<?php
endif;
