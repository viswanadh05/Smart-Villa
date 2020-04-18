<?php
/**
 * Styles Settings
 *
 * @package RH
 * @since 1.0.0
 */

if ( ! function_exists( 'inspiry_styles_customizer' ) ) :

	/**
	 * Customizer Section: Styles
	 *
	 * @param  WP_Customize_Manager $wp_customize - Instance of WP_Customize_Manager.
	 * @since  1.0.0
	 */
	function inspiry_styles_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Styles Panel
		 */
		$wp_customize->add_panel( 'inspiry_styles_panel', array(
			'title' => esc_html__( 'Styles', 'framework' ),
			'priority' => 128,
		) );

	}

	add_action( 'customize_register', 'inspiry_styles_customizer' );
endif;

/**
 * Typography
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/typography.php' );

/**
 * Basic
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/basic.php' );

/**
 * Slider
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/slider.php' );

/**
 * Property Item
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/property-item.php' );

/**
 * Buttons
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/buttons.php' );

/**
 * News
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/news.php' );

/**
 * Gallery
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/sections/styles/gallery.php' );
