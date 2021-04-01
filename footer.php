<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'SebraOne_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">
			<div class="col-sm-3">
				<div class="footer-widget">
					<h3>Sebra1</h3>
					<div class="footer-widget-content">
						<a href="mailto:sales@example.com" class="contact-link">hallo @ sebra1.com</a>
						<a href="mailto:support@example.com" class="contact-link red"> support @ sebra1.com </a>
						<a href="tel:0121234" class="contact-link">(+49) 030 1234-5678</a>
						<div class="footer-social">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="footer-widget">
					<h3>News</h3>
					<div class="footer-widget-content">
						<div class="media">
							<div class="media-left">
								<a href="#"><img class="media-object" src="http://placehold.it/60x60" alt="..."></a>
							</div>
							<div class="media-body">
								<p><a href="#">vulputate velit esse consequat. </a></p>
								<span>September 30, 2016 </span>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<a href="#."><img class="media-object" src="http://placehold.it/60x60" alt="..."></a>
							</div>
							<div class="media-body">
								<p><a href="#">vulputate velit esse consequat. </a></p>
								<span>September 30, 2016 </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="footer-widget">
					<h3>Services</h3>
					<div class="footer-widget-content">
						<div class="open-time ">
							<ul class="opening-time">
								<li><span><i class="fa fa-times"></i></span>
									<p class="clock-time"><strong>monday :</strong> closed</p>
								</li>
								<li><span><i class="fa fa-check"></i></span>
									<p><strong>tue-fri :</strong> 8am - 12am</p>
								</li>
								<li><span><i class="fa fa-check"></i></span>
									<p><strong>sat-sun :</strong> 7am - 1am</p>
								</li>
								<li><span><i class="fa fa-check"></i></span>
									<p><strong>holydays :</strong> 12pm-12am</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="footer-widget">
					<h3>Händler</h3>
					<div class="footer-widget-content">
						<div class="images-gellary">
							<ul>
								<li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 01"></a></li>
								<li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 02"></a></li>
								<li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 03"></a></li>
								<li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 04"></a></li>
								<li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 05"></a></li>
								<li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 06"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container end -->
</footer><!-- wrapper end -->

<div class="site-footer py-3" id="colophon">
	<div class="container">
		<div class="site-info">
			<?php SebraOne_site_info(); ?>
		</div><!-- .site-info -->
	</div>
</div><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
