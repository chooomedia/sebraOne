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
