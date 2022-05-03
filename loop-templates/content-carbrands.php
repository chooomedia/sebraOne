<?php
/**
 * Partial template for carbrand logos
 *
 * @package SebraOne
 */
?>

<div class="row align-items-center">
<?php if( have_rows('carbrandsArray') ): $c = 0; $class = ''; ?>
    <?php while( have_rows('carbrandsArray') ) : the_row(); ?>
    <?php $carbrandsImage = the_field('carbrandsArray_image'); ?>
	<div class="col-md-3 col-6 my-3">
		<a href="#">
			<img loading="lazy" class="img-fluid img-brand d-block mx-auto" src="<?php echo $carbrandsImage['url'] ?>" alt="<?php echo $carbrandsImage['alt'] ?>" />
		</a>
	</div>
    <?php endwhile; ?>
<?php endif; ?>
</div>
