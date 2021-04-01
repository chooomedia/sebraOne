<?php
/**
 * Partial template for register
 *
 * @package SebraOne
 */

global $current_user;
get_currentuserinfo();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];

if (($firstname != '') && ($lastname != '') && ($company != '')) {
    // TODO: Do more rigorous validation on the submitted data

    // TODO: Generate a better login (or ask the user for it)
    $login = $firstname . $lastname;

    // TODO: Generate a better password (or ask the user for it)
    $password = '123';

    // TODO: Ask the user for an e-mail address
    $email = 'test@example.com';

    // Create the WordPress User object with the basic required information
    $user_id = wp_create_user($login, $password, $email);

    if (!$user_id || is_wp_error($user_id)) {
        // TODO: Display an error message and don't proceed.
    }
    
    $userinfo = array(
        'ID' => $user_id,
        'first_name' => $firstname,
        'last_name' => $lastname,
    );

    // Update the WordPress User object with first and last name.
    wp_update_user($userinfo);

    // Add the company as user metadata
    update_usermeta($user_id, 'company', $company);
}

if (is_user_logged_in()) : ?>

<div id="signup-wrapper" class="mb-5">
	<p>Gut gemacht - Es wurde schon ein Benutzerkonto erstellt.</p>
	<p><?php the_content() ?></p>
</div>

<?php else : while (have_posts()) : the_post(); ?>
<div id="signup-wrapper" class="mb-5">
	<div class="col-md-6">
		<div class="card shadow-lg bg-light">
			<div class="card-body">
				<h3 class="card-title"><b>Kostenlos registrieren</b></h3>
				<h6 class="card-subtitle mb-2 text-muted mb-3">praktische Funktionen freischalten</h6>
				<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" name="user-form" role="signup">
					<label class="sr-only" for="user-form"><?php esc_html_e( 'Register', 'SebraOne' ); ?></label>
					<div class="form-wrapper">
						<div class="input-field">
							<div class="icon-wrap">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input name="firstname" type="text" id="firstname"
									value="<?php echo esc_attr($firstname) ?>"" placeholder=" Vorname *" required />
							</div>
						</div>
						<div class="input-field">
							<div class="icon-wrap">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input name="lastname" type="text" id="lastname"
									value="<?php echo esc_attr($lastname)?>" placeholder="Nachname *" required />
							</div>
						</div>
						<div class="input-field">
							<div class="icon-wrap">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input name="company" type="email" id="mail" value="<?php echo esc_attr($company)?>"
									placeholder="E-Mail *" required />
							</div>
						</div>
						<div class="input-field fifth-wrap">
							<button class="btn btn-signup bg-primary" type="submit">
								<i class="fa fa-check pr-2" aria-hidden="true"></i>Jetzt registrieren</button>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title"><b>Dein Benutzerprofil</b></h3>
			<h6 class="card-subtitle mb-2 text-muted mb-3">Verkäufe und Abläufe auf einen Blick</h6>
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
			<a href="#" class="font-weight-light"><u>Ohne Registrierung als Gast fortfahren</u></a>
		</div>
	</div>
</div>
</div>

<?php endwhile; endif; ?>
