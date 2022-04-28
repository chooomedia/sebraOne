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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php SebraOne_body_attributes(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
	<div class="site" id="page">

		<header id="wrapper-navbar">
			<nav class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">

				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e( 'Main Navigation', 'SebraOne' ); ?>
				</h2>

				<?php if ( 'container' === $container ) : ?>
				<div class="container">
					<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<div class="logo">
						<?php if ( has_custom_logo() ): ?>
						<a href="<?php echo esc_url( home_url('/') ) ?>">
							<?php the_custom_logo(); ?>
						</a>
						<?php else: ?>
						<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
								itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>
						<?php endif ?>
					</div>

					<div class="header-right">
						<?php if ( is_user_logged_in() ): $current_user = wp_get_current_user(); ?>
						<div class="user-area">
							<div class="user-profile-dropdown dropdown">
								<a class="user-profile-name" href="#" type="button" id="user-dropdown-menu"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<div class="avatar">
										<?php echo get_avatar( $current_user->ID ) ?>
									</div>
									<?php echo esc_attr( $current_user->display_name ) ?>
								</a>
								<button class="navbar-toggler" type="button" data-toggle="collapse"
									data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
									aria-expanded="false"
									aria-label="<?php esc_attr_e( 'Toggle navigation', 'SebraOne' ); ?>">
									<span class="navbar-toggler-icon"></span>
								</button>

								<?php wp_nav_menu([
								    'theme_location' => 'primary',
								    'container' 	 => false,
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'main-menu',
								    'depth'     	 => 2,
								    'menu_class'	 => 'i-dropdown dropdown-menu',
                                    'items_wrap' 	 => '<ul class="%2$s" aria-labelledby="user-dropdown-menu">%3$s</ul>',
                                    'walker'          => new SebraOne_WP_Bootstrap_Navwalker()
								    ]); ?>
							</div>

						</div>
						<?php else: ?>
						<div class="user-area signin-area">
							<i class="mi person user-area-icon"></i>
							<a href="<?php echo esc_url( get_login_url() ) ?>">
								<?php _e( 'Sign in', 'sebraOne' ) ?>
							</a>
						</div>
						<div class="mob-sign-in">
							<a href="<?php echo esc_url( get_login_url() ) ?>"><i class="mi person"></i></a>
						</div>

						<?php endif ?>
					</div>

					<div class="container-fluid header-bottom">

						<div class="header-bottom-wrapper row">
							<div id="quicksearch-mobile-modal" class="modal modal-27">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							</div>
							<?php } ) ?>


							<div class="i-nav">
								<div class="mobile-nav-head">
									<div class="mnh-close-icon">
										<a href="#close-main-menu">
											<i class="mi menu"></i>
										</a>
									</div>

									<?php if ( is_user_logged_in() ): $current_user = wp_get_current_user(); ?>
									<div class="user-profile-dropdown">
										<a class="user-profile-name" href="#">
											<div class="avatar">
												<?php echo get_avatar( $current_user->ID ) ?>
											</div>
											<?php echo esc_html( $current_user->display_name ) ?>

										</a>
									</div>
									<?php endif ?>
								</div>

								<?php if ( is_user_logged_in() ): ?>
								<div class="mobile-user-menu">
									<?php if ( has_nav_menu( 'sebraone-user-menu' ) ) : ?>
									<?php wp_nav_menu( [
								    'theme_location' => 'sebraone-user-menu',
								    'container' 	 => false,
								    'depth'     	 => 0,
								    'menu_class'	 => '',
								    'items_wrap' 	 => '<ul class="%2$s">%3$s</ul>'
								] ) ?>

								</div>
								<?php endif ?>

								<?php echo str_replace(
						'<ul class="sub-menu"',
						'<div class="submenu-toggle"><i class="material-icons">arrow_drop_down</i></div><ul class="sub-menu i-dropdown"',
						wp_nav_menu( [
							'echo' => false,
							'theme_location' => 'primary',
							'container' => false,
							'menu_class' => 'main-menu',
							'items_wrap' => '<ul id="%1$s" class="%2$s main-nav">%3$s</ul>'
						]
					) ) ?>

							</div>
							<div class="i-nav-overlay"></div>
						</div>
					</div>
				</div>
			</nav>
		</header>
