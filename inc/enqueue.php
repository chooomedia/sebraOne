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
		wp_enqueue_script( 'SebraOne-fontawesome-5', 'https://use.fontawesome.com/releases/v5.15.3/js/all.js', array(), $js_version, false );
		wp_enqueue_script( 'SebraOne-jquery-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', '', $js_version, true );
		wp_enqueue_script( 'SebraOne-slick-js', get_template_directory_uri() . '/js/slick.min.js', '', '1.3.15', false );
		wp_enqueue_script( 'SebraOne-form-validator', get_template_directory_uri() . '/js/validator.js', array(), $js_version, true );
		wp_enqueue_script( 'SebraOne-form-select-dropdown', get_template_directory_uri() . '/js/select.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'SebraOne_scripts' ).

add_action( 'wp_enqueue_scripts', 'SebraOne_scripts' );
