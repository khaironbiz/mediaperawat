<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 */

/**
 * PublishNow Pro only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'publishnow_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since  1.0.0
	 */
	function publishnow_theme_setup() {

		// Make the theme available for translation.
		load_theme_textdomain( 'publishnow', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'publishnow-post', 940, 530, true );
		add_image_size( 'publishnow-post-large', 1170, 760, true );
		add_image_size( 'publishnow-post-small', 570, 360, true );

		// Register custom navigation menu.
		register_nav_menus( array(
			'menu-1'   => esc_html__( 'Top Location', 'publishnow' ),
			'secondary' => esc_html__( 'Main Location' , 'publishnow' ),
			'social'    => esc_html__( 'Social Links' , 'publishnow' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See: http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'audio',
			'image',
			'video'
		) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		// add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'publishnow_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Enable theme-layouts extensions.
		add_theme_support( 'theme-layouts',
			array(
				'1c'   => esc_html__( '1 Column Wide (Full Width)', 'publishnow' ),
				'1c-n' => esc_html__( '1 Column Narrow', 'publishnow' ),
				'2c-l' => esc_html__( '2 Columns: Content / Sidebar', 'publishnow' ),
				'2c-r' => esc_html__( '2 Columns: Sidebar / Content', 'publishnow' )
			),
			array( 'customize' => false, 'default' => '2c-l' )
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

	}
endif; // publishnow_theme_setup
add_action( 'after_setup_theme', 'publishnow_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function publishnow_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'publishnow_content_width', 670 );
}
add_action( 'after_setup_theme', 'publishnow_content_width', 0 );

/**
 * Set new content width if user uses 1 column layout.
 */
if ( ! function_exists( 'publishnow_secondary_content_width' ) ) :
	function publishnow_secondary_content_width() {
		global $content_width;

		if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) ) {
			$content_width = 1170;
		}
	}
endif;
add_action( 'template_redirect', 'publishnow_secondary_content_width' );

/**
 * Registers custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_widget
 */
function publishnow_widgets_init() {

	// Register ad widget.
	require get_template_directory() . '/inc/widgets/widget-ads.php';
	register_widget( 'PublishnowPro_Ads_Widget' );

	// Register Facebook widget.
	require get_template_directory() . '/inc/widgets/widget-facebook.php';
	register_widget( 'PublishnowPro_Facebook_Widget' );

	// Register posts thumbnail widget.
	require get_template_directory() . '/inc/widgets/widget-posts.php';
	register_widget( 'PublishnowPro_Posts_Widget' );

	// Register twitter widget.
	require get_template_directory() . '/inc/widgets/widget-twitter.php';
	register_widget( 'PublishnowPro_Twitter_Widget' );

	// Register social widget.
	require get_template_directory() . '/inc/widgets/widget-social.php';
	register_widget( 'PublishnowPro_Social_Widget' );

}
add_action( 'widgets_init', 'publishnow_widgets_init' );

/**
 * Registers widget areas and custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function publishnow_sidebars_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary Sidebar', 'publishnow' ),
			'id'            => 'primary',
			'description'   => esc_html__( 'Main sidebar that appears on the right.', 'publishnow' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title block-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	// Get the footer widget column from Customizer.
	$widget_columns = get_theme_mod( 'publishnow_footer_widget_column', '4' );
	for ( $i = 1; $i <= $widget_columns; $i++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( esc_html__( 'Footer %s', 'publishnow' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Sidebar that appears on the bottom of your site.', 'publishnow' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}

}
add_action( 'widgets_init', 'publishnow_sidebars_init' );

/**
 * Enqueue scripts and styles.
 */
function publishnow_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'publishnow-fonts', publishnow_fonts_url(), array(), $theme_version );

	wp_enqueue_style( 'publishnow-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'publishnow-style', 'rtl', 'replace' );

	wp_enqueue_style( 'publishnow-slicknav-css', get_template_directory_uri() . '/assets/css/slicknav.css', array(), $theme_version );

	wp_enqueue_script( 'publishnow-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0.0', true );

	wp_enqueue_script( 'publishnow-slicknav', get_theme_file_uri( '/assets/js/jquery.slicknav.js' ), array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'publishnow-sticky', get_theme_file_uri( '/assets/js/theia-sticky-sidebar.js' ), array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'publishnow-sensor', get_theme_file_uri( '/assets/js/ResizeSensor.js' ), array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'publishnow-fitvids', get_theme_file_uri( '/assets/js/jquery.fitvids.js' ), array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'publishnow-custom-js', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '1.0.0', true );

	// Sticky sidebar.
	$sticky = get_theme_mod( 'publishnow_sticky_sidebar', 0 );
	$var = array(
		'sticky' => ( $sticky ) ? true : false,
	);
	wp_localize_script( 'publishnow-custom-js', 'publishnow', $var );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'publishnow_scripts' );

/**
 * Register Google fonts.
 *
 * @since  1.0.0
 * @return string
 */
function publishnow_fonts_url() {

	// Get the customizer data
	$body_font    = get_theme_mod( 'publishnow_body_font', 'Lora:400,400i,700,700i' );
	$heading_font = get_theme_mod( 'publishnow_heading_font', 'Lora:400,400i,700,700i' );

	// Important variable
	$fonts_url = '';
	$fonts     = array();

	if ( $body_font ) {
		$fonts[] = esc_attr( str_replace( '+', ' ', $body_font ) );
	}

	if ( $heading_font && ( $body_font != $heading_font ) ) {
		$fonts[] = esc_attr( str_replace( '+', ' ', $heading_font ) );
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Helper function to get Menu name
 * @source https://wordpress.stackexchange.com/a/45708
 */
function publishnow_get_menu_by_location( $location ) {
	if ( empty($location) ) return false;

	$locations = get_nav_menu_locations();
	if ( ! isset( $locations[$location] ) ) return false;

	$menu_obj = get_term( $locations[$location], 'nav_menu' );

	return $menu_obj;
}

/**
 * Generate random post link
 */
function publishnow_random_link() {
	$random = new WP_Query(
		array(
			'posts_per_page' => 1,
			'orderby' => 'rand',
			'fields' => 'ids'
		)
	);

	return get_permalink( $random->posts[0] );
}

/**
 * Post views count
 */
function publishnow_post_views( $id ) {

	if ( is_singular() ) {

		$key   = 'post_views';
		$count = get_post_meta( $id, $key, true );

		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $id, $key );
			add_post_meta( $id, $key, '0' );
		} else {
			$count++;
			update_post_meta( $id, $key, $count );
		}
	}

}

if ( ! function_exists( 'publishnow_is_elementor_active' ) ) :
/**
 * Check if Elementor is active
 */
function publishnow_is_elementor_active() {
	return defined( 'ELEMENTOR_VERSION' );
}
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Require and recommended plugins list.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Customizer.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/sanitize.php';
require get_template_directory() . '/inc/customizer/style.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/classes/class-svg-icons.php';
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Demo importer.
 */
require get_template_directory() . '/inc/demo/demo-importer.php';

/**
 * We use some part of Hybrid Core to extends our themes.
 *
 * @link  http://themehybrid.com/hybrid-core Hybrid Core site.
 */
require get_template_directory() . '/inc/extensions/breadcrumb-trail.php';
require get_template_directory() . '/inc/extensions/theme-layouts.php';
require get_template_directory() . '/inc/extensions/hybrid-media-grabber.php';

/**
 * Load Elementor compatibility file.
 */
if ( publishnow_is_elementor_active() ) {
	require get_template_directory() . '/inc/elementor/elementor.php';
}
