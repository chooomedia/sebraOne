<?php
/**
 * Single post partial template
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="col-md-8 entry-header mx-md-auto pt-md-5 pt-5 text-center">

		<?php the_title( '<b><h1 class="entry-title">', '</h1></b>' ); ?>

		<div class="entry-meta mb-3">

			<?php SebraOne_posted_on(); ?>

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="container-fluid mx-md-auto">
		<div id="single-excerpt" class="col-md-8 mx-md-auto text-justify">
			<?php the_excerpt(); ?>
		</div>
		<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
	</div>

	<div class="container col-md-8 entry-content">

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

	<footer class="col-md-8 mx-md-auto entry-footer">

		<?php SebraOne_entry_footer(); ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
