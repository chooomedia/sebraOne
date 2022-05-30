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

<?php if( have_rows('sectionfaqs') ): ?>
<!-- FAQs --> 
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