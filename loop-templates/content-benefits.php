<?php
/**
 * Partial template for benefits
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $benefitsClass = $args['class'];
}
?>
<?php if( have_rows('benefitsArray') ): $c = 0; $class = ''; ?>
<?php while( have_rows('benefitsArray') ) : the_row(); ?>
<div class="container">
	<div class="text-center">
		<h2 class="section-heading text-uppercase mt-md-0"><b><?php the_sub_field('headline') ?></b></h2>
		<!-- Welche Vorteile? -->
		<h3 class="section-subheading text-accent mb-5"><?php the_sub_field('subline') ?></h3>
		<!-- <b>Einfach & fair</b> den <b>besten Verkaufspreis</b> erhalten -->
	</div>
	<div class="<?php echo $benefitsClass ?>">
		<?php $c++; ?>
		<div class="col-md-4 px-md-3 py-md-0 my-3">
			<span class="negative-margin fa-stack fa-3x">
				<i class="<?php the_sub_field('benefits_icon') ?> fa-stack-2x text-primary"></i>
			</span>
			<div class="card px-0 mx-3 box-shadow-lg">
				<div class="card-header">
					<br>
					<h4><?php the_sub_field('benefits_headline') ?></h4>
				</div>
				<div class="card-body mb-0 border-0">
					<p class="text-muted"><?php the_sub_field('benefits_text') ?></p>
				</div>
			</div>
		</div>

	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
