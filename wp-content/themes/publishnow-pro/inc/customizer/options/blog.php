<?php
/**
 * Blog Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_blog_customize_register( $wp_customize ) {

	// Register new section: Blog
	$wp_customize->add_section( 'publishnow_blog' , array(
		'title'       => esc_html__( 'Blog', 'publishnow' ),
		'panel'       => 'publishnow_options',
		'priority'    => 7
	) );

	// Register blog layouts setting
	$wp_customize->add_setting( 'publishnow_blog_layouts', array(
		'default'           => '2c-l',
		'sanitize_callback' => 'publishnow_sanitize_select',
	) );
	$wp_customize->add_control( 'publishnow_blog_layouts', array(
		'label'             => esc_html__( 'Blog Layout', 'publishnow' ),
		'section'           => 'publishnow_blog',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'2c-l'   => esc_html__( 'Right sidebar', 'publishnow' ),
			'2c-r'   => esc_html__( 'Left sidebar', 'publishnow' ),
			'1c'     => esc_html__( 'No sidebar', 'publishnow' )
		),
	) );

	// Register blog types setting
	$wp_customize->add_setting( 'publishnow_blog_types', array(
		'default'           => 'grid-two',
		'sanitize_callback' => 'publishnow_sanitize_select',
	) );
	$wp_customize->add_control( 'publishnow_blog_types', array(
		'label'             => esc_html__( 'Blog Types', 'publishnow' ),
		'section'           => 'publishnow_blog',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'default'       => esc_html__( 'Default', 'publishnow' ),
			'grid-two'      => esc_html__( 'Grid 2 columns', 'publishnow' ),
			'grid-three'    => esc_html__( 'Grid 3 columns', 'publishnow' )
		),
	) );

}
add_action( 'customize_register', 'publishnow_blog_customize_register' );
