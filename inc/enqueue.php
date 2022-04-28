<?php
/**
 * SebraOne enqueue scripts
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'SebraOne_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function SebraOne_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'SebraOne-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		$header_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'SebraOne-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		wp_enqueue_script( 'Header', get_template_directory_uri() . '/js/header.js', array(), $header_js_version, true );
		wp_enqueue_script( 'custom-ajax-logout', get_stylesheet_directory_uri() . '/js/ajax-login-script.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'SebraOne-fontawesome-5', 'https://use.fontawesome.com/releases/v5.15.3/js/all.js', array(), $js_version, true );
		wp_enqueue_script( 'SebraOne-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), $js_version, true );
		wp_enqueue_script( 'SebraOne-jquery-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), $js_version, true );
		wp_enqueue_script( 'SebraOne-form-validator', get_template_directory_uri() . '/js/validator.js', array(), $js_version, true );
		wp_enqueue_script( 'SebraOne-form-select-dropdown', get_template_directory_uri() . '/js/select.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'SebraOne_scripts' ).

add_action( 'wp_enqueue_scripts', 'SebraOne_scripts' );


// Ajax User Login Script
function ajax_login_init(){
    wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => '/account',
        'loadingmessage' => __('Daten werden verarbeitet...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('* Benutzername oder Passwort falsch')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Erfolgreicher Login, Weiterleitung...')));
    }
    die();
}

/** Set up the Ajax Logout */
if (is_admin()) {
    // We only need to setup ajax action in admin.
    add_action('wp_ajax_custom_ajax_logout', 'custom_ajax_logout_func');
} else {
    wp_enqueue_script('custom-ajax-logout', get_stylesheet_directory_uri() . '/js/ajax-login-script.js', array('jquery'), '1.0', true );
    wp_localize_script('custom-ajax-logout', 'ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'home_url' => get_home_url(),
            'logout_nonce' => wp_create_nonce('ajax-logout-nonce'),
        )
    );
}
function custom_ajax_logout_func(){
    check_ajax_referer( 'ajax-logout-nonce', 'ajaxsecurity' );
    wp_logout();
    ob_clean(); // probably overkill for this, but good habit
    wp_send_json_success();
}
