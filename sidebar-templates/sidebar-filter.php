<?php
/**
 * Left sidebar Filter
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div id="finderSearchMobile">
	<div class="input-field">
		<div class="icon-wrap">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
		</div>
		<input id="filterSearchMobile" type="text" name="filterSearch" placeholder="Suche Händler...">
	</div>
</div>

<div id="finderSearch" class="finder-search min-scroll visible-lg mt-4 px-lg-2">
	<form method="get" name="filter-form" id="filter-form">
		<div class="inner-form">
<!--			<div class="input-field mb-4">-->
<!--				<div class="icon-wrap">-->
<!--					<i class="far fa-user" aria-hidden="true"></i>-->
<!--				</div>-->
<!--				<input id="filterSearch" type="text" name="filterSearch" placeholder="Händlersuche">-->
<!--			</div>-->
<!--			<div class="input-field mb-4">-->
<!--				<div class="icon-wrap">-->
<!--					<i class="fas fa-tag" aria-hidden="true"></i>-->
<!--				</div>-->
<!--				<input id="filterCategory" type="text" name="filterCategory" placeholder="Kategorie">-->
<!--			</div>-->
<!--			<div class="input-field mb-4">-->
<!--				<div class="icon-wrap">-->
<!--					<i class="fas fa-map-marked-alt" aria-hidden="true"></i>-->
<!--				</div>-->
<!--				<input id="filterRegion" type="text" name="filterZip" placeholder="PLZ">-->
<!--			</div>-->

			<div class="input-field mb-4">
				<div class="icon-wrap">
					<i class="fas fa-tag" aria-hidden="true"></i>
				</div>
				<input id="dealer_name" type="text" name="dealer_name" placeholder="Dealer">
			</div>

			<div class="input-field mb-4">
				<div class="icon-wrap">
					<i class="fas fa-tag" aria-hidden="true"></i>
				</div>
				<input id="customer_address" type="text" name="customer_address" placeholder="Address">
			</div>

			<!--ADVICE COMMENT-->
			<!-- Do not change #dealer_filter. -->
			<button id="dealer_filter" class="btn btn-search bg-primary text-white col-12 mb-2" type="submit">
				<i class="fa fa-search pr-2" aria-hidden="true"></i>Suchen
			</button>
			<button id="dealer_filter_reset" class="btn btn-search btn-outline-primary col-12 btn-outline" type="reset">
				<i class="fas fa-redo pr-2" aria-hidden="true"></i>Reset Filter
			</button>
		</div>
	</form>
</div>
