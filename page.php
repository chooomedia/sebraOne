<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'SebraOne_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->
	

	

	<!-- Faqs -->
	<?php if( have_rows('sectionfaqs') ): ?>
	<section id="landingpage-faqs" class="mvh-100 page-section bg-darker">
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
	</section>
	<?php endif; ?>

</div><!-- #page-wrapper -->

<?php
get_footer();
