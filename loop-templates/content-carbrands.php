<?php
/**
 * Partial template for carbrand logos
 *
 * @package SebraOne
 */
?>

<div class="row align-items-center">
<?php 
$images = get_field('carbrandsArray');
if( $images ): ?>
    <?php foreach( $images as $image ): ?>
    <?php $carbrandsImage = get_field('carbrandsArray'); ?>
	<div class="col-md-3 col-6 my-3">
		<a href="<?php echo $image['url']; ?>">
            <img loading="lazy" class="img-fluid img-brand d-block mx-auto" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		</a>
	</div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
