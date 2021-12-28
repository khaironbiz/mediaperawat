<?php
/**
 * General Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_general_customize_register( $wp_customize ) {

	// Register new section: General
	$wp_customize->add_section( 'publishnow_general' , array(
		'title'    => esc_html__( 'General', 'publishnow' ),
		'panel'    => 'publishnow_options',
		'priority' => 1
	) );

	// Register container setting
	$wp_customize->add_setting( 'publishnow_container_style', array(
		'default'           => 'fullwidth',
		'sanitize_callback' => 'publishnow_sanitize_select',
	) );
	$wp_customize->add_control( 'publishnow_container_style', array(
		'label'             => esc_html__( 'Container', 'publishnow' ),
		'section'           => 'publishnow_general',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'fullwidth' => esc_html__( 'Full Width', 'publishnow' ),
			'boxed'     => esc_html__( 'Boxed', 'publishnow' ),
			'framed'    => esc_html__( 'Framed', 'publishnow' )
		)
	) );

	// Register pagination setting
	$wp_customize->add_setting( 'publishnow_posts_pagination', array(
		'default'           => 'number',
		'sanitize_callback' => 'publishnow_sanitize_select',
	) );
	$wp_customize->add_control( 'publishnow_posts_pagination', array(
		'label'             => esc_html__( 'Pagination type', 'publishnow' ),
		'section'           => 'publishnow_general',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'number'      => esc_html__( 'Number', 'publishnow' ),
			'traditional' => esc_html__( 'Older / Newer', 'publishnow' )
		)
	) );

	// Register sticky sidebar setting
	$wp_customize->add_setting( 'publishnow_sticky_sidebar', array(
		'default'           => 0,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_sticky_sidebar', array(
		'label'             => esc_html__( 'Enable sticky sidebar', 'publishnow' ),
		'section'           => 'publishnow_general',
		'priority'          => 5,
		'type'              => 'checkbox'
	) );

	// Register thumbnail caption setting
	$wp_customize->add_setting( 'publishnow_thumbnail_caption', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_thumbnail_caption', array(
		'label'             => esc_html__( 'Enable thumbnail caption', 'publishnow' ),
		'section'           => 'publishnow_general',
		'priority'          => 7,
		'type'              => 'checkbox'
	) );

}
add_action( 'customize_register', 'publishnow_general_customize_register' );
