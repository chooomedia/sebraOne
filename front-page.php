<?php
/**
 * Template Name: Front Page
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); 

$container = get_theme_mod( 'SebraOne_container_type' );

?>

<div class="wrapper py-0" id="page-wrapper">
	<!-- Adds Thumbnail defined from Pages-Parameters of Wp Pages -->
	<?php if (!wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ), 'large' )): ?>
	<div class="front" style="background: #000;">
		<?php else : ?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
		<img class="d-none d-md-none bg-primary" src="<?php echo $thumb['0'];?>" />
		<div class="front">
			<?php endif ?>
			
			<div id="results-map" class="col-md-auto col-12 pt-md-5 pr-sm-0 pr-md-0 pl-md-0">
			<?php /**
					* Maps Modul
					* @param string:id Full-height: maps; half-height: boxed
					* @param bool:id Show inner Searchform true or not false
					*/
				get_template_part( 'sidebar-templates/sidebar-maps', null, array(
					'data' => array(
						'id' => 'boxed',
						'searchform' => true,
					)
				)); 
			?>
			</div>		
		</div>

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row mt-5">
				<div class="container">
					<main class="site-main" id="main">
						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content', 'front' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
						?>
					</main><!-- #main -->
				</div>

			</div><!-- .row -->

		</div><!-- #content -->

		<!-- Sell car steps -->
		<section id="landingpage-steps" class="jumbotron page-section bg-light pt-5 pb-2">
			<?php if( have_rows('salesprocess') ): ?>
			<?php while( have_rows('salesprocess') ): the_row(); ?>
			<div class="container bg-white p-5 pt-md-0 rounded-lg mb-5">
				<div class="text-center mb-5">
					<h2 class="section-heading text-uppercase mt-md-5 pt-md-5"><b><?php the_sub_field('sales_headline') ?></b></h2><!-- <b>Wie der Verkauf abläuft</b> -->
					<h3 class="text-accent section-subheading text-muted pb-md-5 pb-0"><?php the_sub_field('sales_subline') ?></h3> <!-- Schritt für Schritt <b>zur Anfrage</b> -->
				</div>

				<?php
					get_template_part( 'loop-templates/content-salesprocess', null, array(
						'id' => 'salesProcess'
					));
				?>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</section>

		<!-- Carbrands Logo list -->
		<?php if( have_rows('sectioncarbrands') ): ?>
		<section id="carbrand-iconlisting" class="mvh-100 py-5">
			<?php while( have_rows('sectioncarbrands') ): the_row(); ?>
			<div class="container py-5 my-5">
			<div class="text-center">
					<h2 class="section-heading text-uppercase mb-5"><?php the_sub_field('carbrands_headline') ?></h2> <!-- Sebra1 Top <b>Kfz-Marken</b> -->
				</div>
				<?php
						get_template_part( 'loop-templates/content-carbrands', null, array(
							'id' => 'sectionCarbrands'
						));
					?>
			</div>
			<?php endwhile; ?>
		</section>
		<?php endif; ?>

		<!-- FAQs --> 
		<section id="landingpage-faqs" class="mvh-100 page-section bg-darker">
			<?php if( have_rows('sectionfaqs') ): ?>
			<?php while( have_rows('sectionfaqs') ): the_row(); ?>
			<div class="container py-md-4 my-5 pt-md-3">
				<div class="text-center">
					<h2 class="section-heading text-uppercase text-white"><?php the_sub_field('faqs_headline') ?></h2><!-- <b>Meist</b> gestellte <b>Fragen</b> -->
					<h3 class="section-subheading text-accent mb-5"><?php the_sub_field('faqs_subline') ?></h3><!-- <b>Haben Sie</b> weiterhin <b>Fragen?</b> - <a class="text-accent" href="#">schreiben</a> Sie uns -->
				</div>
				<div class="col-12 mb-4">
					<?php
						get_template_part( 'loop-templates/content-faqs', null, array(
							'id' => 'sectionFaqs'
						));
					?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</section>

		<!-- Section: Customer reviews slider -->
		<?php if( have_rows('sectionreviews') ): ?>
		<section class="page-section bg-danger pt-5 pb-0" id="customer-reviews">
			<?php while( have_rows('sectionreviews') ): the_row(); ?>
			<div class="container py-md-4 my-5 pt-md-3">
				<div class="text-center">
					<div class="rounded-circle text-white">
						<i class="fas fa-4x fa-quote-left"></i>
					</div>
					<h2 class="section-heading text-uppercase mt-md-0 mb-md-5 mb-5 text-white"><?php the_sub_field('reviews_headline') ?></h2>
				</div>

				<div class="col-12 mb-4">
					<?php
						get_template_part( 'loop-templates/content-reviewslider', null, array(
							'id' => 'customerReviews',
							'class' => 'container'
							)
						);
					?>
				</div>
			</div>
			<?php endwhile; ?>
		</section>
		<?php endif; ?>

		<!-- CTA Footer -->
		<?php $footerCta = get_field('sectionCta');
		if( $footerCta ): ?>
			<?php /**
			* CTA Section-Module
			* Pass specific Data into data array
			* @param string:cta-background-color Hex Color i.e. #111
			* @param string:cta-spacing Top/Bottom Spacing in px i.e. 100px
			* @param string:cta-headline Headline of the CTA Module
			* @param string:cta-text Text CTA Module
			* @param string:cta-link-name Text of button
			* @param string:cta-link Link i.e. /impress
			*/

			get_template_part( 'page-templates/footer-cta', null, array(
				'id' => 'section-cta',
				'class' => 'container',
				'data'  => array(
					'ctabackgroundcolor' => $footerCta['sectionFooterCtaBackgroundColor'],
					'ctaspacing' => $footerCta['sectionFooterCtaSpacing'],
					'ctaheadline' => $footerCta['sectionFooterCtaHeadline'],
					'ctatext' => $footerCta['sectionFooterCtaText'],
					'ctalinkname' => $footerCta['sectionFooterCtaLinkTitle'],
					'ctalink' => $footerCta['sectionFooterCtaLink'],
				))
			);
			?>
		<?php endif; ?>

	</div><!-- #page-wrapper -->
<section>
<?php if (!is_user_logged_in()) {
	/**
	* Modal Info Module
	* Pass specific Data into the Modal i.e. Error Handling (Login, Search) and so on.
	* @param number:type 1 = Register Type, 2 = Login Type, 3 = Error-Type 4 = Info-Type
	* @param string:id Builds DIV ID to wrapping container
	* @param string:class Adds DIV Class to wrapping container
	* @param function:title Show the Title of Modal
	* @param string:text Display Text also HTML or JS insert posibile
	* @param bool:show-button Show Modal Button (open/close)
	* @param string:button Define Button Title
	* @param bool:is-event for Error Handling: Search, Login...
	* @param string:event-function-name Defines the JS Function to Call Modal
	* @param bool:show-footer Show Modal footer with Buttons?
	* @param bool:is-active Helperclass to change visibility
	*/
	get_template_part( 'system-templates/modal-info', null, array(
		'id' => 'modal-login-main',
		'class' => 'container',
		'data'  => array(
			'type' => 2,
			'title' => 'Frontpage', /*strval($pageTitle)*/
			'text' => 'Um die zu den Suchergebnissen zu gelangen registriere dich jetzt kostenlos.',
			'show-button' => true,
			'button' => 'Jetzt einloggen',
			'is-event' => true,
			'event-function-name' => 'loginFn',
			'show-footer' => false,
			'is-active' => false,
		))
	);
} ?>
</section>


	<?php
get_footer();
