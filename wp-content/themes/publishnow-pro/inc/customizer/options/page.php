<?php
/**
 * Page Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_page_customize_register( $wp_customize ) {

	// Register new section: Page
	$wp_customize->add_section( 'publishnow_page' , array(
		'title'    => esc_html__( 'Pages', 'publishnow' ),
		'panel'    => 'publishnow_options',
		'priority' => 11
	) );

	// Register Page comment manager setting
	$wp_customize->add_setting( 'publishnow_page_comment', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_page_comment', array(
		'label'             => esc_html__( 'Enable comment on Pages', 'publishnow' ),
		'section'           => 'publishnow_page',
		'priority'          => 1,
		'type'              => 'checkbox'
	) );

	// Register Page title setting
	$wp_customize->add_setting( 'publishnow_page_title', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_page_title', array(
		'label'             => esc_html__( 'Enable page title', 'publishnow' ),
		'section'           => 'publishnow_page',
		'priority'          => 3,
		'type'              => 'checkbox'
	) );

	// Register Page publishnow image setting
	$wp_customize->add_setting( 'publishnow_page_publishnow_image', array(
		'default'           => 0,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_page_publishnow_image', array(
		'label'             => esc_html__( 'Enable page featured image', 'publishnow' ),
		'section'           => 'publishnow_page',
		'priority'          => 5,
		'type'              => 'checkbox'
	) );

}
add_action( 'customize_register', 'publishnow_page_customize_register' );
