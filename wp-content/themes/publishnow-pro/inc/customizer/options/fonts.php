<?php
/**
 * Fonts Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_fonts_customize_register( $wp_customize ) {

	// Register new section: Fonts
	$wp_customize->add_section( 'publishnow_fonts' , array(
		'title'       => esc_html__( 'Fonts', 'publishnow' ),
		'description' => esc_html__( 'These options is used for customizing the fonts. The Google Fonts can be found here: https://fonts.google.com/.', 'publishnow' ),
		'panel'       => 'publishnow_options',
		'priority'    => 3
	) );

	// Register heading custom text.
	$wp_customize->add_setting( 'publishnow_heading_font_title', array(
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new PublishnowPro_Custom_Text( $wp_customize, 'publishnow_heading_font_title', array(
		'label'             => esc_html__( 'Heading', 'publishnow' ),
		'section'           => 'publishnow_fonts',
		'priority'          => 2
	) ) );

	// Register heading font setting.
	$wp_customize->add_setting( 'publishnow_heading_font', array(
		'default'           => 'Lora:400,400i,700,700i',
		'sanitize_callback' => 'wp_filter_post_kses',
	) );
	$wp_customize->add_control( 'publishnow_heading_font', array(
		'description'       => esc_html__( 'Font name/style/sets', 'publishnow' ),
		'section'           => 'publishnow_fonts',
		'priority'          => 3,
		'type'              => 'text'
	) );

	// Register heading font family setting.
	$wp_customize->add_setting( 'publishnow_heading_font_family', array(
		'default'           => '\'Lora\', serif',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'publishnow_heading_font_family', array(
		'description'       => esc_html__( 'Font family', 'publishnow' ),
		'section'           => 'publishnow_fonts',
		'priority'          => 4,
		'type'              => 'text'
	) );

	// Register body custom text.
	$wp_customize->add_setting( 'publishnow_body_font_title', array(
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new PublishnowPro_Custom_Text( $wp_customize, 'publishnow_body_font_title', array(
		'label'             => esc_html__( 'Body', 'publishnow' ),
		'section'           => 'publishnow_fonts',
		'priority'          => 5
	) ) );

	// Register body font setting.
	$wp_customize->add_setting( 'publishnow_body_font', array(
		'default'           => 'Lora:400,400i,700,700i',
		'sanitize_callback' => 'wp_filter_post_kses',
	) );
	$wp_customize->add_control( 'publishnow_body_font', array(
		'description'       => esc_html__( 'Font name/style/sets', 'publishnow' ),
		'section'           => 'publishnow_fonts',
		'priority'          => 6,
		'type'              => 'text'
	) );

	// Register body font family setting.
	$wp_customize->add_setting( 'publishnow_body_font_family', array(
		'default'           => '\'Lora\', serif',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'publishnow_body_font_family', array(
		'description'       => esc_html__( 'Font family', 'publishnow' ),
		'section'           => 'publishnow_fonts',
		'priority'          => 7,
		'type'              => 'text'
	) );

}
add_action( 'customize_register', 'publishnow_fonts_customize_register' );
