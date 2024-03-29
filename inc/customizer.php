<?php
/**
 * SebraOne Theme Customizer
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'SebraOne_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function SebraOne_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'SebraOne_customize_register' );

if ( ! function_exists( 'SebraOne_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function SebraOne_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'SebraOne_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'SebraOne' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'SebraOne' ),
				'priority'    => apply_filters( 'SebraOne_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function SebraOne_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'SebraOne_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'SebraOne_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'SebraOne_container_type',
				array(
					'label'       => __( 'Container Width', 'SebraOne' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'SebraOne' ),
					'section'     => 'SebraOne_theme_layout_options',
					'settings'    => 'SebraOne_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'SebraOne' ),
						'container-fluid' => __( 'Full width container', 'SebraOne' ),
					),
					'priority'    => apply_filters( 'SebraOne_container_type_priority', 10 ),
				)
			)
		);

		$wp_customize->add_setting(
			'SebraOne_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'SebraOne_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'SebraOne' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'SebraOne'
					),
					'section'           => 'SebraOne_theme_layout_options',
					'settings'          => 'SebraOne_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'SebraOne_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'SebraOne' ),
						'left'  => __( 'Left sidebar', 'SebraOne' ),
						'both'  => __( 'Left & Right sidebars', 'SebraOne' ),
						'none'  => __( 'No sidebar', 'SebraOne' ),
					),
					'priority'          => apply_filters( 'SebraOne_sidebar_position_priority', 20 ),
				)
			)
		);
	}
} // End of if function_exists( 'SebraOne_theme_customize_register' ).
add_action( 'customize_register', 'SebraOne_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'SebraOne_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function SebraOne_customize_preview_js() {
		wp_enqueue_script(
			'SebraOne_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'SebraOne_customize_preview_js' );
