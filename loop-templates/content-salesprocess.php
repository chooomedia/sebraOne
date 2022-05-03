<?php
/**
 * Partial template for sales process
 *
 * @package SebraOne
 */
?>

<div class="row d-flex justify-content-center">
<?php if( have_rows('sellsArray') ): $c = 0; $class = ''; ?>
	<?php while( have_rows('sellsArray') ) : the_row(); ?>
	<?php $c++; ?>
	<div class="col-lg-2 col-md-2 col-sm-6 mb-4 <?php if (($c == 2 ) || ($c == 4 )) : ?>transform-minus-top<?php endif; ?> box-shadow-lg p-0 mb-5">
		<!-- Portfolio item 1-->
		<div class="portfolio-item text-center">
			<div class="card border-0">
				<img style="filter:grayscale(1);" class="card-img-top pb-4" src="<?php the_sub_field('sells_image'); ?>" alt="sales_process_step_<?php echo $c ?>"> <!-- https://via.placeholder.com/320x220 -->
				<ul class="list-group list-group-flush">
					<div class="rounded-circle bg-white box-shadow">
						<div class="text-accent step-number"><b><?php echo $c ?></b></div>
					</div>
				</ul>
				<div class="card-body">
					<h5 class="card-title"><?php the_sub_field('sells_headline'); ?></h5>
					<p class="card-text"><?php the_sub_field('sells_text'); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="step-arrow step-<?php echo $c ?> col-md-1 d-md-flex justify-content-center d-none"
		style="background: url('<?php echo get_stylesheet_directory_uri() ?>/src/img/step-arrow-right.png');"></div>
    <?php endwhile; ?>
	<?php endif; ?>
    <style>
    .step-4 {
        display: none!important;
    }
	.step-3 {
		transform: scale(.5) translateY(280px) rotate(26deg);
	}
    </style>
</div>