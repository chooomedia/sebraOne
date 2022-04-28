<?php
/**
 * Template Name: Seller Details Page Template
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
<div class="wrapper" id="page-seller-details-wrapper">
	<?php /**
	* Seller details Module
	* Pass specific Data into Seller details page header
	* @param string:backgr Cover Image i.E '../../sebra1-com-seller-3984848-cover.png'
	* @param string:avatar Seller-Type Avatar url i.E '../../logo-bmw.png'
	* @param string:cTitle Shows crypted Title (First Type of org name + UserID)
	* @param bool:verified true: Shows verified Logo
	* @param string:info Short Description who can seller define
	* @param string:payment-range € - pay less €€ pay moderate €€€ pays more then normal
	*/
	get_template_part( 'page-templates/seller-header', null, array(
		'id' => 'modal-profile',
		'class' => 'container',
		'data'  => array(
			'backgr' => 'http://lorempixel.com/1200/300',
			'avatar' => 'http://lorempixel.com/64/64',
			'cTitle' => 'Car254',
			'verified' => true,
			'info' => 'Gute Bezahlung & schnelle Abwicklung',
			'payment-range' => '€€€',
		))
	);
	?>

	<div class="container-fluid">
		<div class="row mt-0" tabindex="-1">
			<!-- Get the Filter Sidebar -->
			<main class="col-12 py-2 bg-light overflow-auto" id="page-seller-details-wrapper-content">
				<?php get_template_part( 'system-templates/content', 'seller-details' ); ?>
			</main><!-- #main -->
		</div><!-- #content -->
	</div>

</div><!-- #page-wrapper -->

<?php
get_footer();
