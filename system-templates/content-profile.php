<?php
/**
 * Partial template for User Profile
 *
 * @package SebraOne
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $current_user; wp_get_current_user();
$pageTitle = get_the_title();?>


<div id="profileDashboardInfo" class="card mt-3 mb-4">
	<h5 class="card-header">Herzlich Willkommen auf dem Dashbord</h5>
	<div class="card-body">
		<h5 class="card-title">Mithilfe des Dashboards können Sie Ihre Anfragen in der praktischen Übersicht einsehen.</h5>
		<p class="card-text">
			<b>Wenn Sie einmal für einen Zeitraum keine Anfragen mehr erhalten möchten, klicken Sie auf den "Sichtbar" Button und deaktivieren Sie vorübergehend Ihren Account.</b>
		</p>
		<a href="#" id="profileDashboardInfoBtn" class="btn btn-primary">Okay, verstanden</a>
	</div>
</div>
<div id="profile-wrapper">

	<div id="profile-header" class="py-0 px-4 px-md-0 mb-sm-4 mb-lg-0">
		<!--ADVICE COMMENT-->
		<p id="profile-switch" class="mr-2 my-0">
		</p>
		<!-- Do not change #profile-active. -->
		<label class="switch" aria-label="toggle">
		<input id="profile-active" type="checkbox" name="profile_active">
		<span class="slider rounded"></span>
		</label>
	</div>

	<?php
		/**
		* Profile Stats
		* Pass specific Data into the Statistics Bar on user and seller profile
		* @param appoints String: Shows how many appointments have been booked
		* @param requests String: Shows how many requests have been made
		* @param payments String: Shows how many payments have been made
		* @param completed String: Shows how many operations have been completed
		*/
		get_template_part( 'system-templates/profile-stats', null, array(
		'id' => 'profile-stats',
		'class' => 'row mb-1',
		'data'  => array(
			'appoints' => '12',
			'requests' => '3',
			'payments' => '2',
			'completed' => '8',
			'demo' => true
			))
		);
	?>

	<div id="charts-section" class="row mb-1">
		<div class="col-md-6 pl-lg-0 pr-lg-2 mb-3">
			<div class="card">
				<div class="card-body">
					<canvas id="chLine"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 pl-lg-2 pr-lg-0 mb-3">
			<div class="card">
				<div class="card-body">
					<canvas id="chBar"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container p-sm-0 mb-4 mt-1">
	<div class="col-12 p-0">
		<div class="card">
			<div class="card-body">
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>

<script>
jQuery(function($) {
$('#profile-switch').text('Sichtbar');
const profileSwitchEl = $('#profile-active[type="checkbox"]');

profileSwitchEl.on('click', function() {
	if($(this).prop("checked") == true) {
		$('#profile-switch').text('Sichtbar');
		$(this).val('active');
	}
	else if($(this).prop("checked") == false) {
		$('#profile-switch').text('Unsichtbar');
		$(this).val('');
	}
	});
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script>
	/* chart.js chart examples */

	// chart colors
	var colors = ['#08a9e8', '#000', '#ccc', '#333', '#222', '#dc3545'];

	/* large line chart */
	var chLine = document.getElementById("chLine");
	var chartData = {
		labels: ["S", "M", "T", "W", "T", "F", "S"],
		datasets: [{
				data: [589, 445, 483, 503, 689, 692, 634],
				backgroundColor: 'transparent',
				borderColor: colors[0],
				borderWidth: 4,
				pointBackgroundColor: colors[0]
			}
			//   {
			//     data: [639, 465, 493, 478, 589, 632, 674],
			//     backgroundColor: colors[3],
			//     borderColor: colors[1],
			//     borderWidth: 4,
			//     pointBackgroundColor: colors[1]
			//   }
		]
	};
	if (chLine) {
		new Chart(chLine, {
			type: 'line',
			data: chartData,
			options: {
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero: false
						}
					}]
				},
				legend: {
					display: false
				},
				responsive: true
			}
		});
	}

	/* bar chart */
	var chBar = document.getElementById("chBar");
	if (chBar) {
		new Chart(chBar, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S"],
				datasets: [{
						data: [589, 445, 483, 503, 689, 692, 634],
						backgroundColor: colors[0]
					},
					{
						data: [639, 465, 493, 478, 589, 632, 674],
						backgroundColor: colors[1]
					}
				]
			},
			options: {
				legend: {
					display: false
				},
				scales: {
					xAxes: [{
						barPercentage: 0.4,
						categoryPercentage: 0.5
					}]
				}
			}
		});
	}
</script>
<script>
jQuery(function($) {
	/* Save/check status of profile functions infobox in localstorge */
	$(function () {
			if (localStorage.getItem('readedDashboardInfos') == null) {
				localStorage.setItem('readedDashboardInfos', 'false'); //store a key/value
				$('#profileDashboardInfo').show();
			}

			let chatRulesBool = localStorage.getItem('readedDashboardInfos');

			if (chatRulesBool == 'true') {
				$('#profileDashboardInfo').hide();
			}

			$('#profileDashboardInfoBtn').on('click', function () {
				localStorage.setItem('readedDashboardInfos', 'true');
				$('#profileDashboardInfo').hide();
			});
		});
});
</script>
