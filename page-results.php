<?php
/**
 * Template Name: Results Page Template
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
$pageTitle = get_the_title();

?>
<div class="wrapper" id="page-results-wrapper">
	<div class="explore-head">
		<div class="explore-types my-3" style="position: relative;">
			<div class="finder-title">
				<h4 class="m-0">Finde deinen Händler</h4>
			</div>
			<!--
			<div class="type-person item active"><a>
					<div class="type-info">
						<i class="fas fa-user mr-2"></i>
						<h4>Einzel-Händler</h4>
					</div>
				</a>
			</div>

			<div class="type-seller item"><a>
					<div class="type-info">
						<i class="fa fa-user-plus mr-2"></i>
						<h4>Händler</h4>
					</div>
				</a>
			</div>

			<div class="type-carpark item"><a>
					<div class="type-info">
						<i class="fa fa-users mr-2"></i>
						<h4>Auto-Park</h4>
					</div>
				</a>
			</div>

			<div class="type-carhouse item"><a>
					<div class="type-info">
						<i class="fa fa-car mr-2"></i>
						<h4>Autohaus</h4>
					</div>
				</a>
			</div>

			<div class="type-enterprise-seller item"><a>
					<div class="type-info">
						<i class="fa fa-building mr-2"></i>
						<h4>Großhändler</h4>
					</div>
				</a>
			</div>-->
			<div class="cts-prev d-lg-none">prev</div>
			<div class="cts-next cts-show d-lg-none">next</div>

			<div dir="ltr" class="resize-sensor"
				style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
				<div class="resize-sensor-expand"
					style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%">
					<div
						style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;">
					</div>
				</div>
				<div class="resize-sensor-shrink"
					style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%">
					<div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row mt-0" id="content" tabindex="-1">
			<!-- Get the Filter Sidebar -->
			<div id="results-filter" class="col-lg-3 col-sm-12">
				<?php get_template_part( 'sidebar-templates/sidebar-filter' ); ?>
			</div>

			<!--ADVICE COMMENT-->
			<!-- In the block with #results-main, render the template from the folder: loop-templates/search-results.php  -->
			<main class="col-lg-4 col-sm-12 pt-4 bg-light overflow-auto" id="results-main">
				<?php
					/**
					 * Request results
					 * Pass specific Data into the Template
					 * @param string:price-range € cheap €€ moderate €€€ exclusive
					 * @param string:seller-id TODO Generated!
					 * @param bool:seller-proofed Show blue proofed arrow after manual verification
					 * @param string:seller-text Shows Sellers Infotext TODO: NO Telephonnumbers, E-Mail or Urls!
					 * @param string:seller-logo Get the uploaded Logo Url from Seller Account
					 * @param string:seller-kpis Shows the status of the request (1 = appointment request, 2 = appointment confirmed, 3 = sold)
					 * @param bool:is-active Helperclass to change visibility
					 */
					global $queries;

					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/search-results',null, $queries );
					}

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
            	?>
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<div id="results-map" class="col-lg col-sm-12 pr-sm-0 pr-lg-0 pl-lg-0">
			<?php /**
					* Maps Modul
					* @param string:id Full-height: maps; half-height: boxed
					*/
				get_template_part( 'sidebar-templates/sidebar-maps', null, array(
					'data' => array(
						'id' => 'map',
						'searchform' => false
					)
				));
			?>
			</div>
		</div><!-- #content -->
	</div>

</div><!-- #page-wrapper -->

<?php
/**
* Modal Info Module
* Pass specific Data into the Modal i.e. Error Handling (Login, Search) and so on.
* @param string:id Builds DIV ID to wrapping container
* @param string:class Adds DIV Class to wrapping container
* @param string:title how the Title of Modal
* @param string:text Display Text also HTML or JS insert posibile
* @param bool:show-button Show Modal Button (open/close)
* @param string:button Define Button Title
* @param bool:is-event for Error Handling: Search, Login...
* @param string:event-function-name Defines the JS Function to Call Modal
* @param bool:show-footer Show Modal footer with Buttons?
* @param bool:is-active Helperclass to change visibility
*/
get_template_part( 'system-templates/modal-info', null, array(
	'id' => 'modal-info-results',
	'class' => 'container',
	'data'  => array(
		'type' => '3',
		'title' => strval($pageTitle),
		'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
		'show-button' => false,
		'button' => '',
		'is-event' => true,
		'event-function-name' => 'resultsModal',
		'show-footer' => false,
		'is-active' => false,
	))
);
?>
</div>

<script type="text/javascript">
	jQuery(function ($) {
		const sellerExploreTypes = $(".explore-types");
		const sellerExploreTypesArrowPrev = $(".cts-prev");
		const sellerExploreTypesArrowNext = $(".cts-next");

		let lastScrollLeft = 0;
		sellerExploreTypes.scroll(function () {
			var documentScrollLeft = sellerExploreTypes.scrollLeft();
			if (lastScrollLeft < documentScrollLeft) {
				sellerExploreTypesArrowPrev.addClass('cts-show');
				sellerExploreTypesArrowNext.removeClass('cts-show');

			}
			if (lastScrollLeft == documentScrollLeft) {
				sellerExploreTypesArrowNext.addClass('cts-show');
				sellerExploreTypesArrowPrev.removeClass('cts-show');
			}
		})
	});

</script>

<?php
get_footer();
