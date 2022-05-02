<?php
/**
 * Partial template for User Profile Edit
 *
 * @package SebraOne
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $current_user; 
wp_get_current_user();
$name = $current_user->display_name;
global $wp_roles;
$u = get_userdata($current_user->ID);
$role = array_shift($u->roles);
?>
<div id="profileInfoBox" class="card mt-3 mb-4">
	<h5 class="card-header">Herzlich Willkommen auf den Profil Optionen</h5>
	<div class="card-body">
		<h5 class="card-title">Dank der Funktionen auf dieser Seite können Sie Ihre persönlichen Daten sowie Ihre
			Lieblingsfahrzeugmarken angeben und abspeichern.</h5>
		<p class="card-text"><b>Wir entwickeln derzeit eine Funktionalität damit Sie in Zukunft auch Benachrichtigungen
				via SMS erhalten können.</b></p>
		<a href="#" id="profileInfoBoxReadedBtn" class="btn btn-primary">Okay, verstanden</a>
	</div>
</div>

<div id="profile-edit-wrapper">
	<div class="container p-0 mt-5">
		<div id="signup-wrapper" class="m-0">
			<div class="col-12 card-columns">
				<div class="card">
					<div class="card-header">
						<b>Meine Daten</b>
					</div>
					<div class="card-body p-0 p-md-3">
						<!--ADVICE COMMENT-->
						<!-- Do not change #address. -->
						<!-- Do not change the following input names: new_user_street_number, new_user_zip_city. -->
						<form action="#" method="POST" name="masterdata-form" id="address" role="form" onsubmit="return getApiStatus()">
							<label class="sr-only"
								for="user-form"><?php esc_html_e( 'Edit master data', 'SebraOne' ); ?></label>
							<p class="register-message" style="display:none"></p>
							<div class="form-wrapper row">
								<div class="col-md col-12">
								<div class="input-field">
									<div class="icon-wrap">
										<i class="fa fa-user" aria-hidden="true"></i>
										<input name="new_user_name" type="text" id="new-username" value=""
											placeholder="<?php echo $current_user->role = $wp_roles->roles[$role]['name']; ?>-<?php echo get_current_user_id(); ?>" disabled/>
									</div>
								</div>
								<div class="input-field">
									<div class="icon-wrap">
										<i class="fa fa-eye-slash" aria-hidden="true"></i>
										<input name="new_user_name" type="text" id="new-username-hidden" value=""
											placeholder="<?php echo $name ?> (versteckt)" disabled/>
									</div>
								</div>
								<div class="input-field">
									<div class="icon-wrap">
										<i class="fas fa-home" aria-hidden="true"></i>
										<input name="new_user_street_number" type="text" id="new-street-number" value=""
											placeholder="Straße & Hausnummer" />
									</div>
								</div>
								</div>
								<div class="col-md col-12">
								<div class="input-field">
									<div class="icon-wrap">
										<i class="fas fa-city" aria-hidden="true"></i>
										<input name="new_user_zip_city" type="text" id="new-zip-city" value=""
											placeholder="PLZ & Ort" />
									</div>
								</div>
								<div class="input-field">
									<div class="icon-wrap">
										<i class="fas fa-phone-alt" aria-hidden="true"></i>
										<input name="new_user_phone" type="tel" id="new-phone" value=""
											placeholder="Telefon / Mobil" />
									</div>
								</div>
								<div class="input-field">
									<div class="icon-wrap">
										<i class="fa fa-star" aria-hidden="true"></i>
										<input name="user_role" type="text" id="user-role" value="" disabled
											placeholder="<?php echo $current_user->role = $wp_roles->roles[$role]['name']; ?>" />
									</div>
								</div>
								</div>
								<div class="input-field fifth-wrap col-12">
									<!--ADVICE COMMENT-->
									<!-- Do not change #masterdata-button. -->
									<button id="masterdata-button" class="btn btn-signup bg-primary btn-masterdata" type="submit">
										<i class="fa fa-check pr-2" aria-hidden="true"></i>Stammdaten
										ändern</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="card-no card">
					<div class="card-header">
						<b>Beliebte Marken</b>
					</div>
					<div id="form-settings" class="card-body p-0 p-md-3">
						<!--ADVICE COMMENT-->
						<!-- Distribute the following values to all checkboxes: name='brand[]', value="{brand}" according to the pattern input[name='brand[]'][value='"+brand+"']. -->
						<form action="#" method="POST" name="carbrand-form" role="form">
							<label class="sr-only"
								for="user-form"><?php esc_html_e( 'Settings', 'SebraOne' ); ?></label>
							<p class="register-message" style="display:none"></p>
							<div class="row">
								<?php echo do_shortcode( '[brand-list count="9"]' ); ?>
								<div class="col-12 form-wrapper">
									<div class="input-group fifth-wrap">
										<!--ADVICE COMMENT-->
										<!-- Do not change #settings-button. -->
										<button id="settings-button" class="btn btn-signup bg-primary" type="submit">
											<i class="fa fa-check pr-2" aria-hidden="true"></i>Einstellungen
											ändern</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="card card-no">
					<div class="card-header" data-toggle="collapse" href="#collapseOtherCarbrands" role="button"
						aria-expanded="false" aria-controls="collapseOtherCarbrands">
						<b>Andere Marken</b>
						<a id="other-carbrand-types" class="pull-right-arrow" data-toggle="collapse" href="#test-block"
							aria-expanded="true" aria-controls="test-block">
							<div id="carbrand-arrow">
								<i class="fas fa-chevron-down"></i>
							</div>
						</a>
					</div>
					<div class="collapse" id="collapseOtherCarbrands">
						<div id="form-settings" class="card-body p-0 p-md-3">
							<form action="#" method="POST" name="masterdata-form" role="form">
								<label class="sr-only"
									for="user-form"><?php esc_html_e( 'Notification-Settings', 'SebraOne' ); ?></label>
								<p class="register-message" style="display:none"></p>
								<div class="row">
									<?php echo do_shortcode( '[brand-list offset="9"]' ); ?>
									<div class="col-12 form-wrapper">
										<div class="input-group fifth-wrap">
											<!--ADVICE COMMENT-->
											<!-- Do not change #settings-button. -->
											<button id="settings-button" class="btn btn-signup bg-primary"
												type="submit">
												<i class="fa fa-check pr-2" aria-hidden="true"></i>Einstellungen
												ändern</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<b>Fahrzeuge Filter</b>
					</div>
					<div id="form-settings" class="card-body p-0 p-md-3">
						<form action="#" method="POST" name="masterdata-form" id="filter" role="form">

							<div class="row">
								<div class="col-md-6 form-wrapper">
									<div class="input-field">
										<div class="icon-wrap">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<input name="year" type="number" maxlength="4" id="car-build-year" value=""
												placeholder="Baujahr">
										</div>
									</div>
								</div>

								<div class="col-md-6 form-wrapper">
									<div class="input-field">
										<div class="icon-wrap">
											<i class="fa fa-tachometer-alt" aria-hidden="true"></i>
											<input name="kilometers" type="number" maxlength="7" id="car-kilometers"
												value="" placeholder="Kilometerstand">
										</div>
									</div>
								</div>

								<div class="col-12 form-wrapper">
									<div class="input-group fifth-wrap">
										<!--ADVICE COMMENT-->
										<!-- Do not change #masterdata-button. -->
										<button id="masterdata-button" class="btn btn-signup bg-primary" type="submit">
											<i class="fa fa-check pr-2" aria-hidden="true"></i>Filter
											ändern</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div id="notification-settings" class="card">
					<div class="card-header">
						<b>Benachrichtigungen</b>
					</div>
					<div id="form-settings" class="card-body p-0 p-md-3">
						<form action="#" method="POST" name="masterdata-form" role="form">
							<label class="sr-only"
								for="user-form"><?php esc_html_e( 'Notification-Settings', 'SebraOne' ); ?></label>
							<p class="register-message" style="display:none"></p>
							<div class="row">
								<div class="col-md-6 form-wrapper">
									<div class="input-group">
										<input type="checkbox" id="notification-checkbox-option1"
											aria-label="Checkbox for following text input" checked>
										<label for="notification-checkbox-option1">Nachrichten via E-Mail</label>
									</div>
								</div>
								<div class="col-md-6 form-wrapper">
									<div class="input-group">
										<input type="checkbox" id="notification-checkbox-option2"
											aria-label="Checkbox for following text input" disabled>
										<label for="notification-checkbox-option2">Nachrichten via SMS</label>
									</div>
								</div>
								<div class="col-12 form-wrapper">
									<div class="input-group fifth-wrap">
										<!--ADVICE COMMENT-->
										<!-- Do not change #settings-button. -->
										<button id="settings-button" class="btn btn-signup bg-primary" type="submit">
											<i class="fa fa-check pr-2" aria-hidden="true"></i>Benachrichtigungen
											ändern</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(function ($) {
			var url = document.location.toString();
			if (url.match('#notifications-settings')) {
				$('#main.carousel').carousel(1);
			}
		});

		jQuery(function ($) {
			$(".card-header[data-toggle='collapse']").on("click", function () {
				$("#carbrand-arrow").toggleClass('chevron-rotate', '');
			});
		});

		jQuery(function ($) {
			/* Activate bootstrap tooltip */
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			});

			/* Save/check status of profile functions infobox in localstorge */
			$(function () {
				if (localStorage.getItem('readedProfilChangeInfos') == null) {
					localStorage.setItem('readedProfilChangeInfos', 'false'); //store a key/value
					$('#profileInfoBox').show();
				}

				let chatRulesBool = localStorage.getItem('readedProfilChangeInfos');

				if (chatRulesBool == 'true') {
					$('#profileInfoBox').hide();
				}

				$('#profileInfoBoxReadedBtn').on('click', function () {
					localStorage.setItem('readedProfilChangeInfos', 'true');
					$('#profileInfoBox').hide();
				});
			});
		});
	</script>

	<script>
	jQuery(function($) {
		let toasterXmlHttpReq = new XMLHttpRequest();

		function getApiStatus() {
			toasterXmlHttpReq.open('GET', wp_deal.url, true);
			
			if (toasterXmlHttpReq.status >= 200 && toasterXmlHttpReq.status < 400) {
				let dataAnfrage = JSON.parse(toasterXmlHttpReq.responseText);
				alert(dataAnfrage);
			};
		};
	});
	</script>

	<div id="profile-edit-content" class="container m-0 pt-3 pb-3 vw-100">
		<div class="card">
			<div class="card-body p-0 p-md-3">
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhfgFGniLuaniNprEgBFbR8wjRkpNeSPk&callback=initMap&libraries=&v=weekly"
	async></script>
