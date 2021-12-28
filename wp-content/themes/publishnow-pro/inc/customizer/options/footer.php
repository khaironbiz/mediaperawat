<?php
/**
 * Footer Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_footer_customize_register( $wp_customize ) {

	// Register new section: Footer
	$wp_customize->add_section( 'publishnow_footer' , array(
		'title'    => esc_html__( 'Footer', 'publishnow' ),
		'panel'    => 'publishnow_options',
		'priority' => 17
	) );

	// Register footer background image setting
	$wp_customize->add_setting( 'publishnow_footer_bg_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'publishnow_footer_bg_image', array(
		'label'             => esc_html__( 'Backgroud Image', 'publishnow' ),
		'section'           => 'publishnow_footer',
		'priority'          => 5,
		'flex_width'        => true,
		'flex_height'       => true,
		'width'             => 1920,
		'height'            => 600
	) ) );

	// Register footer background color setting
	$wp_customize->add_setting( 'publishnow_footer_bg_color', array(
		'default'           => '#181818',
		'sanitize_callback' => 'publishnow_sanitize_hex_color',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishnow_footer_bg_color', array(
		'label'             => esc_html__( 'Background color', 'publishnow' ),
		'section'           => 'publishnow_footer',
		'priority'          => 7
	) ) );

	// Register footer widget column setting
	$wp_customize->add_setting( 'publishnow_footer_widget_column', array(
		'default'           => '4',
		'sanitize_callback' => 'publishnow_sanitize_select',
	) );
	$wp_customize->add_control( 'publishnow_footer_widget_column', array(
		'label'             => esc_html__( 'Footer Widget Columns', 'publishnow' ),
		'section'           => 'publishnow_footer',
		'priority'          => 9,
		'type'              => 'radio',
		'choices'           => array(
			'3' => esc_html__( '3 Columns', 'publishnow' ),
			'4' => esc_html__( '4 Columns', 'publishnow' ),
			'6' => esc_html__( '6 Columns', 'publishnow' )
		)
	) );

	// Register Footer Credits setting
	$wp_customize->add_setting( 'publishnow_footer_credits', array(
		'sanitize_callback' => 'publishnow_sanitize_html',
		'default'           => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed and Developed by <a href="https://www.happythemes.com/">HappyThemes</a>',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'publishnow_footer_credits', array(
		'label'             => esc_html__( 'Footer Text', 'publishnow' ),
		'section'           => 'publishnow_footer',
		'priority'          => 11,
		'type'              => 'textarea'
	) );
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'publishnow_footer_credits', array(
			'selector'         => '.copyright',
			'settings'         => array( 'publishnow_footer_credits' ),
			'render_callback'  => function() {
				return publishnow_sanitize_html( get_theme_mod( 'publishnow_footer_credits' ) );
			}
		) );
	}

}
add_action( 'customize_register', 'publishnow_footer_customize_register' );
