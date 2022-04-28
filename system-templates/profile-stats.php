<?php
/**
 * Partial template for Profile Stats
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $statsAppoint = $args['data']['appoints'];
    $statsRequest = $args['data']['requests'];
    $statsPayed = $args['data']['payments'];
    $statsCompleted = $args['data']['completed'];
}
?>

<div id="profile-stats" class="row mb-1">
	<div class="col-md-3 col-sm-12 pl-lg-0 pr-lg-2 mb-3">
		<div class="card p-4 bg-danger text-white rounded">
			<div class="card-body p-0">
				<div>
					<h3 class="card-title mb-0"><?php echo $statsAppoint ?></h3>
					<p class="mb-0">Termine</p>
				</div>
				<i class="fas fa-3x fa-calendar-day mt-md-2" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 pl-lg-2 pr-lg-2 mb-3">
		<div class="card p-4 bg-danger text-white rounded" style="opacity:.85;">
			<div class="card-body p-0">
				<div>
					<h3 class="card-title mb-0"><?php echo $statsRequest ?></h3>
					<p class="mb-0">Anfragen</p>
				</div>
				<i class="fa fa-3x fa-calendar mt-md-2" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 pl-lg-2 pr-lg-2 mb-3">
		<div class="card p-4 bg-danger text-white rounded" style="opacity:.75;">
			<div class="card-body p-0">
				<div>
					<h3 class="card-title mb-0"><?php echo $statsPayed ?></h3>
					<p class="mb-0">Zahlungen</p>
				</div>
				<i class="fas fa-3x fa-money-bill-wave mt-md-2" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 pl-lg-2 pr-lg-0 mb-3">
		<div class="card p-4 bg-danger text-white rounded" style="opacity:.7;">
			<div class="card-body p-0">
				<div>
					<h3 class="card-title mb-0"><?php echo $statsCompleted ?></h3>
					<p class="mb-0">Abschlüsse</p>
				</div>
				<i class="far fa-3x fa-handshake mt-md-2" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</div>
