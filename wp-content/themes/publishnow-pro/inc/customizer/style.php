<?php
/**
 * Customizer: Custom styles
 */

function publishnow_custom_css() {

	// Set up empty variable.
	$css = '';

	// Get the customizer value.
	// Colors
	$accent               = get_theme_mod( 'publishnow_accent_color', '#2552b7' );
	$body_bg_color        = get_theme_mod( 'publishnow_body_bg_color', '#ffffff' );
	$body_text_color      = get_theme_mod( 'publishnow_body_text_color', '#555555' );
	$body_heading_color   = get_theme_mod( 'publishnow_body_heading_color', '#555555' );
	$top_bar_bg_color     = get_theme_mod( 'publishnow_top_bar_bg_color', '#333333' );
	$footer_bg_color      = get_theme_mod( 'publishnow_footer_bg_color', '#333333' );

	// Image
	$footer_bg_image      = get_theme_mod( 'publishnow_footer_bg_image' );

	// Typography
	$heading_font         = get_theme_mod( 'publishnow_heading_font_family', '\'Lora\', serif' );
	$body_font            = get_theme_mod( 'publishnow_body_font_family', '\'Lora\', serif' );

	if ( $heading_font != '\'Lora\', serif' ) {
		$css .= '
			h1, h2, h3, h4, h5, h6, .entry-author {
				font-family: ' . wp_kses_post( $heading_font ) . ';
			}
		';
	}

	if ( $body_font != '\'Lora\', serif' ) {
		$css .= '
			body {
				font-family: ' . wp_kses_post( $body_font ) . ';
			}
		';
	}

	// Accent
	if ( $accent != '#2552b7' ) {
		$css .= '
			button, input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.button,
			.pagination .current,
			.pagination .page-numbers:hover,
			.block-title,
			.author-badge,
			.format-icon,
			.elementor-page .elementor-widget-container h5,
			.tag-links .tag-title {
				background-color: ' . sanitize_hex_color( $accent ) . ';
			}

			.primary-menu li a:hover,
			.secondary-menu li ul li a:hover,
			.social-search li a:hover,
			.primary-menu li:hover > a,
			.social-search li:hover > a,
			.cat-links a,
			.entry-title a:hover,
			.post-meta a:hover,
			.widget_entries_thumbnail li .cat-links a,
			.widget li a:hover,
			.footer-sidebar .widget li a:hover,
			.site-info .copyright a,
			.post-pagination .post-detail span,
			.tag-links a:hover,
			.post-pagination .post-detail a:hover,
			.author-bio .description .name a:hover,
			.logged-in-as a,
			.post-edit-link,
			.cat-links,
			.publishnow-elements .view-more,
			.block-title span,
			.site-branding .site-title a:hover,
			.publishnow-elements.featured-posts .entry-header .entry-title a:hover,
			.widget_entries_thumbnail .post-title:hover,
			.elementor-widget-wp-widget-publishnow-posts .post-title:hover,
			.page .entry-content a,
			.single-post .post-content a,
			.primary-menu li li:hover > a,
			.social-search li li:hover > a,
			.secondary-menu li li:hover > a {
			  color: ' . sanitize_hex_color( $accent ) . ';
			}

			.primary-menu .sub-menu li:hover,
			.social-search .sub-menu li:hover,
			.secondary-menu .sub-menu li:hover,
			blockquote,
			.block-title,
			.page-header .page-title {
			  border-color: ' . sanitize_hex_color( $accent ) . ';
			}

			.post-pagination path:nth-child(1) {
				fill: ' . sanitize_hex_color( $accent ) . ';
			}

		';
	}

	if ( $body_bg_color != '#ffffff' ) {
		$css .= '.wide-container { background-color: ' . sanitize_hex_color( $body_bg_color ) . '; }';
	}

	if ( $body_text_color != '#555555' ) {
		$css .= 'body { color: ' . sanitize_hex_color( $body_text_color ) . '; }';
	}

	if ( $body_heading_color != '#555555' ) {
		$css .= 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1.entry-title a, h2.entry-title a, h1.entry-title a:visited, h2.entry-title a:visited, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited, .ad-widget .widget-title, .footer-sidebar .widget-title { color: ' . sanitize_hex_color( $body_heading_color ) . '; }';
	}

	if ( $footer_bg_color != '#333333' ) {
		$css .= '.site-footer { background-color: ' . sanitize_hex_color( $footer_bg_color ) . '; }';
	}

	if ( $footer_bg_image ) {
		$img_url = wp_get_attachment_image_src( $footer_bg_image , 'full' );
		$css .= '.site-footer { background-image: url(' . esc_url( $img_url[0] ) . '); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: fixed; } .site-footer:after { content: ""; height: 100%; width: 100%; background-color: rgba(51,51,51,.95); display: block; position: absolute; top: 0; left: 0; z-index: 0; }';
	}

	// Print the custom style
	wp_add_inline_style( 'publishnow-style', $css );

}
add_action( 'wp_enqueue_scripts', 'publishnow_custom_css' );
