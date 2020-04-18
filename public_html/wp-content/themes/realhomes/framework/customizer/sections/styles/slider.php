<?php
/**
 * Section:	`Slider`
 * Panel: 	`Styles`
 *
 * @package RH
 * @since 3.0.0
 */

if ( ! function_exists( 'inspiry_styles_slider_customizer' ) ) :

	/**
	 * inspiry_styles_slider_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize - Instance of WP_Customize_Manager.
	 * @since  3.0.0
	 */
	function inspiry_styles_slider_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Slider Section
		 */
		$wp_customize->add_section( 'inspiry_slider_styles', array(
			'title' => esc_html__( 'Slider', 'framework' ),
			'panel' => 'inspiry_styles_panel',
		) );

		if ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			$wp_customize->add_setting( 'inspiry_slider_featured_label_bg', array(
				'type' => 'option',
				'default' => '#ea723d',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'inspiry_slider_featured_label_bg',
					array(
						'label' => esc_html__( 'Featured Property Label Background', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);
		}

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_title_color = '#394041';
		} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_title_color = '#1a1a1a';
		}
		$wp_customize->add_setting( 'theme_slide_title_color', array(
			'type' => 'option',
			'default' => $default_slide_title_color,
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_slide_title_color',
				array(
					'label' => esc_html__( 'Slide Title Color', 'framework' ),
					'section' => 'inspiry_slider_styles',
				)
			)
		);

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_title_hover = '#df5400';
		} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_title_hover = '#1ea69a';
		}
		$wp_customize->add_setting( 'theme_slide_title_hover_color', array(
			'type' => 'option',
			'default' => $default_slide_title_hover,
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_slide_title_hover_color',
				array(
					'label' => esc_html__( 'Slide Title Hover Color', 'framework' ),
					'section' => 'inspiry_slider_styles',
				)
			)
		);

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_desc_color = '#8b9293';
		} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_desc_color = '#808080';
		}
		$wp_customize->add_setting( 'theme_slide_desc_text_color', array(
			'type' => 'option',
			'default' => $default_slide_desc_color,
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_slide_desc_text_color',
				array(
					'label' => esc_html__( 'Slide Description Text Color', 'framework' ),
					'section' => 'inspiry_slider_styles',
				)
			)
		);

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_price_color = '#df5400';
		} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			$default_slide_price_color = '#1ea69a';
		}
		$wp_customize->add_setting( 'theme_slide_price_color', array(
			'type' => 'option',
			'default' => $default_slide_price_color,
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_slide_price_color',
				array(
					'label' => esc_html__( 'Slide Price Color', 'framework' ),
					'section' => 'inspiry_slider_styles',
				)
			)
		);

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			$wp_customize->add_setting( 'theme_slide_know_more_text_color', array(
				'type' => 'option',
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'theme_slide_know_more_text_color',
					array(
						'label' => esc_html__( 'Slide Know More Button Text Color', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);

			$wp_customize->add_setting( 'theme_slide_know_more_bg_color', array(
				'type' => 'option',
				'default' => '#37b3d9',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'theme_slide_know_more_bg_color',
					array(
						'label' => esc_html__( 'Slide Know More Button Background Color', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);

			$wp_customize->add_setting( 'theme_slide_know_more_hover_bg_color', array(
				'type' => 'option',
				'default' => '#2aa6cc',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'theme_slide_know_more_hover_bg_color',
					array(
						'label' => esc_html__( 'Slide Know More Button Hover Background Color', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);
		}

		if ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			$wp_customize->add_setting( 'inspiry_slider_meta_heading_color', array(
				'type' => 'option',
				'default' => '#1a1a1a',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'inspiry_slider_meta_heading_color',
					array(
						'label' => esc_html__( 'Slider Meta Heading Color', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);

			$wp_customize->add_setting( 'inspiry_slider_meta_text_color', array(
				'type' => 'option',
				'default' => '#444444',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'inspiry_slider_meta_text_color',
					array(
						'label' => esc_html__( 'Slider Meta Text Color', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);

			$wp_customize->add_setting( 'inspiry_slider_meta_icon_color', array(
				'type' => 'option',
				'default' => '#1ea69a',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'inspiry_slider_meta_icon_color',
					array(
						'label' => esc_html__( 'Slider Meta Icon Color', 'framework' ),
						'section' => 'inspiry_slider_styles',
					)
				)
			);
		}

	}

	add_action( 'customize_register', 'inspiry_styles_slider_customizer' );
endif;


if ( ! function_exists( 'inspiry_styles_slider_defaults' ) ) :

	/**
	 * inspiry_styles_slider_defaults.
	 *
	 * @param  WP_Customize_Manager $wp_customize - Instance of WP_Customize_Manager.
	 * @since  3.0.0
	 */
	function inspiry_styles_slider_defaults( WP_Customize_Manager $wp_customize ) {
		$styles_slider_settings_ids = array(
			'inspiry_slider_featured_label_bg',
			'theme_slide_title_color',
			'theme_slide_title_hover_color',
			'theme_slide_desc_text_color',
			'theme_slide_price_color',
			'theme_slide_know_more_text_color',
			'theme_slide_know_more_bg_color',
			'theme_slide_know_more_hover_bg_color',
			'inspiry_slider_meta_heading_color',
			'inspiry_slider_meta_text_color',
			'inspiry_slider_meta_icon_color',
		);
		inspiry_initialize_defaults( $wp_customize, $styles_slider_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_styles_slider_defaults' );
endif;
