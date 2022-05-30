<?php
/**
 * Partial template for content in page.php
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'SebraOne' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'SebraOne' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<!-- Sell car steps -->
<div id="page-landingpage-wrapper">
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
</div>