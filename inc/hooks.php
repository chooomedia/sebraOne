<?php
/**
 * Custom hooks
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'SebraOne_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function SebraOne_site_info() {
		do_action( 'SebraOne_site_info' );
	}
}

add_action( 'SebraOne_site_info', 'SebraOne_add_site_info' );
if ( ! function_exists( 'SebraOne_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function SebraOne_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( '©2022 %2$s ', 'SebraOne' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://sebra1.com', '' ) ) . '">Sebra1</a>'
			)
		);

		echo apply_filters( 'SebraOne_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
