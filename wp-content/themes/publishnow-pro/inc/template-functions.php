<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function publishnow_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'publishnow_pingback_header' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the body element.
 * @return array
 */
function publishnow_body_classes( $classes ) {

	// Adds a class of multi-author to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'multi-author';
	}

	// Adds a class for the container style.
	$container = get_theme_mod( 'publishnow_container_style', 'fullwidth' );
	if ( $container == 'fullwidth' ) {
		$classes[] = 'full-width-container';
	} elseif ( $container == 'boxed' ) {
		$classes[] = 'boxed-container';
	} else {
		$classes[] = 'framed-container';
	}

	// Header color
	$header_color = get_theme_mod( 'publishnow_header_color', 'dark' );
	if ( $header_color == 'dark' ) {
		$classes[] = 'header-dark';
	} else {
		$classes[] = 'header-light';
	}

	// Adds a class if post share enable
	$share = get_theme_mod( 'publishnow_post_share', 1 );
	if ( $share && is_single() ) {
		$classes[] = 'post-share-active';
	}

	// Layout on blog page.
	if ( is_home() ) {
		$blog_types = get_theme_mod( 'publishnow_blog_types', 'grid-two' );
		$classes[] = 'blog-type-' . $blog_types;
	}

	// Custom class if a post have a featured image
	if ( is_single() && has_post_thumbnail( get_the_ID() ) ) {
		$classes[] = 'has-featured-image';
	}

	// Custom fixed top bar class
	$fixed = get_theme_mod( 'publishnow_top_bar_fixed', 0 );
	if ( $fixed ) {
		$classes[] = 'fixed-top-bar';
	}

	return $classes;
}
add_filter( 'body_class', 'publishnow_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the post element.
 * @return array
 */
function publishnow_post_classes( $classes ) {

	// Replace hentry class with entry.
	$classes[] = 'entry';

	if ( !is_single() && !is_page() ) {
		$types = get_theme_mod( 'publishnow_blog_types', 'grid-two' );
		$classes[] = 'post-layout-' . $types;
	}

	if ( has_post_thumbnail( get_the_ID() ) ) {
		$caption = get_post( get_post_thumbnail_id() );
		if ( !is_admin() && !empty( $caption->post_excerpt ) ) {
			$classes[] = 'has-caption';
		}
	}

	return $classes;
}
add_filter( 'post_class', 'publishnow_post_classes' );

/**
 * Remove 'hentry' from post_class()
 */
function publishnow_remove_hentry( $class ) {
	$class = array_diff( $class, array( 'hentry' ) );
	return $class;
}
add_filter( 'post_class', 'publishnow_remove_hentry' );

/**
 * Change the excerpt more string.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function publishnow_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'publishnow_excerpt_more' );

/**
 * Filter the except length to 20 words.
 */
function publishnow_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'publishnow_custom_excerpt_length', 999 );

/**
 * Remove theme-layouts meta box on attachment and bbPress post type.
 *
 * @since 1.0.0
 */
function publishnow_remove_theme_layout_metabox() {
	remove_post_type_support( 'attachment', 'theme-layouts' );

	// bbPress
	remove_post_type_support( 'forum', 'theme-layouts' );
	remove_post_type_support( 'topic', 'theme-layouts' );
	remove_post_type_support( 'reply', 'theme-layouts' );
}
add_action( 'init', 'publishnow_remove_theme_layout_metabox', 11 );

/**
 * Add post type 'post' support for the Simple Page Sidebars plugin.
 *
 * @since  1.0.0
 */
function publishnow_page_sidebar_plugin() {
	if ( class_exists( 'Simple_Page_Sidebars' ) ) {
		add_post_type_support( 'post', 'simple-page-sidebars' );
	}
}
add_action( 'init', 'publishnow_page_sidebar_plugin' );

/**
 * Register custom contact info fields.
 *
 * @since  1.0.0
 * @param  array $contactmethods
 * @return array
 */
function publishnow_contact_info_fields( $contactmethods ) {
	$contactmethods['twitter']     = esc_html__( 'Twitter URL', 'publishnow' );
	$contactmethods['facebook']    = esc_html__( 'Facebook URL', 'publishnow' );
	$contactmethods['gplus']       = esc_html__( 'Google Plus URL', 'publishnow' );
	$contactmethods['instagram']   = esc_html__( 'Instagram URL', 'publishnow' );
	$contactmethods['pinterest']   = esc_html__( 'Pinterest URL', 'publishnow' );
	$contactmethods['linkedin']    = esc_html__( 'Linkedin URL', 'publishnow' );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'publishnow_contact_info_fields' );

/**
 * Extend archive title
 *
 * @since  1.0.0
 */
function publishnow_extend_archive_title( $title ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'publishnow' ), '<span>' . single_cat_title( '', false ) ) . '</span>';
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_search() ) {
		$title = sprintf( esc_html__( 'Search Results for: %s', 'publishnow' ), '<span>' . get_search_query() . '</span>' );
	} elseif ( is_404() ) {
		$title = esc_html__( '404 Not Found!', 'publishnow' );
	} else {
		$title = esc_html__( 'Latest News', 'publishnow' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'publishnow_extend_archive_title' );

/**
 * Customize tag cloud widget
 *
 * @since  1.0.0
 */
function publishnow_customize_tag_cloud( $args ) {
	$args['largest']  = 12;
	$args['smallest'] = 12;
	$args['unit']     = 'px';
	$args['number']   = 20;
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'publishnow_customize_tag_cloud' );

/**
 * Modifies the theme layout on attachment pages.
 *
 * @since  1.0.0
 */
function publishnow_mod_theme_layout( $layout ) {

	// Change the layout to Full Width on Attachment page.
	if ( is_attachment() && wp_attachment_is_image() ) {
		$post_layout = get_post_layout( get_queried_object_id() );
		if ( 'default' === $post_layout ) {
			$layout = '1c';
		}
	}

	// Layout on home page.
	if ( is_home() ) {
		$blog_layouts = get_theme_mod( 'publishnow_blog_layouts', '2c-l' );
		$layout = $blog_layouts;
	}

	return $layout;
}
add_filter( 'theme_mod_theme_layout', 'publishnow_mod_theme_layout', 15 );
