<?php
/**
 * Post Customizer
 */

/**
 * Register the customizer.
 */
function publishnow_post_customize_register( $wp_customize ) {

	// Register new section: Post
	$wp_customize->add_section( 'publishnow_post' , array(
		'title'       => esc_html__( 'Posts', 'publishnow' ),
		'description' => esc_html__( 'These options is used for customizing the post area.', 'publishnow' ),
		'panel'       => 'publishnow_options',
		'priority'    => 9
	) );

	// Register post tags setting
	$wp_customize->add_setting( 'publishnow_post_tags', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_post_tags', array(
		'label'             => esc_html__( 'Enable tags', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 1,
		'type'              => 'checkbox'
	) );

	// Register post tags title setting
	$wp_customize->add_setting( 'publishnow_post_tags_title', array(
		'default'           => esc_html__( 'Topics', 'publishnow' ),
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'publishnow_post_tags_title', array(
		'label'             => esc_html__( 'Post tags title', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 3,
		'type'              => 'text',
		'active_callback'   => 'publishnow_is_post_tags_checked'
	) );

	// Register Author Box setting
	$wp_customize->add_setting( 'publishnow_author_box', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_author_box', array(
		'label'             => esc_html__( 'Enable author box', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 5,
		'type'              => 'checkbox'
	) );

	// Register Next & Prev post setting
	$wp_customize->add_setting( 'publishnow_next_prev_post', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_next_prev_post', array(
		'label'             => esc_html__( 'Enable next & prev post', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 7,
		'type'              => 'checkbox'
	) );

	// Register Post Share setting
	$wp_customize->add_setting( 'publishnow_post_share', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_post_share', array(
		'label'             => esc_html__( 'Enable share buttons', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 9,
		'type'              => 'checkbox'
	) );

	// Register Related Posts setting
	$wp_customize->add_setting( 'publishnow_related_posts', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_related_posts', array(
		'label'             => esc_html__( 'Enable related posts', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 11,
		'type'              => 'checkbox'
	) );

	// Register Related posts title setting
	$wp_customize->add_setting( 'publishnow_related_posts_title', array(
		'default'           => esc_html__( 'You Might Also Like', 'publishnow' ),
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'publishnow_related_posts_title', array(
		'label'             => esc_html__( 'Related posts title', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 13,
		'type'              => 'text',
		'active_callback'   => 'publishnow_is_related_posts_checked'
	) );

	// Register Related posts title setting
	$wp_customize->add_setting( 'publishnow_related_posts_number', array(
		'default'           => 6,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'publishnow_related_posts_number', array(
		'label'             => esc_html__( 'Related posts number', 'publishnow' ),
		'description'       => esc_html__( 'The number of posts you want to show.', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 15,
		'type'              => 'number',
		'input_attrs'       => array(
			'min'  => 0,
			'step' => 1
		),
		'active_callback'   => 'publishnow_is_related_posts_checked'
	) );

	// Register Post comment manager setting
	$wp_customize->add_setting( 'publishnow_post_comment', array(
		'default'           => 1,
		'sanitize_callback' => 'publishnow_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'publishnow_post_comment', array(
		'label'             => esc_html__( 'Enable comment on post', 'publishnow' ),
		'section'           => 'publishnow_post',
		'priority'          => 23,
		'type'              => 'checkbox'
	) );

}
add_action( 'customize_register', 'publishnow_post_customize_register' );

/**
 * Active callback when Post Tags checked.
 */
function publishnow_is_post_tags_checked() {
	$tags = get_theme_mod( 'publishnow_post_tags', 1 );

	if ( $tags ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Active callback when Related Posts checked.
 */
function publishnow_is_related_posts_checked() {
	$related = get_theme_mod( 'publishnow_related_posts', 1 );

	if ( $related ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Active callback when Random Posts checked.
 */
function publishnow_is_random_posts_checked() {
	$random = get_theme_mod( 'publishnow_random_posts', 1 );

	if ( $random ) {
		return true;
	} else {
		return false;
	}
}
