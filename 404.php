<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'SebraOne_container_type' );
?>

<div class="wrapper text-center" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main container" id="main">

					<section class="error-404 not-found my-5">

						<header class="page-header">

							<h2 class="page-title"><b><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'SebraOne' ); ?></b></h2>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'SebraOne' ); ?></p>

							<div id="search-search">
								<?php get_search_form(array('formId' => 'searchform-search')); ?>
							</div>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
