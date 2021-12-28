<?php
/**
 * Elementor compatibility and custom functions
 */

namespace Elementor;

/**
 * Elementor setup function.
 *
 * @return void
 */
function publishnow_update_elementor_global_option () {
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'elementor_container_width', '1110' );
}
add_action( 'after_switch_theme', 'Elementor\publishnow_update_elementor_global_option' );

/**
 * Add widgets
 */
function publishnow_elementor_custom_widgets() {
	require_once get_template_directory() . '/inc/elementor/widgets/featured.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-one.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-two.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-three.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-four.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-five.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-six.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-seven.php';
	require_once get_template_directory() . '/inc/elementor/widgets/layout-eight.php';
}
add_action( 'elementor/widgets/widgets_registered', 'Elementor\publishnow_elementor_custom_widgets' );


/**
 * Add new category for Elementor.
 */
function elementor_init() {

	$elementor = \Elementor\Plugin::$instance;

	// Add element category in panel
	$elementor->elements_manager->add_category(
		'publishnow-elements',
		[
			'title' => esc_html__( 'PublishNow Pro Elements', 'publishnow' ),
			'icon' => 'font',
		],
		1
	);
}
add_action( 'elementor/init', 'Elementor\elementor_init', 1 );
