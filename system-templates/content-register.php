<?php
/**
 * Partial template for register
 *
 * @package SebraOne
 */

global $current_user;
wp_get_current_user();
if (is_user_logged_in()) : ?>

<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'system-templates/content', 'profile' );
	}
?>

<?php else : while (have_posts()) : the_post(); ?>

<div id="signup" class="container px-0 pt-3">
	<div id="signup-wrapper" class="row mb-5 flex-sm-row-reverse">
		<div class="col-md-6">


			<div class="card mt-3 tab-card shadow-lg">
				<div class="card-header tab-card-header">
					<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab"
								aria-controls="One" aria-selected="true">Einloggen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
								aria-controls="Two" aria-selected="false">Registrieren</a>
						</li>
					</ul>
				</div>

				<div class="tab-content" id="accountContentTabs">
					<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
						<div class="card-text">
							<form id="login" action="login" method="post" name="user-form" role="form">
								<label class="sr-only"
									for="user-form"><?php esc_html_e( 'login', 'SebraOne' ); ?></label>
								<p class="status login-message" style="display:none;"></p>
								<div class="form-wrapper">
									<div class="input-field">
										<div class="icon-form-wrapper">
											<i class="fa fa-user" aria-hidden="true"></i>
											<input name="username" type="text" id="username" size="20"
												placeholder=" Benutzername oder E-Mail-Adresse"/>
										</div>
									</div>
									<div class="input-field">
										<div class="icon-wrap login-password">
											<i class="fa fa-key" aria-hidden="true"></i>
											<input name="password" type="password" id="password"
												placeholder="Passwort"/>
										</div>
									</div>
									<div class="row d-flex">
									<p class="col-6 login-remember">
										<input name="rememberme" type="checkbox" id="rememberme" value="forever">
										Angemeldet bleiben</label>
									</p>
									<p class="col-6 lost-password text-right">
										<a class="lost" href="<?php echo wp_lostpassword_url(); ?>"
											target="_blank">Passwort vergessen?</a>
									</p>
									</div>
									<div class="input-field fifth-wrap login-submit">
										<button class="btn btn-signup bg-primary submit_button" type="submit" name="submit">
											<i class="fa fa-user pr-2" aria-hidden="true"></i>Jetzt
											einloggen</button>
									</div>
									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
								</div>
							</div>

					</div>
					<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
						<div class="card-text">
							<form id="register-form" action="#" method="post" name="register-form" role="form">
								<label class="sr-only"
									for="user-form"><?php esc_html_e( 'Register', 'SebraOne' ); ?></label>
								<p class="register-message" style="display:none"></p>
								<div class="form-wrapper">
									<div class="input-field">
										<div class="icon-wrap login-username">
											<i class="fa fa-user" aria-hidden="true"></i>
											<input name="new_user_name" type="text" id="new-username" value=""
												placeholder=" Benutzername *" size="20" />
										</div>
									</div>
									<div class="input-field">
										<div class="icon-wrap">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<input name="new_user_email" type="email" id="new-useremail" value=""
												placeholder="E-Mail *" />
										</div>
									</div>
									<div class="input-field">
										<div class="icon-wrap">
											<i class="fa fa-key" aria-hidden="true"></i>
											<input name="new_user_password" type="password" id="new-userpassword"
												value="" placeholder="Passwort *" />
										</div>
									</div>
									<div class="input-field">
										<div class="icon-wrap">
											<i class="fa fa-key" aria-hidden="true"></i>
											<input name="re_pwd" type="password" id="re-pwd" value=""
												placeholder="Passwort Bestätigung *" />
										</div>
									</div>
									<div class="input-field fifth-wrap">
										<button id="register-button" class="btn btn-signup bg-primary" type="submit">
											<i class="fa fa-check pr-2" aria-hidden="true"></i>Jetzt
											registrieren</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card bg-light">
			<div class="card-body">
				<h3 class="card-title"><b>Eröffne jetzt dein Benutzerprofil</b></h3>
				<h6 class="card-subtitle mb-2 text-muted mb-3">praktische Funktionen freischalten</h6>
				<p class="card-text">
					<ul class="fa-ul">
						<li><span class="fa-li"><i class="fa fa-check"></i></span>Über dein Profil kannst
							praktische Informationen einsehen und somit wir der Verkaufsprozess optimiert</li>
						<li><span class="fa-li"><i class="fa fa-check"></i></span>Du erhälst Benachrichtigungen
							um auf dem aktuellen Stand zu bleiben und kannst diese über dein Profil anpassen</li>
						<li><span class="fa-li"><i class="fa fa-check"></i></span>Du hast die Möglichkeit an
							spanndenen Aktionen teilzunehmen</li>
					</ul>
				</p>
			</div>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>

<!-- Register Validation -->
<script type="text/javascript">
	jQuery('#register-button').on('click', function (e) {
		e.preventDefault();
		var newUserName = jQuery('#new-username').val();
		var newUserEmail = jQuery('#new-useremail').val();
		var newUserPassword = jQuery('#new-userpassword').val();
		jQuery.ajax({
			type: "POST",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data: {
				action: "register_user_front_end",
				new_user_name: newUserName,
				new_user_email: newUserEmail,
				new_user_password: newUserPassword
			},
			success: function (results) {
				console.log(results);
				jQuery('.register-message').text(results).show();
			},
			error: function (results) {
				jQuery(".form-wrapper .card-text").addClass('ahashakeheartache');
			}
		});
	});
</script>