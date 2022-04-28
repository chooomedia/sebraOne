<?php
/**
 * SebraOne functions and definitions
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// SebraOne's includes directory.
$SebraOne_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$SebraOne_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/SebraOne/SebraOne/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$SebraOne_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$SebraOne_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $SebraOne_includes as $file ) {
	require_once $SebraOne_inc_dir . $file;
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Add Post Images
add_theme_support('post-thumbnails');

// Add User to Menu
add_filter( 'wp_nav_menu_items', 'sebraone_menu_items', 10, 2 );
function sebraone_menu_items($items, $args) {
    if(!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item"><a class="nav-link mx-lg-1" href="/account/">Einloggen oder Registrieren</a></li>';
    } elseif ( $args->theme_location == 'primary' ) {
		$user=wp_get_current_user();
        $name=$user->display_name; // or user_login , user_firstname, user_lastname
		$items .= '<li id="ex4" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="d-md-block d-none menu-item nav-item type-company item"><span class="p1 fa-stack has-badge" data-count="✓"><a class="nav-link mx-lg-1" role="button" data-target="#main" data-slide-to="2"><i class="p3 fas fa-comments fa-stack-1x xfa-inverse" data-count="4b"></i></a></span></li>';
        $items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-user" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-user nav-item">';
		$items .= '<a title="Usermenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-user">' . $name . '</a>';
		$items .= '<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-user" role="menu">';
		$items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-profil" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-profil nav-item"><a title="Profil" href="/account/" data-slide-to="2" class="dropdown-item">Profil</a></li>';
		$items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-logout" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-logout nav-item"><a title="Abmelden" href="#" class="logout dropdown-item">Abmelden</a></li>';
		$items .= '</ul>';
		$items .= '</li>';
        }
    return $items;
}

//Important Notes
// Pass fitting data-clount attribute in Unicode into injected Menu Element <li id="ex4" ....> <span class="p1 fa-stack has-badge" data-count="✓">

// Add Search to Header Nav
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items."<li class='d-none d-sm-block menu-header-search'><form action='/' id='searchform' method='get'><i style='width:28px;' class='fa fa-search pr-2 text-white' aria-hidden='true'></i><input type='text' name='s' id='search' placeholder='Finde einen Händler'></form></li>";

    return $items;
}

// Full Customize of the Login Page
//Replace style-login.css with the name of your custom CSS file
function sebraone_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/style-login.css' );
}

// This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'sebraone_login_stylesheet' );

// Ajax User Registration Script
add_action('wp_ajax_register_user_front_end', 'register_user_front_end', 0);
add_action('wp_ajax_nopriv_register_user_front_end', 'register_user_front_end');
function register_user_front_end() {
	  $new_user_name = stripcslashes($_POST['new_username']);
	  $new_user_email = stripcslashes($_POST['new_useremail']);
	  $new_user_password = $_POST['new_userpassword'];
	  $user_nice_name = strtolower($_POST['new_useremail']);
	  $user_data = array(
	      'user_login' => $new_user_name,
	      'user_email' => $new_user_email,
	      'user_pass' => $new_user_password,
	      'user_nicename' => $user_nice_name,
	      'display_name' => $new_user_first_name,
	      'role' => 'subscriber'
	  	);
	  $user_id = wp_insert_user($user_data);
	  	if (!is_wp_error($user_id)) {
	      echo 'Account erfolgreich erstellt';
	  	} else {
	    	if (isset($user_id->errors['empty_user_login'])) {
	          $notice_key = '* Benutzername und E-Mail bitte angeben';
	          echo $notice_key;
	      	} elseif (isset($user_id->errors['existing_user_login'])) {
	          echo'Das hat leider nicht funktionert.';
	      	} else {
	          echo'Es ist ein Fehler aufgetreten. Bitte füllen Sie das Anmeldeformular sorgfältig aus';
	      	}
	  	}
	die;
}

/*require_once( get_template_directory() . '/inc/custom-ajax-auth.php' );*/
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Landingpage',
            'title'             => __('Landingpage'),
            'description'       => __('A custom Landingpage block.'),
            'render_template'   => 'loop-templates/content-landingpage',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}