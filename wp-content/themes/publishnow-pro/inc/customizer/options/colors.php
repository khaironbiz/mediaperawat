<?php
/**
 * Colors Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_colors_customize_register( $wp_customize ) {

	// Register accent color setting
	$wp_customize->add_setting( 'publishnow_accent_color', array(
		'default'           => '#2552b7',
		'sanitize_callback' => 'publishnow_sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishnow_accent_color', array(
		'label'             => esc_html__( 'Accent Color', 'publishnow' ),
		'description'       => esc_html__( 'To get this color picker working, please set the Predefined Colors to &quot;Default&quot;', 'publishnow' ),
		'section'           => 'colors',
		'priority'          => 3
	) ) );

	// Register body colors setting
	$wp_customize->add_setting( 'publishnow_body_colors_text', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new PublishnowPro_Custom_Text( $wp_customize, 'publishnow_body_colors_text', array(
		'label'             => esc_html__( 'Body', 'publishnow' ),
		'description'       => esc_html__( 'Body area colors setting.', 'publishnow' ),
		'section'           => 'colors',
		'priority'          => 5
	) ) );

		// Register body background color setting
		$wp_customize->add_setting( 'publishnow_body_bg_color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'publishnow_sanitize_hex_color',
			'transport'         => 'postMessage'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishnow_body_bg_color', array(
			'label'             => esc_html__( 'Background Color', 'publishnow' ),
			'section'           => 'colors',
			'priority'          => 7
		) ) );

		// Register body text color setting
		$wp_customize->add_setting( 'publishnow_body_text_color', array(
			'default'           => '#555555',
			'sanitize_callback' => 'publishnow_sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishnow_body_text_color', array(
			'label'             => esc_html__( 'Text Color', 'publishnow' ),
			'section'           => 'colors',
			'priority'          => 9
		) ) );

		// Register body heading color setting
		$wp_customize->add_setting( 'publishnow_body_heading_color', array(
			'default'           => '#555555',
			'sanitize_callback' => 'publishnow_sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishnow_body_heading_color', array(
			'label'             => esc_html__( 'Heading Color', 'publishnow' ),
			'section'           => 'colors',
			'priority'          => 11
		) ) );

}
add_action( 'customize_register', 'publishnow_colors_customize_register' );
