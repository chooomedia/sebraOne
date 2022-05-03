<?php
/**
 * Partial template for carbrand logos
 *
 * @package SebraOne
 */
?>

<div class="row align-items-center">
<?php if( have_rows('carbrandsArray') ): ?>
    <?php while( have_rows('carbrandsArray') ) : the_row(); ?>
	<div class="col-md-3 col-6 my-3">
		<a href="#">
			<img loading="lazy" class="img-fluid img-brand d-block mx-auto" src="<?php the_sub_field('carbrandsArray_image') ?>" alt="" />
		</a>
	</div>
    <?php endwhile; ?>
<?php endif; ?>
</div>
