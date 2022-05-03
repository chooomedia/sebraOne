<?php
/**
 * Partial template for Login
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
		<div class="col-md-12">
			<div class="card shadow-lg bg-light">
				<div class="card-body">
					<h3 class="card-title"><b>Login</b></h3>
					<h6 class="card-subtitle mb-2 text-muted mb-3">Anmeldedaten eingeben</h6>
					<form action="#" method="POST" name="login-form" role="form">
						<label class="sr-only" for="user-form"><?php esc_html_e( 'Login', 'SebraOne' ); ?></label>
						<p class="login-message" style="display:none"></p>
						<div class="form-wrapper">
							<div class="input-field">
								<div class="icon-wrap">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<input name="new_user_email" type="email" id="useremail" value=""
										placeholder="E-Mail" />
								</div>
							</div>
							<div class="input-field">
								<div class="icon-wrap">
									<i class="fa fa-key" aria-hidden="true"></i>
									<input name="new_user_password" type="password" id="userpassword" value=""
										placeholder="Passwort *" />
								</div>
							</div>
							<div class="input-field fifth-wrap">
								<button id="register-button" class="btn btn-signup bg-primary" type="submit">
									<i class="fa fa-check pr-2" aria-hidden="true"></i>Login</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>

<script type="text/javascript">
	jQuery('#register-button').on('click', function (e) {
		e.preventDefault();
		var newUserEmail = jQuery('#useremail').val();
		var newUserPassword = jQuery('#userpassword').val();
		jQuery.ajax({
			type: "POST",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data: {
				action: "register_user_front_end",
				new_user_email: newUserEmail,
				new_user_password: newUserPassword
			},
			success: function (results) {
				console.log(results);
				jQuery('.register-message').text(results).show();
			},
			error: function (results) {
				jQuery(".card-body").addClass('ahashakeheartache');
			}
		});
	});
</script>
