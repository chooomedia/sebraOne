<?php
/**
 * Partial template for carbrand logos
 *
 * @package SebraOne
 */
?>

<div class="row align-items-center">
<?php 
$images = get_sub_field('carbrandsArray');
if( $images ): ?>
    <?php foreach( $images as $image ): ?>
	<div class="col-md-3 col-6 my-5">
		<a href="<?php echo $image['url']; ?>">
            <img style="filter:greyscale(1);" loading="lazy" class="img-fluid img-brand d-block mx-auto" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
		</a>
	</div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
