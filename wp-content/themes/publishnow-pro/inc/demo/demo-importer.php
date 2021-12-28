<?php
/**
 * Demo importer custom function
 * We use https://wordpress.org/plugins/one-click-demo-import/ to import our demo content
 */

/**
 * Define demo file
 */
function publishnow_import_files() {
	return array(
		array(
			'import_file_name'             => 'Demo PublishNow',
			'local_import_file'            => get_template_directory() . '/inc/demo/dummy-data.xml',
			'local_import_widget_file'     => get_template_directory() . '/inc/demo/widgets.wie',
			'local_import_customizer_file' => get_template_directory() . '/inc/demo/customizer.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.png',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'publishnow_import_files' );

/**
 * After import function
 */
function publishnow_after_import_setup() {

	// Assign menus to their locations.
	$top     = get_term_by( 'name', 'Top Nav', 'nav_menu' );
	$primary = get_term_by( 'name', 'Primary Nav', 'nav_menu' );
	$social  = get_term_by( 'name', 'Social Nav', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary'   => $top->term_id,
			'secondary' => $primary->term_id,
			'social'    => $social->term_id
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$posts_page_id = get_page_by_title( 'Latest' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $posts_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'publishnow_after_import_setup' );
