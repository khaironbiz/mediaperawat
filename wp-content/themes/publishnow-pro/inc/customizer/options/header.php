<?php
/**
 * Header Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_header_customize_register( $wp_customize ) {

	// Register new section: Header
	$wp_customize->add_section( 'publishnow_header' , array(
		'title'       => esc_html__( 'Header', 'publishnow' ),
		'panel'       => 'publishnow_options',
		'priority'    => 5
	) );

	// Register container setting
	$wp_customize->add_setting( 'publishnow_header_color', array(
		'default'           => 'dark',
		'sanitize_callback' => 'publishnow_sanitize_select',
	) );
	$wp_customize->add_control( 'publishnow_header_color', array(
		'label'             => esc_html__( 'Color', 'publishnow' ),
		'section'           => 'publishnow_header',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'dark'  => esc_html__( 'Dark', 'publishnow' ),
			'light' => esc_html__( 'Light', 'publishnow' )
		)
	) );

	// Register header search setting
	$wp_customize->add_setting( 'publishnow_top_bar_search', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_top_bar_search', array(
		'label'             => esc_html__( 'Enable search', 'publishnow' ),
		'section'           => 'publishnow_header',
		'priority'          => 5,
		'type'              => 'checkbox'
	) );

	// Register breadcrumbs setting
	$wp_customize->add_setting( 'publishnow_breadcrumbs', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_breadcrumbs', array(
		'label'             => esc_html__( 'Enable breadcrumbs', 'publishnow' ),
		'section'           => 'publishnow_header',
		'priority'          => 9,
		'type'              => 'checkbox'
	) );

	// Register ad description setting
	$wp_customize->add_setting( 'publishnow_ad', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new PublishnowPro_Custom_Text( $wp_customize, 'publishnow_ad', array(
		'label'             => esc_html__( 'Ad', 'publishnow' ),
		'description'       => esc_html__( 'Header ad setting', 'publishnow' ),
		'section'           => 'publishnow_header',
		'priority'          => 11
	) ) );

		// Register ad image setting
		$wp_customize->add_setting( 'publishnow_ad_img', array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'publishnow_ad_img', array(
			'label'             => esc_html__( 'Image', 'publishnow' ),
			'section'           => 'publishnow_header',
			'priority'          => 13,
			'flex_width'        => false,
			'flex_height'       => false,
			'width'             => 728,
			'height'            => 90
		) ) );

		// Register ad url setting
		$wp_customize->add_setting( 'publishnow_ad_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( 'publishnow_ad_url', array(
			'label'             => esc_html__( 'URL', 'publishnow' ),
			'section'           => 'publishnow_header',
			'priority'          => 15,
			'type'              => 'url'
		) );

		// Register ad url setting
		$wp_customize->add_setting( 'publishnow_ad_custom', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		) );
		$wp_customize->add_control( 'publishnow_ad_custom', array(
			'label'             => esc_html__( 'Or custom ad', 'publishnow' ),
			'section'           => 'publishnow_header',
			'priority'          => 17,
			'type'              => 'textarea'
		) );

}
add_action( 'customize_register', 'publishnow_header_customize_register' );
