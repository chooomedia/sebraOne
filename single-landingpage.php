<?php
/**
 * Template Name: Landingpage Template
 * Template Post Type: landingpage
 *
 * High performance landing page for generating districts within 
 * a city. With the help of custom post types, advertisements are 
 * placed in relation to the region via Google Maps.
 *
 * @package SebraOne
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 
$container = get_theme_mod( 'SebraOne_container_type' );
?>

<main class="wrapper" id="page-landingpage-wrapper">
	<!-- Right Nav -->
	<nav id="nav-right" class="bg-transparent fixed-bottom scroll-spy">  
		<ul class="navbar-nav ml-auto mr-md-3">
			<li class="nav-item">
				<a href="#customer-reviews" data-toggle="tooltip" data-placement="left" title="Was Kunden sagen" class="btn btn-primary nav-link">
					<i class="fas fa-2x fa-quote-left"></i>
				</a>
			</li>
			<li class="nav-item">
				<a href="#landingpage-benefits" data-toggle="tooltip" data-placement="left" title="Welche Vorteile?" class="btn btn-primary nav-link">
					<i class="far fa-2x fa-grin-wink"></i>
				</a>
			</li>
			<li class="nav-item">
				<a href="#landingpage-steps" data-toggle="tooltip" data-placement="left" title="Wie der Verkauf abläuft" class="btn btn-primary nav-link">
				<i style="margin-left:-5px;" class="fas fa-2x fa-shoe-prints"></i>
				</a>
			</li>
			<li class="nav-item">
				<a href="#landingpage-faqs" data-toggle="tooltip" data-placement="left" title="Meist gestellte Fragen (Faq)" class="btn btn-primary nav-link">
					<i class="far fa-2x fa-question-circle"></i>
				</a>
			</li>
			<li class="nav-item">
				<a href="#why-customer-loves-us" data-toggle="tooltip" data-placement="left" title="Warum Kunden Sebra1 lieben" class="btn btn-primary nav-link">
					<i class="far fa-2x fa-heart"></i>
				</a>
			</li>
			<li class="nav-item">
				<a href="#carbrand-iconlisting" data-toggle="tooltip" data-placement="left" title="Bekannte Automarken auf Sebra1" class="btn btn-primary nav-link">
					<i class="fas fa-2x fa-car"></i>
				</a>
			</li>
		</ul>
	</nav>

	<!-- Hero banner -->
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
	<section id="hero-main" class="mvh-100 container-fluid px-0 bg-turquoise-gradient" style="background: linear-gradient(#ffffff00 -10%,#08a9e8 100%), url('<?php echo $thumb['0'];?>')!important;background-size:cover, cover!important;background-position:center center,center center;">	
		<div class="jumbotron container bg-transparent">
		<?php if( have_rows('hero') ): ?>
		<?php while( have_rows('hero') ): the_row(); ?>
			<div class="row p-md-0 text-white">
				<div id="nav-tabContent" class="tab-content card col-md-7 col-10 mb-5 mx-auto mx-md-0 px-0 mb-md-0 mt-md-3 mt-0 box-shadow-lg">
					<div role="tabpanel" id="nav-home" class="tab-pane fade card-body show active">
						<div class="text-primary pt-md-4 pt-md-2 pt-2 pb-2">
							<h2 class="mt-3 mt-md-0">Angebote in <b><?php the_sub_field('zipcity') ?>,</b><BR>
								in der Nähe von <b><?php the_sub_field('street') ?></b>
							</h2>
							<p>
							Verkaufe jetzt dein Auto in der Nähe von <b><?php the_sub_field('street') ?></b>.<br>
							</p>
							<p>
							<?php the_content(); ?>
							</p>
						</div>
					</div>
					<div role="tabpanel" id="nav-searchbox" class="tab-pane card-body border-0">
						<div id="landingpage-search">
							<!-- Add searchform.php -->
							<div class="container-fluid p-0 m-0 w-100">
								<?php 
									get_template_part( 'searchform', null, array(
										'data' => array(
											'formId' => 'searchform-lp',
										)
									)); 
								?>
							</div>
						</div>						
					</div>
					<div class="card-footer">
						<div class="d-flex" id="nav-tab" role="tablist">
							<a class="btn btn-primary px-4 py-3" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
								<i class="fa fa-home"></i>
							</a>
						
							<a class="btn btn-primary py-3 px-3 mx-md-2" style="min-width:68px;" id="nav-searchbox-tab" data-toggle="tab" href="#nav-searchbox" role="tab" aria-controls="nav-searchbox" aria-selected="fals">
								<img width="22px" height="22px" src="<?php echo get_site_icon_url(); ?>" />
							</a>
						
							<a class="btn btn-primary py-3 px-md-4 px-2" target="_blank" href="<?php the_sub_field('link') ?>">
								<?php the_sub_field('linktitle') ?>
							</a>
						</div>	
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<!-- Section: Customer reviews slider -->
	<section class="page-section bg-danger pt-5 pb-0" id="customer-reviews">
	<?php if( have_rows('sectionreviews') ): ?>
		<?php while( have_rows('sectionreviews') ): the_row(); ?>
		<div class="container py-md-4 pt-md-3">
			<div class="text-center">
				<div class="rounded-circle text-white">
					<i class="fas fa-4x fa-quote-left"></i>
				</div>
				<h2 class="section-heading text-uppercase mt-md-0 mb-md-5 mb-5 text-white"><?php the_sub_field('reviews_headline') ?></h2>
			</div>

			<div class="col-12 mb-0">
				<?php
					get_template_part( 'loop-templates/content-reviewslider', null, array(
						'id' => 'customerReviews',
						'class' => 'container'
						)
					);
				?>
			</div>
		</div>
		<div id="trusted-logos" class="container-fluid px-md-5">
			<div class="container py-4">
				<div class="row y-4">
					<div class="col-8 mx-auto">
						<div class="row d-flex justify-content-center align-items-center">
							<div class="col-12 mx-auto text-center mt-2">
								<h4 class="large text-white"><?php the_sub_field('reviews_footer') ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</section>

	<!-- Benefits section -->
	<section id="landingpage-benefits" class="page-section jumbotron">
		<?php if( have_rows('benefits') ): ?>
		<?php while( have_rows('benefits') ): the_row(); ?>
		<div class="container">
			<div class="text-center">
				<h2 class="section-heading text-uppercase mt-md-0"><b><?php the_sub_field('benefits_headline') ?></b></h2><!-- Welche Vorteile? -->
				<h3 class="section-subheading text-accent mb-5"><?php the_sub_field('benefits_subline') ?></h3> <!-- <b>Einfach & fair</b> den <b>besten Verkaufspreis</b> erhalten -->
			</div>
			<?php /**
			* Customer reviews Section-Module
			* Pass specific Data into data array
			* @param string:headline Headline Benefits
			* @param string:subline 2. Headline Benefits
			*/

			get_template_part( 'loop-templates/content-benefits', null, array(
				'id' => 'customerBenefits'
			));
			?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>

	<!-- Sell car steps -->
	<section id="landingpage-steps" class="jumbotron page-section bg-light pt-5 pb-2">
		<?php if( have_rows('salesprocess') ): ?>
		<?php while( have_rows('salesprocess') ): the_row(); ?>
		<div class="container bg-white pt-md-0 rounded-lg mb-5">
			<div class="text-center mb-5">
				<h2 class="section-heading text-uppercase mt-md-5 pt-md-5"><b><?php the_sub_field('sales_headline') ?></b></h2><!-- <b>Wie der Verkauf abläuft</b> -->
				<h3 class="text-accent section-subheading text-muted pb-md-2 pb-0"><?php the_sub_field('sales_subline') ?></h3> <!-- Schritt für Schritt <b>zur Anfrage</b> -->
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

	<!-- FAQs --> 
	<section id="landingpage-faqs" class="mvh-50 page-section bg-darker">
		<?php if( have_rows('sectionfaqs') ): ?>
		<?php while( have_rows('sectionfaqs') ): the_row(); ?>
		<div class="container py-md-3 my-5 pt-md-4">
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

	<!-- Why customers love us -->
	<section id="why-customer-loves-us" class="page-section py-5 bg-grey">
	<?php
		get_template_part( 'loop-templates/content-customerlove', null, array(
			'id' => 'sectionCustomerlove'
		));
	?>
	</section>

	<!-- Carbrands Logo list -->
	<section id="carbrand-iconlisting" class="mvh-100 py-5">
	<?php if( have_rows('sectioncarbrands') ): ?>
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
	<?php endif; ?>
	</section>

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

	<style>
		@media screen and (max-width:471px) {
			.navbar-nav.ml-auto.mr-md-3 {
				transform: scale(.8);
			}
		}
	</style>

	<script>
	jQuery(function($) {
		if (window.matchMedia("(min-width: 471px)").matches) {
			$('[data-toggle="tooltip"]').tooltip();
		}

		if($('#nav-searchbox-tab')) {

			$('#nav-searchbox-tab').on('change', function() {
				$('#nav-searchbox').removeClass('active');
			});
			$('#nav-home-tab').on('change', function() {
				$('#nav-home').removeClass('active');
			});
		};
	});
	</script>
</main>

<?php
get_footer();
