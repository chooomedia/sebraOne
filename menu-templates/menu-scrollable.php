<?php
/**
 * Partial template for scrollable menu
 *
 * @package SebraOne
 */
?>

<div id="search-results-nav" class="explore-head">
	<div class="explore-types" style="position: relative;">
		<div class="type-seller item">
			<a>
				<div class="type-info">
					<i class="fas fa-user mr-2" aria-hidden="true"></i>
					<h4>Einzel-Händler</h4>
				</div>
			</a>
		</div>

		<div class="type-bigseller item">
			<a>
				<div class="type-info">
					<i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
					<h4>Händler</h4>
				</div>
			</a>
		</div>

		<div class="type-carretailer item">
			<a>
				<div class="type-info">
					<i class="fa fa-car mr-2" aria-hidden="true"></i>
					<h4>Autohaus</h4>
				</div>
			</a>
		</div>

		<div class="cts-prev d-lg-none">prev</div>
		<div class="cts-next cts-show d-lg-none">next</div>

		<div dir="ltr" class="resize-sensor">
			<div class="resize-sensor-expand">
				<div
					style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;">
				</div>
			</div>
			<div class="resize-sensor-shrink">
				<div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
				</div>
			</div>
		</div>
	</div>
</div>
