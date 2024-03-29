<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'SebraOne_container_type' );
$pageslug = get_page_template_slug( get_queried_object_id() );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>



<body <?php body_class(); ?> <?php SebraOne_body_attributes(); ?> data-spy="scroll" data-target=".scroll-spy" data-offset="80">
	<?php do_action( 'wp_body_open' );?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar">

			<a class="skip-link sr-only sr-only-focusable"
				href="#content"><?php esc_html_e( 'Skip to content', 'SebraOne' ); ?></a>

			<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark position-fixed vw-100"
				aria-labelledby="main-nav-label">

				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e( 'Main Navigation', 'SebraOne' ); ?>
				</h2>

				<?php if ( 'container mx-lg-5 px-0' === $container ) : ?>
				<div class="container mx-lg-5 px-0">
					<?php endif; ?>
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>
					<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
					<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
						itemprop="url"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>

					<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
						aria-controls="navbarNavDropdown" aria-expanded="false"
						aria-label="<?php esc_attr_e( 'Toggle navigation', 'SebraOne' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php if (get_post_type() != "landingpage") : ?>
					<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse mr-md-3',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto border-0',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new SebraOne_WP_Bootstrap_Navwalker()
							)
						); ?>
					<?php else : ?>
					<div id="navbarNavDropdown" class="collapse navbar-collapse mr-md-3">
						<ul id="main-menu" class="navbar-nav ml-auto border-0">
							<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-89" class="btn-promo btn btn-light ml-lg-4 py-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-89 nav-item">
								<a title="Verkaufe dein Auto" href="http://192.168.64.2/results/" class="nav-link">Verkaufe dein Auto</a>
							</li>
						</ul>
					</div>
					<?php endif; ?>

					<?php if ( 'container' === $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->
