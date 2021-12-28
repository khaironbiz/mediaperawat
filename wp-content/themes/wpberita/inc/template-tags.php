<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wpberita
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'wpberita_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wpberita_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'%s',
			$time_string
		);
		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'wpberita_category' ) ) :
	/**
	 * Prints HTML with meta information for the current category.
	 */
	function wpberita_category() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ', ' );
		$category        = '';
		if ( $categories_list ) {
			echo '<span class="cat-links-content">' . $categories_list . '</span> | '; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

if ( ! function_exists( 'wpberita_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wpberita_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			'%s',
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_html( get_the_author() ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<div class="posted-by"> ' . $byline . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'wpberita_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wpberita_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links heading-text"><strong>%1$s</strong></span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'wpberita' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'wpberita_comment_social' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function wpberita_comment_social() {
		echo '<div class="list-table clearfix">';
			echo '<div class="table-row">';
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="table-cell">';
			echo '<span class="comments-link heading-text">';
			$svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="24" height="24" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12a9.89 9.89 0 0 0 2.26 6.33l-2 2a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h9a10 10 0 0 0 0-20zm0 18H5.41l.93-.93a1 1 0 0 0 0-1.41A8 8 0 1 1 12 20zm5-9H7a1 1 0 0 0 0 2h10a1 1 0 0 0 0-2zm-2 4H9a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2zM9 9h6a1 1 0 0 0 0-2H9a1 1 0 0 0 0 2z" fill="#000000"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>';
			comments_popup_link(
				$svg . '<span class="text-comment">' . esc_html__( 'Comment', 'wpberita' ) . '</span>', // No comment.
				$svg . '1 <span class="text-comment">' . esc_html__( 'Comment', 'wpberita' ) . '</span>', // 1 comment.
				$svg . '% <span class="text-comment">' . esc_html__( 'Comments', 'wpberita' ) . '</span>', // More than 1 comments.
				'', // Class.
				$svg . __( 'Closed', 'wpberita' )
			);

			echo '</span>';
			echo '</div>';
		}

				echo '<div class="table-cell gmr-content-share">';
					echo '<ul class="gmr-socialicon-share pull-right">';
						echo '<li class="text-social heading-text"><strong>';
							echo esc_html__( 'Share', 'wpberita' );
						echo '</strong></li>';
						echo '<li class="facebook">';
							echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( esc_url( get_the_permalink() ) ) . '" target="_blank" rel="nofollow" title="' . esc_html__( 'Facebook Share', 'wpberita' ) . '">';
								echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="24" height="24" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z" fill="#3C5A99"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>';
							echo '</a>';
						echo '</li>';
						echo '<li class="twitter">';
							echo '<a href="https://twitter.com/share?url=' . rawurlencode( esc_url( get_the_permalink() ) ) . '&amp;text=' . rawurlencode( wp_strip_all_tags( get_the_title() ) ) . '" target="_blank" rel="nofollow" title="' . esc_html__( 'Tweet This', 'wpberita' ) . '">';
								echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="24" height="24" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 100 100"><path d="M88.5 26.12a31.562 31.562 0 0 1-9.073 2.486a15.841 15.841 0 0 0 6.945-8.738A31.583 31.583 0 0 1 76.341 23.7a15.783 15.783 0 0 0-11.531-4.988c-8.724 0-15.798 7.072-15.798 15.798c0 1.237.14 2.444.41 3.601c-13.13-.659-24.77-6.949-32.562-16.508a15.73 15.73 0 0 0-2.139 7.943a15.791 15.791 0 0 0 7.028 13.149a15.762 15.762 0 0 1-7.155-1.976c-.002.066-.002.131-.002.199c0 7.652 5.445 14.037 12.671 15.49a15.892 15.892 0 0 1-7.134.27c2.01 6.275 7.844 10.844 14.757 10.972a31.704 31.704 0 0 1-19.62 6.763c-1.275 0-2.532-.074-3.769-.221a44.715 44.715 0 0 0 24.216 7.096c29.058 0 44.948-24.071 44.948-44.945c0-.684-.016-1.367-.046-2.046A32.03 32.03 0 0 0 88.5 26.12z" fill="#1DA1F2"/><rect x="0" y="0" width="100" height="100" fill="rgba(0, 0, 0, 0)" /></svg>';
							echo '</a>';
						echo '</li>';
						echo '<li class="telegram">';
							echo '<a href="https://t.me/share/url?url=' . rawurlencode( esc_url( get_the_permalink() ) ) . '&amp;text=' . rawurlencode( wp_strip_all_tags( get_the_title() ) ) . '" target="_blank" rel="nofollow" title="' . esc_html__( 'Telegram Share', 'wpberita' ) . '">';
								echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M231.256 31.736a15.963 15.963 0 0 0-16.29-2.767L30.409 101.474a16 16 0 0 0 2.712 30.58L80 141.432v58.553a15.994 15.994 0 0 0 27.313 11.314l25.944-25.943l39.376 34.65a15.869 15.869 0 0 0 10.517 4.004a16.157 16.157 0 0 0 4.963-.787a15.865 15.865 0 0 0 10.685-11.654l37.614-164.132a15.96 15.96 0 0 0-5.156-15.7zm-48.054 176.258l-82.392-72.506l118.645-85.687z" fill="#0088cc"/><rect x="0" y="0" width="256" height="256" fill="rgba(0, 0, 0, 0)" /></svg>';
							echo '</a>';
						echo '</li>';
						echo '<li class="whatsapp">';
							echo '<a href="https://api.whatsapp.com/send?text=' . rawurlencode( wp_strip_all_tags( get_the_title() ) ) . ' ' . rawurlencode( esc_url( get_permalink() ) ) . '" target="_blank" rel="nofollow" title="' . esc_html__( 'Send To WhatsApp', 'wpberita' ) . '">';
								echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="24" height="24" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M16.8 5.7C14.4 2 9.5.9 5.7 3.2C2 5.5.8 10.5 3.2 14.2l.2.3l-.8 3l3-.8l.3.2c1.3.7 2.7 1.1 4.1 1.1c1.5 0 3-.4 4.3-1.2c3.7-2.4 4.8-7.3 2.5-11.1zm-2.1 7.7c-.4.6-.9 1-1.6 1.1c-.4 0-.9.2-2.9-.6c-1.7-.8-3.1-2.1-4.1-3.6c-.6-.7-.9-1.6-1-2.5c0-.8.3-1.5.8-2c.2-.2.4-.3.6-.3H7c.2 0 .4 0 .5.4c.2.5.7 1.7.7 1.8c.1.1.1.3 0 .4c.1.2 0 .4-.1.5c-.1.1-.2.3-.3.4c-.2.1-.3.3-.2.5c.4.6.9 1.2 1.4 1.7c.6.5 1.2.9 1.9 1.2c.2.1.4.1.5-.1s.6-.7.8-.9c.2-.2.3-.2.5-.1l1.6.8c.2.1.4.2.5.3c.1.3.1.7-.1 1z" fill="#25D366"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>';
							echo '</a>';
						echo '</li>';
					echo '</ul>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
endif;
add_action( 'wpberita_comment_social', 'wpberita_comment_social' );

if ( ! function_exists( 'wpberita_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wpberita_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'medium',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'wpberita_reading_time' ) ) :
	/**
	 * Estimated Reading Time
	 *
	 * @param boolean $echo Echo/return.
	 * @since 1.0.0
	 */
	function wpberita_reading_time( $echo = true ) {
		global $post;
		$content          = get_post_field( 'post_content', $post->ID );
		$word_count       = str_word_count( wp_strip_all_tags( $content ) );
		$readingtime      = ceil( $word_count / 200 );
		$totalreadingtime = $readingtime . esc_html__( ' min read', 'wpberita' );
		echo '<span class="sep">&bull;</span><span class="reading-time-single">' . esc_html( $totalreadingtime ) . '</span>';
	}
endif;

if ( ! function_exists( 'gmr_move_post_navigation_second' ) ) :
	/**
	 * Move post navigation in top after content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content.
	 * @return string $content
	 */
	function gmr_move_post_navigation_second( $content ) {
		if ( is_singular() && in_the_loop() ) {
			$pagination_nextprev = wp_link_pages(
				array(
					'before'           => '<div class="prevnextpost-links clearfix">',
					'after'            => '</div>',
					'next_or_number'   => 'next',
					'nextpagelink'     => __( 'Next', 'wpberita' ),
					'previouspagelink' => __( 'Previous', 'wpberita' ),
					'echo'             => 0,
				)
			);
			$content            .= $pagination_nextprev;
			return $content;
		}
		return $content;
	}
endif; // endif gmr_move_post_navigation_second.
add_filter( 'the_content', 'gmr_move_post_navigation_second', 2 );

if ( ! function_exists( 'wpberita_related_post' ) ) {
	/**
	 * Adding the related post to the end of your single post
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function wpberita_related_post() {
		global $post;

		$relatedposts = get_theme_mod( 'gmr_active-relpost', 0 );

		if ( is_singular( 'attachment' ) ) {
			$postids = $post->post_parent;
		} else {
			$postids = $post->ID;
		}
		if ( 0 === $relatedposts ) {
			$numberposts = get_theme_mod( 'gmr_relpost_number', '12' );
			$taxonomy    = get_theme_mod( 'gmr_relpost_taxonomy', 'gmr-category' );

			if ( 'gmr-tags' === $taxonomy ) {
				$tags = wp_get_post_tags( absint( $postids ) );
				if ( $tags ) {
					$tag_ids = array();
					foreach ( $tags as $individual_tag ) {
						$tag_ids[] = $individual_tag->term_id;
						$args      = array(
							'tag__in'             => $tag_ids,
							'post__not_in'        => array( absint( $postids ) ),
							'posts_per_page'      => absint( $numberposts ),
							'ignore_sticky_posts' => 1,
						);
					}
				}
			} elseif ( 'gmr-topics' === $taxonomy ) {
				$topics = wp_get_object_terms( absint( $postids ), 'newstopic', array( 'fields' => 'ids' ) );
				if ( $topics ) {
					$args = array(
						'post__not_in'        => array( absint( $postids ) ),
						'posts_per_page'      => absint( $numberposts ),
						'tax_query'           => array(
							array(
								'taxonomy' => 'newstopic',
								'field'    => 'id',
								'terms'    => $topics,
							),
						),
						'ignore_sticky_posts' => 1,
					);
				}
			} else {
				$categories = get_the_category( absint( $postids ) );
				if ( $categories ) {
					$category_ids = array();
					foreach ( $categories as $individual_category ) {
						$category_ids[] = $individual_category->term_id;
						$args           = array(
							'category__in'        => $category_ids,
							'post__not_in'        => array( absint( $postids ) ),
							'posts_per_page'      => absint( $numberposts ),
							'ignore_sticky_posts' => 1,
						);
					}
				}
			}
			if ( ! isset( $args ) ) {
				$args = '';
			}
			$wpberita_query = new WP_Query( $args );

			if ( $wpberita_query->have_posts() ) {
				echo '<div class="gmr-related-post">';
				echo '<h3 class="related-text">' . esc_attr__( 'Read Also', 'wpberita' ) . '</h3>';
				echo '<div class="wpberita-list-gallery clearfix">';
				while ( $wpberita_query->have_posts() ) :

					$wpberita_query->the_post();
					$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

					echo '<div class="list-gallery related-gallery">';

					if ( ! empty( $featured_image_url ) ) :
						echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail" aria-hidden="true" tabindex="-1" title="' . the_title_attribute(
							array(
								'before' => '',
								'after'  => '',
								'echo'   => false,
							)
						) . '" rel="bookmark">';
						echo get_the_post_thumbnail( $post->ID, 'medium-new' );
						if ( has_post_format( 'video' ) ) {
							echo '<span class="gmr-format gmr-format-video"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1200 1200"><path d="M600 1200C268.65 1200 0 931.35 0 600S268.65 0 600 0s600 268.65 600 600s-268.65 600-600 600zM450 300.45v599.1L900 600L450 300.45z" fill="#626262"/><rect x="0" y="0" width="1200" height="1200" fill="rgba(0, 0, 0, 0)" /></svg></span>';

						} elseif ( has_post_format( 'gallery' ) ) {
							echo '<span class="gmr-format gmr-format-gallery"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M864 260H728l-32.4-90.8a32.07 32.07 0 0 0-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 260H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V340c0-44.2-35.8-80-80-80zM512 716c-88.4 0-160-71.6-160-160s71.6-160 160-160s160 71.6 160 160s-71.6 160-160 160zm-96-160a96 96 0 1 0 192 0a96 96 0 1 0-192 0z" fill="#626262"/><rect x="0" y="0" width="1024" height="1024" fill="rgba(0, 0, 0, 0)" /></svg></span>';
						}
						echo '</a>';
					endif;

						echo '<div class="list-gallery-title">';
						echo '<a href="' . esc_url( get_permalink() ) . '" class="recent-title heading-text" title="' . the_title_attribute(
							array(
								'before' => '',
								'after'  => '',
								'echo'   => false,
							)
						) . '" rel="bookmark">' . wp_kses_post( get_the_title() ) . '</a>';
						echo '</div>';

					echo '</div>';

				endwhile;
				wp_reset_postdata();
				echo '</div>';
				echo '</div>';
			}
		}
	}
}
add_action( 'wpberita_related_post', 'wpberita_related_post', 10 );

if ( ! function_exists( 'wpberita_related_post_second' ) ) {
	/**
	 * Adding the related post to the end of your single post
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function wpberita_related_post_second() {
		global $post;

		$relatedposts = get_theme_mod( 'gmr_active-relpostsecond', 0 );

		if ( is_singular( 'attachment' ) ) {
			$postids = $post->post_parent;
		} else {
			$postids = $post->ID;
		}

		if ( 0 === $relatedposts ) {
			$numberposts = get_theme_mod( 'gmr_relpostsecond_number', '10' );
			$taxonomy    = get_theme_mod( 'gmr_relpostsecond_taxonomy', 'gmr-category' );

			if ( 'gmr-tags' === $taxonomy ) {
				$tags = wp_get_post_tags( absint( $postids ) );
				if ( $tags ) {
					$tag_ids = array();
					foreach ( $tags as $individual_tag ) {
						$tag_ids[] = $individual_tag->term_id;
						$args      = array(
							'tag__in'             => $tag_ids,
							'post__not_in'        => array( absint( $postids ) ),
							'posts_per_page'      => absint( $numberposts ),
							'ignore_sticky_posts' => 1,
						);
					}
				}
			} elseif ( 'gmr-topics' === $taxonomy ) {
				$topics = wp_get_object_terms( absint( $postids ), 'newstopic', array( 'fields' => 'ids' ) );
				if ( $topics ) {
					$args = array(
						'post__not_in'        => array( absint( $postids ) ),
						'posts_per_page'      => absint( $numberposts ),
						'tax_query'           => array(
							array(
								'taxonomy' => 'newstopic',
								'field'    => 'id',
								'terms'    => $topics,
							),
						),
						'ignore_sticky_posts' => 1,
					);
				}
			} else {
				$categories = get_the_category( absint( $postids ) );
				if ( $categories ) {
					$category_ids = array();
					foreach ( $categories as $individual_category ) {
						$category_ids[] = $individual_category->term_id;
						$args           = array(
							'category__in'        => $category_ids,
							'post__not_in'        => array( absint( $postids ) ),
							'posts_per_page'      => absint( $numberposts ),
							'ignore_sticky_posts' => 1,
						);
					}
				}
			}
			if ( ! isset( $args ) ) {
				$args = '';
			}
			$wpberita_query = new WP_Query( $args );

			if ( $wpberita_query->have_posts() ) {
				echo '<div class="gmr-related-post">';
				echo '<h3 class="related-text">' . esc_attr__( 'Related News', 'wpberita' ) . '</h3>';
				echo '<div class="wpberita-list-gallery clearfix">';
				while ( $wpberita_query->have_posts() ) :
					$wpberita_query->the_post();

					echo '<div class="list-gallery">';
						echo '<div class="list-gallery-title">';
						echo '<a href="' . esc_url( get_permalink() ) . '" class="recent-title heading-text" title="' . the_title_attribute(
							array(
								'before' => '',
								'after'  => '',
								'echo'   => false,
							)
						) . '" rel="bookmark">' . wp_kses_post( get_the_title() ) . '</a>';
						echo '</div>';

					echo '</div>';

				endwhile;
				wp_reset_postdata();
				echo '</div>';
				echo '</div>';
			}
		}
	}
}
add_action( 'wpberita_related_post_second', 'wpberita_related_post_second', 10 );

if ( ! function_exists( 'wpberita_related_post_third' ) ) {
	/**
	 * Adding the related post to the end of your single post
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function wpberita_related_post_third() {
		global $post;

		$relatedposts = get_theme_mod( 'gmr_active-relpostthird', 0 );

		if ( is_singular( 'attachment' ) ) {
			$postids = $post->post_parent;
		} else {
			$postids = $post->ID;
		}

		if ( 0 === $relatedposts ) {
			$numberposts = get_theme_mod( 'gmr_relpostthird_number', '4' );
			$taxonomy    = get_theme_mod( 'gmr_relpostthird_taxonomy', 'gmr-category' );

			if ( 'gmr-tags' === $taxonomy ) {
				$tags = wp_get_post_tags( absint( $postids ) );
				if ( $tags ) {
					$tag_ids = array();
					foreach ( $tags as $individual_tag ) {
						$tag_ids[] = $individual_tag->term_id;
						$args      = array(
							'tag__in'             => $tag_ids,
							'post__not_in'        => array( absint( $postids ) ),
							'posts_per_page'      => absint( $numberposts ),
							'ignore_sticky_posts' => 1,
						);
					}
				}
			} elseif ( 'gmr-topics' === $taxonomy ) {
				$topics = wp_get_object_terms( absint( $postids ), 'newstopic', array( 'fields' => 'ids' ) );
				if ( $topics ) {
					$args = array(
						'post__not_in'        => array( absint( $postids ) ),
						'posts_per_page'      => absint( $numberposts ),
						'tax_query'           => array(
							array(
								'taxonomy' => 'newstopic',
								'field'    => 'id',
								'terms'    => $topics,
							),
						),
						'ignore_sticky_posts' => 1,
					);
				}
			} else {
				$categories = get_the_category( absint( $postids ) );
				if ( $categories ) {
					$category_ids = array();
					foreach ( $categories as $individual_category ) {
						$category_ids[] = $individual_category->term_id;
						$args           = array(
							'category__in'        => $category_ids,
							'post__not_in'        => array( absint( $postids ) ),
							'posts_per_page'      => absint( $numberposts ),
							'ignore_sticky_posts' => 1,
						);
					}
				}
			}
			if ( ! isset( $args ) ) {
				$args = '';
			}
			$wpberita_query = new WP_Query( $args );

			if ( $wpberita_query->have_posts() ) {
				echo '<div class="gmr-related-post">';
				echo '<h3 class="related-text">' . esc_attr__( 'Recommendation for You', 'wpberita' ) . '</h3>';
				echo '<div class="wpberita-list-gallery clearfix">';
				while ( $wpberita_query->have_posts() ) :

					$wpberita_query->the_post();
					$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

					echo '<div class="list-gallery related-gallery">';

					if ( ! empty( $featured_image_url ) ) :
						echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail" aria-hidden="true" tabindex="-1" title="' . the_title_attribute(
							array(
								'before' => '',
								'after'  => '',
								'echo'   => false,
							)
						) . '" rel="bookmark">';
						echo get_the_post_thumbnail( $post->ID, 'medium-new' );
						if ( has_post_format( 'video' ) ) {
							echo '<span class="gmr-format gmr-format-video"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1200 1200"><path d="M600 1200C268.65 1200 0 931.35 0 600S268.65 0 600 0s600 268.65 600 600s-268.65 600-600 600zM450 300.45v599.1L900 600L450 300.45z" fill="#626262"/><rect x="0" y="0" width="1200" height="1200" fill="rgba(0, 0, 0, 0)" /></svg></span>';

						} elseif ( has_post_format( 'gallery' ) ) {
							echo '<span class="gmr-format gmr-format-gallery"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M864 260H728l-32.4-90.8a32.07 32.07 0 0 0-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 260H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V340c0-44.2-35.8-80-80-80zM512 716c-88.4 0-160-71.6-160-160s71.6-160 160-160s160 71.6 160 160s-71.6 160-160 160zm-96-160a96 96 0 1 0 192 0a96 96 0 1 0-192 0z" fill="#626262"/><rect x="0" y="0" width="1024" height="1024" fill="rgba(0, 0, 0, 0)" /></svg></span>';
						}
						echo '</a>';
					endif;

						echo '<div class="list-gallery-title">';
						echo '<a href="' . esc_url( get_permalink() ) . '" class="recent-title heading-text" title="' . the_title_attribute(
							array(
								'before' => '',
								'after'  => '',
								'echo'   => false,
							)
						) . '" rel="bookmark">' . wp_kses_post( get_the_title() ) . '</a>';
						echo '</div>';

					echo '</div>';

				endwhile;
				wp_reset_postdata();
				echo '</div>';
				echo '</div>';
			}
		}
	}
}
add_action( 'wpberita_related_post_third', 'wpberita_related_post_third', 10 );

if ( ! function_exists( 'wpberita_list_social' ) ) :
	/**
	 * This function add social icon.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function wpberita_list_social() {
		$fb_url = get_theme_mod( 'gmr_fb_url_icon' );
		if ( $fb_url ) :
			echo '<li><a href="' . esc_url( $fb_url ) . '" title="' . esc_html__( 'Facebook', 'wpberita' ) . '" class="facebook notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M13 9h4.5l-.5 2h-4v9h-2v-9H7V9h4V7.128c0-1.783.186-2.43.534-3.082a3.635 3.635 0 0 1 1.512-1.512C13.698 2.186 14.345 2 16.128 2c.522 0 .98.05 1.372.15V4h-1.372c-1.324 0-1.727.078-2.138.298c-.304.162-.53.388-.692.692c-.22.411-.298.814-.298 2.138V9z" fill="#888888"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$twitter_url = get_theme_mod( 'gmr_twitter_url_icon' );
		if ( $twitter_url ) :
			echo '<li><a href="' . esc_url( $twitter_url ) . '" title="' . esc_html__( 'Twitter', 'wpberita' ) . '" class="twitter notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M80 224.001a136.12 136.12 0 0 1-65.904-17.008a8.008 8.008 0 0 1 3.767-15.006a119.454 119.454 0 0 0 55.93-14.792A136.21 136.21 0 0 1 28.931 35.589a8 8 0 0 1 14.415-2.226a119.686 119.686 0 0 0 76.65 52.24a48.003 48.003 0 0 1 87.12-26.51a120.51 120.51 0 0 0 30.341-6.015a8 8 0 0 1 9.101 12.172a135.61 135.61 0 0 1-30.842 31.607A136.009 136.009 0 0 1 80 224.001zm-30.944-20.048A120.48 120.48 0 0 0 80 208.001A120.003 120.003 0 0 0 199.924 92.309a8 8 0 0 1 3.45-6.301a119.039 119.039 0 0 0 14.69-11.976a136.421 136.421 0 0 1-14.963 1.27a8 8 0 0 1-7.288-4.217a32.014 32.014 0 0 0-59.201 22.173a8.005 8.005 0 0 1-8.905 9.776a135.408 135.408 0 0 1-86.75-46.25A121.28 121.28 0 0 0 40 72.002a120.026 120.026 0 0 0 52.506 99.234a8 8 0 0 1 0 13.222a135.259 135.259 0 0 1-43.45 19.496z" fill="#888888"/><rect x="0" y="0" width="256" height="256" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$pinterest_url = get_theme_mod( 'gmr_pinterest_url_icon' );
		if ( $pinterest_url ) :
			echo '<li><a href="' . esc_url( $pinterest_url ) . '" title="' . esc_html__( 'Pinterest', 'wpberita' ) . '" class="pinterest notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M16.094 4C11.017 4 6 7.383 6 12.861c0 3.483 1.958 5.463 3.146 5.463c.49 0 .774-1.366.774-1.752c0-.46-1.174-1.44-1.174-3.355c0-3.978 3.028-6.797 6.947-6.797c3.37 0 5.864 1.914 5.864 5.432c0 2.627-1.055 7.554-4.47 7.554c-1.231 0-2.284-.89-2.284-2.166c0-1.87 1.197-3.681 1.197-5.611c0-3.276-4.537-2.682-4.537 1.277c0 .831.104 1.751.475 2.508C11.255 18.354 10 23.037 10 26.066c0 .935.134 1.855.223 2.791c.168.188.084.169.341.075c2.494-3.414 2.263-4.388 3.391-8.856c.61 1.158 2.183 1.781 3.43 1.781c5.255 0 7.615-5.12 7.615-9.738C25 7.206 20.755 4 16.094 4z" fill="#888888"/><rect x="0" y="0" width="32" height="32" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$wordpress_url = get_theme_mod( 'gmr_wordpress_url_icon' );
		if ( $wordpress_url ) :
			echo '<li><a href="' . esc_url( $wordpress_url ) . '" title="' . esc_html__( 'WordPress', 'wpberita' ) . '" class="wp notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M16 3C8.828 3 3 8.828 3 16s5.828 13 13 13s13-5.828 13-13S23.172 3 16 3zm0 2.168c2.825 0 5.382 1.079 7.307 2.838c-.042-.001-.083-.012-.135-.012c-1.062 0-1.754.93-1.754 1.928c0 .899.453 1.648 1.006 2.547c.41.715.889 1.646.889 2.978c0 .932-.348 2.004-.825 3.51l-1.07 3.607l-4.066-12.527a23.51 23.51 0 0 0 1.234-.098c.585-.065.52-.931-.065-.898c0 0-1.754.14-2.892.14c-1.061 0-2.85-.14-2.85-.14c-.585-.033-.65.866-.064.898c0 0 .552.065 1.137.098l1.824 5.508l-2.364 7.107L9.215 10.04a23.408 23.408 0 0 0 1.246-.098c.585-.065.51-.931-.065-.898c0 0-1.681.133-2.82.139A10.795 10.795 0 0 1 16 5.168zm9.512 5.633A10.815 10.815 0 0 1 26.832 16a10.796 10.796 0 0 1-5.383 9.36l3.305-9.565c.617-1.538.822-2.774.822-3.879c0-.401-.02-.76-.062-1.105c-.002-.003-.001-.007-.002-.01zm-19.309.584l5.063 14.355A10.797 10.797 0 0 1 5.168 16c0-1.655.377-3.215 1.035-4.615zm9.98 5.558l3.338 9.131a.595.595 0 0 0 .075.139c-1.126.394-2.332.619-3.596.619c-1.067 0-2.094-.159-3.066-.443l3.25-9.446zm-4.787 8.86a10.74 10.74 0 0 1 0 0zm9.02.09zm-7.855.378a10.713 10.713 0 0 1 0 0z" fill="#888888"/><rect x="0" y="0" width="32" height="32" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$instagram_url = get_theme_mod( 'gmr_instagram_url_icon' );
		if ( $instagram_url ) :
			echo '<li><a href="' . esc_url( $instagram_url ) . '" title="' . esc_html__( 'Instagram', 'wpberita' ) . '" class="instagram notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M128 80a48 48 0 1 0 48 48a48.054 48.054 0 0 0-48-48zm0 80a32 32 0 1 1 32-32a32.036 32.036 0 0 1-32 32zm44-132H84a56.064 56.064 0 0 0-56 56v88a56.064 56.064 0 0 0 56 56h88a56.064 56.064 0 0 0 56-56V84a56.064 56.064 0 0 0-56-56zm40 144a40.045 40.045 0 0 1-40 40H84a40.045 40.045 0 0 1-40-40V84a40.045 40.045 0 0 1 40-40h88a40.045 40.045 0 0 1 40 40zm-20-96a12 12 0 1 1-12-12a12 12 0 0 1 12 12z" fill="#888888"/><rect x="0" y="0" width="256" height="256" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$reddit_url = get_theme_mod( 'gmr_reddit_url_icon' );
		if ( $reddit_url ) :
			echo '<li><a href="' . esc_url( $reddit_url ) . '" title="' . esc_html__( 'Reddit', 'wpberita' ) . '" class="reddit notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M18.656 4C16.56 4 15 5.707 15 7.656v3.375c-2.758.145-5.258.875-7.281 2.031C6.945 12.316 5.914 12 4.906 12c-1.09 0-2.199.355-2.968 1.219v.031l-.032.031c-.738.922-1.039 2.153-.843 3.375a4.444 4.444 0 0 0 1.968 3C3.023 19.77 3 19.883 3 20c0 2.605 1.574 4.887 3.938 6.469C9.3 28.05 12.488 29 16 29c3.512 0 6.7-.95 9.063-2.531C27.425 24.887 29 22.605 29 20c0-.117-.023-.23-.031-.344a4.444 4.444 0 0 0 1.968-3c.196-1.222-.105-2.453-.843-3.375l-.032-.031c-.769-.863-1.878-1.25-2.968-1.25c-1.008 0-2.04.316-2.813 1.063c-2.023-1.157-4.523-1.887-7.281-2.032V7.656C17 6.676 17.559 6 18.656 6c.52 0 1.164.246 2.157.594c.843.297 1.937.625 3.343.718C24.496 8.29 25.414 9 26.5 9C27.875 9 29 7.875 29 6.5S27.875 4 26.5 4c-.945 0-1.762.535-2.188 1.313c-1.199-.07-2.066-.32-2.843-.594C20.566 4.402 19.734 4 18.656 4zM16 13c3.152 0 5.965.867 7.938 2.188C25.91 16.508 27 18.203 27 20c0 1.797-1.09 3.492-3.063 4.813C21.965 26.133 19.152 27 16 27s-5.965-.867-7.938-2.188C6.09 23.492 5 21.797 5 20c0-1.797 1.09-3.492 3.063-4.813C10.034 13.867 12.848 13 16 13zM4.906 14c.38 0 .754.094 1.063.25c-1.086.91-1.93 1.992-2.438 3.188a2.356 2.356 0 0 1-.469-1.094c-.109-.672.086-1.367.407-1.782c.004-.007-.004-.023 0-.03c.304-.321.844-.532 1.437-.532zm22.188 0c.593 0 1.133.21 1.437.531c.004.004-.004.028 0 .031c.32.415.516 1.11.407 1.782c-.063.39-.215.773-.47 1.093c-.507-1.195-1.35-2.277-2.437-3.187c.309-.156.684-.25 1.063-.25zM11 16a1.999 1.999 0 1 0 0 4a1.999 1.999 0 1 0 0-4zm10 0a1.999 1.999 0 1 0 0 4a1.999 1.999 0 1 0 0-4zm.25 5.531c-1.148 1.067-3.078 1.75-5.25 1.75s-4.102-.691-5.25-1.625C11.39 23.391 13.445 25 16 25s4.61-1.602 5.25-3.469z" fill="#888888"/><rect x="0" y="0" width="32" height="32" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$linkedin_url = get_theme_mod( 'gmr_linkedin_url_icon' );
		if ( $linkedin_url ) :
			echo '<li><a href="' . esc_url( $linkedin_url ) . '" title="' . esc_html__( 'Linkedin', 'wpberita' ) . '" class="linkedin notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 9.55C12.917 8.613 14.111 8 15.5 8a5.5 5.5 0 0 1 5.5 5.5V21h-2v-7.5a3.5 3.5 0 0 0-7 0V21h-2V8.5h2v1.05zM5 6.5a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3zm-1 2h2V21H4V8.5z" fill="#888888"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$youtube_url = get_theme_mod( 'gmr_youtube_url_icon' );
		if ( $youtube_url ) :
			echo '<li><a href="' . esc_url( $youtube_url ) . '" title="' . esc_html__( 'Youtube', 'wpberita' ) . '" class="youtube notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M19.606 6.995c-.076-.298-.292-.523-.539-.592C18.63 6.28 16.5 6 12 6s-6.628.28-7.069.403c-.244.068-.46.293-.537.592C4.285 7.419 4 9.196 4 12s.285 4.58.394 5.006c.076.297.292.522.538.59C5.372 17.72 7.5 18 12 18s6.629-.28 7.069-.403c.244-.068.46-.293.537-.592C19.715 16.581 20 14.8 20 12s-.285-4.58-.394-5.005zm1.937-.497C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5v-7l6 3.5l-6 3.5z" fill="#888888"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$twitch_url = get_theme_mod( 'gmr_twitch_url_icon' );
		if ( $twitch_url ) :
			echo '<li><a href="' . esc_url( $twitch_url ) . '" title="' . esc_html__( 'Twitch', 'wpberita' ) . '" class="twitch notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M4.3 3H21v11.7l-4.7 4.7h-3.9l-2.5 2.4H7v-2.4H3V6.2L4.3 3zM5 17.4h4v2.4h.095l2.5-2.4h3.877L19 13.872V5H5v12.4zM15 8h2v4.7h-2V8zm0 0h2v4.7h-2V8zm-5 0h2v4.7h-2V8z" fill="#888888"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$spotify_url = get_theme_mod( 'gmr_spotify_url_icon' );
		if ( $spotify_url ) :
			echo '<li><a href="' . esc_url( $spotify_url ) . '" title="' . esc_html__( 'Spotify', 'wpberita' ) . '" class="spotify notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.062em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M418 311q123 3 214 20.5T802 389q15 7 26 15.5t15 18.5t2 26.5t-10 21.5q-5 4-12.5 6.5t-15 4t-15 .5t-13.5-3q-156-81-360-73q-53 2-151 21q-56 11-68-31q-5-16 .5-29t17-19.5T245 338q18-4 173-27zm23 152q87 6 164 25.5T750 547q4 2 9 6t9 9t7.5 10.5t5.5 11t2 10.5q2 22-19 28.5t-48-7.5q-176-93-390-57q-3 0-20 5.5t-25 3.5q-3-1-6.5-2t-6.5-2.5l-6-3l-6-3.5l-6.5-4l-6-3.5l-6-3.5l-6.5-3q3-5 9-17.5t11.5-20T263 496q26-7 54-12t68.5-11.5T441 463zm-21 153q170 3 278 64q10 5 15.5 9.5t11.5 11t5 14.5t-8 16q-5 8-24 9t-29-5q-131-70-317-47q-7 1-17.5 3.5T315 696t-17 1t-15.5-4t-18-8.5T250 677q2-4 6-9t6.5-9.5t6-9t7.5-7.5t7-4q24-5 49.5-9.5t54.5-8t33-4.5zm604-104q0 212-150 362t-362 150t-362-150T0 512t150-362q25-25 51.5-46t55-37.5t59-29t62-21T443 4t69-4q212 0 362 150t150 362zm-64 0q0-186-131-317T512 64T195 195T64 512t131 318t317 132t317-132t131-318z" fill="#888888"/><rect x="0" y="0" width="1024" height="1024" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		$whatsapp_url = get_theme_mod( 'gmr_whatsapp_url_icon' );
		if ( $whatsapp_url ) :
			echo '<li><a href="' . esc_url( $whatsapp_url ) . '" title="' . esc_html__( 'WhatsApp', 'wpberita' ) . '" class="whatsapp notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M414.73 97.1A222.14 222.14 0 0 0 256.94 32C134 32 33.92 131.58 33.87 254a220.61 220.61 0 0 0 29.78 111L32 480l118.25-30.87a223.63 223.63 0 0 0 106.6 27h.09c122.93 0 223-99.59 223.06-222A220.18 220.18 0 0 0 414.73 97.1zM256.94 438.66h-.08a185.75 185.75 0 0 1-94.36-25.72l-6.77-4l-70.17 18.32l18.73-68.09l-4.41-7A183.46 183.46 0 0 1 71.53 254c0-101.73 83.21-184.5 185.48-184.5a185 185 0 0 1 185.33 184.64c-.04 101.74-83.21 184.52-185.4 184.52zm101.69-138.19c-5.57-2.78-33-16.2-38.08-18.05s-8.83-2.78-12.54 2.78s-14.4 18-17.65 21.75s-6.5 4.16-12.07 1.38s-23.54-8.63-44.83-27.53c-16.57-14.71-27.75-32.87-31-38.42s-.35-8.56 2.44-11.32c2.51-2.49 5.57-6.48 8.36-9.72s3.72-5.56 5.57-9.26s.93-6.94-.46-9.71s-12.54-30.08-17.18-41.19c-4.53-10.82-9.12-9.35-12.54-9.52c-3.25-.16-7-.2-10.69-.2a20.53 20.53 0 0 0-14.86 6.94c-5.11 5.56-19.51 19-19.51 46.28s20 53.68 22.76 57.38s39.3 59.73 95.21 83.76a323.11 323.11 0 0 0 31.78 11.68c13.35 4.22 25.5 3.63 35.1 2.2c10.71-1.59 33-13.42 37.63-26.38s4.64-24.06 3.25-26.37s-5.11-3.71-10.69-6.48z" fill-rule="evenodd" fill="#888888"/><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;

		// Disable rss icon via customizer.
		$rssicon = get_theme_mod( 'gmr_active-rssicon', 0 );
		if ( 0 === $rssicon ) :
			echo '<li><a href="' . esc_url( get_bloginfo( 'rss2_url' ) ) . '" title="' . esc_html__( 'RSS', 'wpberita' ) . '" class="rss notrename" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M5.996 19.97a1.996 1.996 0 1 1 0-3.992a1.996 1.996 0 0 1 0 3.992zm-.876-7.993a.998.998 0 0 1-.247-1.98a8.103 8.103 0 0 1 9.108 8.04v.935a.998.998 0 1 1-1.996 0v-.934a6.108 6.108 0 0 0-6.865-6.06zM4 5.065a.998.998 0 0 1 .93-1.063c7.787-.519 14.518 5.372 15.037 13.158c.042.626.042 1.254 0 1.88a.998.998 0 1 1-1.992-.133c.036-.538.036-1.077 0-1.614c-.445-6.686-6.225-11.745-12.91-11.299A.998.998 0 0 1 4 5.064z" fill="#888888"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg></a></li>';
		endif;
	}
endif; /* endif wpberita_list_social */
add_action( 'social_icon', 'wpberita_list_social', 5 );

if ( ! function_exists( 'wpberita_topnav_icon' ) ) :
	/**
	 * This function add dark menu icon and other icon.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function wpberita_topnav_icon() {
		if ( ! wpberita_is_amp() ) {
			global $is_IE;
			if ( ! $is_IE ) {
				// Dark Mode.
				$darkmodebuttondisable = get_theme_mod( 'gmr_active-darkmode', 0 );
				if ( 0 === $darkmodebuttondisable ) {
					echo '<a class="darkmode-button topnav-button" title="' . esc_html__( 'Dark Mode', 'wpberita' ) . '" href="#" rel="nofollow">';
					echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="0.95em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 17"><g fill="#888888" fill-rule="evenodd"><path d="M10.705 13.274A6.888 6.888 0 0 1 6.334 1.065C2.748 1.892.072 5.099.072 8.936a8.084 8.084 0 0 0 8.084 8.085c3.838 0 7.043-2.676 7.871-6.263a6.868 6.868 0 0 1-5.322 2.516z"/><path d="M12.719 1.021l1.025 2.203l2.293.352l-1.658 1.715l.391 2.42l-2.051-1.143l-2.051 1.143l.391-2.42l-1.661-1.715l2.294-.352l1.027-2.203z"/></g></svg>';
					echo '</a>';
				}
			}
		}
		// Option remove search button.
		$setting    = 'gmr_active-searchbutton';
		$mod_search = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
		if ( 0 === $mod_search ) {
			if ( wpberita_is_amp() ) {
				echo '<div class="gmr-search-btn">
					<amp-state id="navSearchExpanded">
						<script type="application/json">false</script>
					</amp-state>
					<button id="search-menu-button" class="topnav-button gmr-search-icon" on="tap:AMP.setState( { navSearchExpanded: ! navSearchExpanded } )" [class]="\'topnav-button gmr-search-icon\' + ( navSearchExpanded ? \' toggled-on\' : \'\' )" rel="nofollow"><div class="ktz-is-wrap"><span class="ktz-is"></span><span class="ktz-is"></span></div></button>
					<div [class]="\'hidesearch\' + ( navSearchExpanded ? \' toggled-on\' : \'\' )" id="search-dropdown-container" class="hidesearch">
					<form method="get" class="gmr-searchform searchform" action="' . esc_url( home_url( '/' ) ) . '">
						<input type="text" name="s" id="s" placeholder="' . esc_html__( 'Search News', 'wpberita' ) . '" />
						<button type="submit" class="gmr-search-submit gmr-search-icon"><div class="ktz-is-wrap"><span class="ktz-is"></span><span class="ktz-is"></span></div></button>
					</form>
					</div>
				</div>';
			} else {
				echo '<div class="gmr-search-btn">
					<a id="search-menu-button" class="topnav-button gmr-search-icon" href="#" rel="nofollow"><div class="ktz-is-wrap"><span class="ktz-is"></span><span class="ktz-is"></span></div></a>
					<div id="search-dropdown-container" class="search-dropdown search">
					<form method="get" class="gmr-searchform searchform" action="' . esc_url( home_url( '/' ) ) . '">
						<input type="text" name="s" id="s" placeholder="' . esc_html__( 'Search News', 'wpberita' ) . '" />
						<button type="submit" class="gmr-search-submit gmr-search-icon"><div class="ktz-is-wrap"><span class="ktz-is"></span><span class="ktz-is"></span></div></button>
					</form>
					</div>
				</div>';
			}
		}
	}
endif; /* endif wpberita_topnav_icon */
add_action( 'wpberita_topnav_icon', 'wpberita_topnav_icon', 10 );
