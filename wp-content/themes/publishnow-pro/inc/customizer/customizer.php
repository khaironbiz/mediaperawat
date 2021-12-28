<?php
/**
 * PublishNow Pro Theme Customizer
 */

// Loads custom control
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom/text.php';

// Loads the customizer options
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/retina-logo.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/general.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/header.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/blog.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/post.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/page.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/footer.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/fonts.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/colors.php';

/**
 * Custom customizer functions.
 */
function publishnow_customize_functions( $wp_customize ) {

	// Register new panel: Theme Options
	$wp_customize->add_panel( 'publishnow_options', array(
		'title'       => esc_html__( 'Theme Options', 'publishnow' ),
		'description' => esc_html__( 'This panel is used for customizing the PublishNow Pro theme.', 'publishnow' ),
		'priority'    => 130,
	) );

	// Live preview of Site Title
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// Enable selective refresh to the Site Title
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'settings'         => array( 'blogname' ),
			'render_callback'  => function() {
				return get_bloginfo( 'name', 'display' );
			}
		) );
	}

	// Move the Colors section.
	$wp_customize->get_section( 'colors' )->panel    = 'publishnow_options';
	$wp_customize->get_section( 'colors' )->priority = 2;

	// Move the Background Image section.
	$wp_customize->get_section( 'background_image' )->panel    = 'publishnow_options';
	$wp_customize->get_section( 'background_image' )->priority = 3;

	// Move background color to background image section.
	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background', 'publishnow' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';


}
add_action( 'customize_register', 'publishnow_customize_functions', 99 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function publishnow_customize_preview_js() {
	wp_enqueue_script( 'publishnow-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/preview.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'publishnow_customize_preview_js' );
