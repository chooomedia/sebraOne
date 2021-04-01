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

// Add User to Menu
add_filter( 'wp_nav_menu_items', 'my_custom_menu_item', 10, 2 );
function my_custom_menu_item($items, $args) {
    if(!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item"><a class="nav-link mx-lg-1" href="'. site_url('wp-login.php') .'">Einloggen oder Registrieren</a></li>';
    } elseif ( $args->theme_location == 'primary' ) {
		$user=wp_get_current_user();
        $name=$user->display_name; // or user_login , user_firstname, user_lastname
        $items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-user" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-user nav-item">';
		$items .= '<a title="Usermenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-user">' . $name . '</a>';
		$items .= '<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-user" role="menu">';
		$items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-profil" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-profil nav-item"><a title="Profil" href="#" class="dropdown-item">Profil</a></li>';
		$items .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-logout" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-logout nav-item"><a title="Abmelden" href="'. wp_logout_url() .'" class="dropdown-item">Abmelden</a></li>';
		$items .= '</ul>';
		$items .= '</li>';
        }
    return $items;
}


// Add Search to Header Nav
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items."<li class='d-none d-sm-block menu-header-search'><form action='/' id='searchform' method='get'><svg class='search-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M23.832 19.641l-6.821-6.821c2.834-5.878-1.45-12.82-8.065-12.82-4.932 0-8.946 4.014-8.946 8.947 0 6.508 6.739 10.798 12.601 8.166l6.879 6.879c1.957.164 4.52-2.326 4.352-4.351zm-14.886-4.721c-3.293 0-5.973-2.68-5.973-5.973s2.68-5.973 5.973-5.973c3.294 0 5.974 2.68 5.974 5.973s-2.68 5.973-5.974 5.973z'/></svg><input type='text' name='s' id='search' placeholder='Finde einen Händler'></form></li>";

    return $items;
}

// Full Customize of the Login Page
//Replace style-login.css with the name of your custom CSS file
function sebraone_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/style-login.css' );
}

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'sebraone_login_stylesheet' );
