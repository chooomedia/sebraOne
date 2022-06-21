<?php
/**
 * Partial template for sales process
 *
 * @package SebraOne
 */
?>

<div id="scrolls-verticaly"  class="row" style="overflow-x: hidden;">
	<div class="row-scroll-x d-flex">
		<?php if( have_rows('sellsArray') ): $counter = 0; $class = ''; ?>
		<?php $stepsArray[] = get_sub_field('bus_type'); ?>

		<?php while( have_rows('sellsArray') ) : the_row(); ?>
		<?php $counter++; ?>
		<div
			class="salessteps-card col-lg-2 col-md-2 col-sm-6 mb-4 <?php if (($counter == 2 ) || ($counter == 4 )) : ?>transform-minus-top<?php endif; ?> box-shadow-lg p-0 mb-5">
			<!-- Portfolio item 1-->
			<div class="portfolio-item text-center">
				<div class="card border-0">
					<img style="filter:grayscale(1);" class="card-img-top" src="<?php the_sub_field('sells_image'); ?>"
						alt="sales_process_step_<?php echo $counter ?>"> <!-- https://via.placeholder.com/320x220 -->
					<ul class="list-group list-group-flush">
						<div style="z-index:1080;position:relative;" class="rounded-circle bg-white box-shadow">
							<div class="text-accent step-number"><b><?php echo $counter ?></b></div>
						</div>
					</ul>
					<div class="card-body">
						<h3 class="card-title"><b><?php the_sub_field('sells_headline'); ?></b></h3>
						<p class="card-text"><?php the_sub_field('sells_text'); ?></p>
					</div>
				</div>
			</div>
		</div>

		<?php if($counter >= 4) : ?>
       		<div id="endpoint" style="width:1px;height:1px;"></div>
		<?php endif; ?>

		<div class="step-arrow step-<?php echo $counter ?> col-md-1 d-md-flex justify-content-center"
			style="background: url('<?php echo get_stylesheet_directory_uri() ?>/src/img/step-arrow-right.png');"></div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<style>
	.step-4 {
		display: none !important;
	}

	.step-2 {
		transform: rotate(-27deg) scaleY(-1)!important;
	}
</style>

<script>
const scrollContainer = document.querySelector("#scrolls-verticaly");
const scrollContainerEndpointEl = document.querySelector("#endpoint"); 

const eventHandler = (evt) => {
    scrollContainer.scrollLeft += evt.deltaY;

	const scrollContainerEndPosition = scrollContainer.offsetLeft + scrollContainer.scrollLeft + scrollContainer.offsetWidth;
	//console.log('scrollpos:', scrollContainerEndPosition, 'endPos:', scrollContainerEndpointEl.offsetLeft, 'element:', scrollContainerEndpointEl);	
	
	if(scrollContainerEndPosition >= scrollContainerEndpointEl.offsetLeft) {
		//scrollContainer.removeEventListener("wheel", eventHandler);
	} else {
		evt.preventDefault();
	}
};

scrollContainer.addEventListener("wheel", eventHandler);


</script>
