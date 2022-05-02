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
	<section id="customer-reviews" class="page-section bg-turquoise pt-5 pt-md-0 pb-0">
	<?php if( have_rows('customersReviewArray') ) : ?>
		<?php /**
		* Customer reviews Section-Module
		* Pass specific Data into data array
		* @param string:headline Headline customer review slider
		* @param string:footline Text Footer customer review slider
		*/

		get_template_part( 'loop-templates/content-reviewslider', null, array(
			'id' => 'customerReviews',
			'class' => 'container pt-md-5',
			'data'  => array(
				'headline' => get_field('customerReviewHeadline'),
				'footline' => get_field('customerReviewFootline'),
			))
		);
		?>
	<?php endif; ?>
	</section>

	<!-- Benefits section -->
	<section id="landingpage-benefits" class="page-section jumbotron">
		<?php if( have_rows('benefits') ): ?>
		<?php while( have_rows('benefits') ): the_row(); ?>
		<div class="container">
			<div class="text-center">
				<h2 class="section-heading text-uppercase mt-md-0"><b><?php the_sub_field('headline') ?></b></h2><!-- Welche Vorteile? -->
				<h3 class="section-subheading text-accent mb-5"><?php the_sub_field('subline') ?></h3> <!-- <b>Einfach & fair</b> den <b>besten Verkaufspreis</b> erhalten -->
			</div>
			<?php
			get_template_part( 'loop-templates/content-benefits', null, array(
				'id' => 'customerBenefits'
				)
			);
			?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>

	<!-- Sell car steps -->
	<section id="landingpage-steps" class="jumbotron page-section bg-light pt-5 pb-2">
		<div class="container bg-white p-5 pt-md-0 rounded-lg mb-5">
			<div class="text-center mb-5">
				<h2 class="section-heading text-uppercase mt-md-5 pt-md-5"><b><?php the_sub_field('headline') ?></b></h2><!-- <b>Wie der Verkauf abläuft</b> -->
				<h3 class="text-accent section-subheading text-muted pb-md-5 pb-0"><?php the_sub_field('subline') ?></h3> <!-- Schritt für Schritt <b>zur Anfrage</b> -->
			</div>
		</div>

		<?php if( have_rows('salesprocess') ): ?>
		<?php while( have_rows('salesprocess') ): the_row(); ?>
			<?php
			get_template_part( 'loop-templates/content-salesprocess', null, array(
				'id' => 'salesProcess'
				)
			);
			?>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>

	<!-- FAQs --> 
	<section id="landingpage-faqs" class="mvh-100 page-section bg-darker">
		<div class="container py-md-4 my-5 pt-md-3">
			<div class="text-center">
				<h2 class="section-heading text-uppercase text-white"><b>Meist</b> gestellte <b>Fragen</b></h2>
				<h3 class="section-subheading text-accent mb-5"><b>Haben Sie</b> weiterhin <b>Fragen?</b> - <a class="text-accent" href="#">schreiben</a> Sie uns</h3>
			</div>
			<div class="col-12 mb-4">
				<div class="col-md-12 col-12 p-0">
					<div class="card">
						<div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent1" role="button" aria-expanded="false" aria-controls="collapseFaqContent1">
							<b>Frage</b>
							<a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
								<div id="carbrand-arrow-0">
									<i class="fas fa-chevron-down text-white"></i>
								</div>
							</a>
						</div>
						<div class="collapse" id="collapseFaqContent1">
							<div class="card card-body">
								<div class="card-body p-0 py-md-3">
									Antwort
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 py-3"></div>
				<div class="col-md-12 col-12 p-0">
					<div class="card">
						<div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent2" role="button" aria-expanded="false" aria-controls="collapseFaqContent2">
							<b>Frage</b>
							<a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
								<div id="carbrand-arrow-1">
									<i class="fas fa-chevron-down text-white"></i>
								</div>
							</a>
						</div>
						<div class="collapse" id="collapseFaqContent2">
							<div class="card card-body">
								<div class="card-body p-0 py-md-3">
									Antwort
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 py-3"></div>
				<div class="col-md-12 col-12 p-0">
					<div class="card">
						<div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent3" role="button" aria-expanded="false" aria-controls="collapseFaqContent3">
							<b>Frage</b>
							<a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
								<div id="carbrand-arrow-2">
									<i class="fas fa-chevron-down text-white"></i>
								</div>
							</a>
						</div>
						<div class="collapse" id="collapseFaqContent3">
							<div class="card card-body">
								<div class="card-body p-0 py-md-3">
									Antwort
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 py-3"></div>
				<div class="col-md-12 col-12 p-0">
					<div class="card">
						<div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent4" role="button" aria-expanded="false" aria-controls="collapseFaqContent4">
							<b>Frage</b>
							<a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
								<div id="carbrand-arrow-3">
									<i class="fas fa-chevron-down text-white"></i>
								</div>
							</a>
						</div>
						<div class="collapse" id="collapseFaqContent4">
							<div class="card card-body">
								<div class="card-body p-0 py-md-3">
									Antwort
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 py-3"></div>
				<div class="col-md-12 col-12 p-0">
					<div class="card">
						<div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent5" role="button" aria-expanded="false" aria-controls="collapseFaqContent5">
							<b>Frage</b>
							<a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
								<div id="carbrand-arrow-4">
									<i class="fas fa-chevron-down text-white"></i>
								</div>
							</a>
						</div>
						<div class="collapse" id="collapseFaqContent5">
							<div class="card card-body">
								<div class="card-body p-0 py-md-3">
									Antwort
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 py-3"></div>
				<div class="col-md-12 col-12 p-0">
					<div class="card">
						<div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent6" role="button" aria-expanded="false" aria-controls="collapseFaqContent6">
							<b>Frage</b>
							<a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
								<div id="carbrand-arrow-5">
									<i class="fas fa-chevron-down text-white"></i>
								</div>
							</a>
						</div>
						<div class="collapse" id="collapseFaqContent6">
							<div class="card card-body">
								<div class="card-body p-0 py-md-3">
									Antwort
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Why customers love us -->
	<section id="why-customer-loves-us" class="page-section py-5 bg-grey">
		<div class="container py-5 mb-1">
			<div class="text-center pt-md-5">
				<h2 class="section-heading text-uppercase mb-5"><b>Warum</b> Kunden Sebra1 <b>lieben</b></h2>
			</div>
			<dic class="row py-5">
				<div class="col-md-3 col-6 mx-auto text-center">
					<div class="circle-icon rounded-circle mx-auto bg-white">
						<i class="fas fa-4x fa-euro-sign"></i>
					</div>
					<p class="text-muted">
						Faire Preise für<br> besseren Gewinn
					</p>
				</div>
				<div class="col-md-3 col-6 mx-auto text-center ">
					<div class="circle-icon rounded-circle mx-auto bg-white">
						<i class="far fa-4x fa-clock"></i>
					</div>
					<p class="text-muted">
						Kfz-Verkauf innerhalb<br> weniger Stunden möglich
					</p>
				</div>
				<div class="col-md-3 col-6 mx-auto text-center ">
					<div class="circle-icon rounded-circle mx-auto bg-white">
						<i class="fas fa-4x fa-fire"></i>
					</div>
					<p class="text-muted">
						Geldsparende Deals<br> in der Region
					</p>
				</div>
				<div class="col-md-3 col-6 mx-auto text-center ">
					<div class="circle-icon rounded-circle mx-auto bg-white">
					<i class="fas fa-4x fa-money-bill-wave"></i>
					</div>
					<p class="text-muted">
						Sicherer und schnelle<br> Bezahlungsmethode
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Carbrands Logo list -->
	<section id="carbrand-iconlisting" class="mvh-100 py-5">
		<div class="container py-5 my-5">
		<div class="text-center">
				<h2 class="section-heading text-uppercase mb-5">Sebra1 Top <b>Kfz-Marken</b></h2>
			</div>
			<div class="row align-items-center">
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
							alt="..." />
					</a>
				</div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
							alt="..." />
					</a>
				</div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
						alt="..." />
					</a>
				</div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
							alt="..." />
					</a>
				</div>
				<div class="col-12 py-4 d-none d-md-block"></div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
							alt="..." />
					</a>
				</div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
							alt="..." />
					</a>
				</div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
						alt="..." />
					</a>
				</div>
				<div class="col-md-3 col-6 my-3">
					<a href="#!">
						<img class="img-fluid img-brand d-block mx-auto" src="https://via.placeholder.com/180x60"
							alt="..." />
					</a>
				</div>
			</div>
		</div>
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
</main>

<script>
jQuery(function($) {
	$.each($(".card-header[data-toggle='collapse']"), function(index) {
		$(this).on( "click", function() {
			$("#carbrand-arrow-"+ index +"").toggleClass('chevron-rotate','');
		});;
	});

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

<?php
get_footer();
