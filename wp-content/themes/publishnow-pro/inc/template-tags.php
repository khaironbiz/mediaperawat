<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 */

if ( ! function_exists( 'publishnow_site_branding' ) ) :
	/**
	 * Site branding for the site.
	 *
	 * Display site title by default, but user can change it with their custom logo.
	 * They can upload it on Customizer page.
	 */
	function publishnow_site_branding() {

		// Get the logo.
		$logo_id  = get_theme_mod( 'custom_logo' );
		$logo_url = wp_get_attachment_image_src( $logo_id , 'full' );

		// Retina logo.
		$retina_id  = get_theme_mod( 'publishnow_retina_logo' );
		$retina_url = wp_get_attachment_image_src( $retina_id , 'full' );

		// Check if logo available, then display it.
		if ( $logo_id ) :
			echo '<div class="site-branding">'. "\n";
				echo '<div class="logo">';
					echo '<a href="' . esc_url( get_home_url() ) . '" rel="home">' . "\n";
						if ( empty( $retina_id ) ):
							echo '<img src="' . esc_url( $logo_url[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
						else :
							echo '<img
						      srcset="' . esc_url( $retina_url[0] ) . ' 2x"
						      src="' . esc_url( $logo_url[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
						endif;
					echo '</a>' . "\n";
				echo '</div>' . "\n";
			echo '</div>' . "\n";

		// If not, then display the Site Title and Site Description.
		else :
			echo '<div class="site-branding">'. "\n";
				echo '<h1 class="site-title"><a href="' . esc_url( get_home_url() ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>'. "\n";
			echo '</div>'. "\n";
		endif;

	}
endif;

if ( ! function_exists( 'publishnow_footer_branding' ) ) :
	/**
	 * Custom footer logo
	 */
	function publishnow_footer_branding() {

		// Get the logo.
		$logo_id  = get_theme_mod( 'publishnow_footer_logo' );
		$logo_url = wp_get_attachment_image_src( $logo_id , 'full' );

		// Retina logo.
		$retina_id  = get_theme_mod( 'publishnow_retina_footer_logo' );
		$retina_url = wp_get_attachment_image_src( $retina_id , 'full' );
		$retina = '';

		if ( $retina_id ) {
			$retina = 'data-rjs=' . esc_url( $retina_url[0] ) . '';
		}

		// Check if logo available, then display it.
		if ( $logo_id ) :
			echo '<div class="footer-branding">'. "\n";
				echo '<a href="' . esc_url( get_home_url() ) . '" rel="home">' . "\n";
					echo '<img src="' . esc_url( $logo_url[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" ' . $retina . ' />' . "\n";
				echo '</a>' . "\n";
			echo '</div>' . "\n";
		endif;

	}
endif;

if ( ! function_exists( 'publishnow_header_ad' ) ) :
	/**
	 * Header ad
	 */
	function publishnow_header_ad() {

		// Get the customizer data.
		$img_id = get_theme_mod( 'publishnow_ad_img' );
		$url    = get_theme_mod( 'publishnow_ad_url' );
		$code   = get_theme_mod( 'publishnow_ad_custom' );

		// Get the image url
		$img_url = wp_get_attachment_image_src( $img_id , 'full' );
		?>
		<div class="header-ad">
			<?php if ( $code ) : ?>
				<?php echo wp_kses_post( $code ); ?>
			<?php elseif ( $img_url || $url ) : ?>
				<a href="<?php echo esc_url( $url ); ?>"><img src="<?php echo esc_url( $img_url[0] ) ?>"></a>
			<?php endif; ?>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'publishnow_trending' ) ) :
	/**
	 * Trending posts
	 */
	function publishnow_trending() {

		// Get the data set in customizer
		$enable  = get_theme_mod( 'publishnow_trending_enable', 1 );
		$title   = get_theme_mod( 'publishnow_trending_title', esc_html__( 'Trending Now', 'publishnow' ) );
		$time    = get_theme_mod( 'publishnow_trending_time', 'all' );
		$number  = get_theme_mod( 'publishnow_trending_number', 4 );

		// Disable if user choose it.
		if ( !$enable ) {
			return;
		}

		// Disable on cover template
		if ( is_page_template( 'templates/cover.php' ) || is_page_template( 'templates/elementor.php' ) ) {
			return;
		}

		// Posts query arguments.
		$query = array(
			'meta_key'            => 'post_views',
			'orderby'             => 'meta_value_num',
			'posts_per_page'      => absint( $number ),
			'ignore_sticky_posts' => 1,
		);

		if ( is_single() ) {
			$query['post__not_in'] = array( get_the_ID() );
		}

		// Get the date
		$today = getdate();

		if ( $time == 'today' ) {
			$query['date_query'] = array(
				array(
					'year'  => $today['year'],
					'month' => $today['mon'],
					'day'   => $today['mday'],
				),
			);
		}

		if ( $time == 'week' ) {
			$query['date_query'] = array(
				array(
					'year' => $today['year'],
					'week' => date( 'W' ),
				),
			);
		}

		if ( $time == 'month' ) {
			$query['date_query'] = array(
				array(
					'year'  => $today['year'],
					'month' => $today['mon'],
				),
			);
		}

		// Allow dev to filter the query.
		$args = apply_filters( 'publishnow_trending_args', $query );

		// The post query
		$trending = new WP_Query( $args );

		if ( $trending->have_posts() ) : ?>

			<div class="trending">
				<div class="container">

					<div class="trending-title block-title"><?php echo esc_html( $title ); ?></div>
					<div class="posts">

						<?php while ( $trending->have_posts() ) : $trending->the_post(); ?>

							<article class="post-layout-grid-four">

								<div class="content">
									<header class="entry-header">
										<?php publishnow_post_header(); ?>
									</header>
								</div>

							</article><!-- #post-## -->

						<?php endwhile; ?>

					</div>
				</div>
			</div>

		<?php endif;

		// Restore original Post Data.
		wp_reset_postdata();

	}
endif;

if ( ! function_exists( 'publishnow_post_cover' ) ) :
	/**
	 * Post cover
	 */
	function publishnow_post_cover() {

		// If not cover template, disable it!
		if ( !is_page_template( 'templates/cover.php' ) ) {
			return;
		}

		?>
		<div class="post-cover">
			<div class="container">

				<div class="post-cover-format">
					<?php if ( has_post_format( 'video' ) ) : ?>
						<div class="entry-format">
							<?php echo hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true ) ); ?>
						</div>
					<?php elseif ( has_post_format( 'audio' ) ) : ?>
						<div class="entry-format">
							<?php echo hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true ) ); ?>
						</div>
					<?php elseif ( ! has_post_format( 'quote' ) ) : ?>
						<div class="thumbnail">
							<?php publishnow_post_thumbnail( 'publishnow-post-large' ); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'publishnow_post_header' ) ) :
	/**
	 * Post categories and post title.
	 */
	function publishnow_post_header() {
		?>
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'publishnow' ) );
				if ( $categories_list ) :
			?>
				<span class="cat-links">
					<?php echo $categories_list; ?>
				</span>
			<?php endif; // End if categories ?>
		<?php endif; ?>

		<?php the_title(
			sprintf(
				'<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'
			);
		?>

		<?php
	}
endif;

if ( ! function_exists( 'publishnow_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function publishnow_post_thumbnail( $size = 'thumbnail' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$enable_caption = get_theme_mod( 'publishnow_thumbnail_caption', 1 );

		if ( is_single() ) :
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail( $size ); ?>
			<?php if ( $enable_caption && $caption = get_post( get_post_thumbnail_id() ) ) : ?>
				<span class="caption"><?php echo esc_html( $caption->post_excerpt ); ?></span>
			<?php endif; ?>
		</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php
				the_post_thumbnail( $size, array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
			<?php if ( $enable_caption && $caption = get_post( get_post_thumbnail_id() ) ) : ?>
				<span class="caption"><?php echo esc_html( $caption->post_excerpt ); ?></span>
			<?php endif; ?>
			<?php publishnow_post_format_icon(); ?>
		</a>

		<?php endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'publishnow_post_format_icon' ) ) :
	/**
	 * Post formats icon
	 */
	function publishnow_post_format_icon() {

		if ( !has_post_format() ) {
			return;
		}

		?>
		<span class="format-icon">
			<?php if ( has_post_format( 'video' ) ) : ?>
				<?php echo publishnow_get_icon_svg( 'play' ); ?>
			<?php elseif ( has_post_format( 'image' ) ) : ?>
				<?php echo publishnow_get_icon_svg( 'image' ); ?>
			<?php elseif ( has_post_format( 'audio' ) ) : ?>
				<?php echo publishnow_get_icon_svg( 'headset' ); ?>
			<?php endif; ?>
		</span>
		<?php
	}
endif;

if ( ! function_exists( 'publishnow_post_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function publishnow_post_meta() {

		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( 'M d, Y' ) )
		);

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'publishnow_social_share' ) ) :
	/**
	 * Display social share buttons.
	 */
	function publishnow_social_share() {

		// Get the data set in customizer
		$share = get_theme_mod( 'publishnow_post_share', 1 );

		// Check if user choose to show or hide it.
		if ( !$share ) {
			return;
		}
		?>
			<div class="post-share">
				<ul>
					<li class="twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( esc_attr( get_the_title( get_the_ID() ) ) ); ?>&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><?php echo publishnow_get_social_icon_svg( 'twitter' ); ?><span class="screen-reader-text">Twitter</span></a></li>
					<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><?php echo publishnow_get_social_icon_svg( 'facebook' ); ?><span class="screen-reader-text">Facebook</span></a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;title=<?php echo urlencode( esc_attr( get_the_title( get_the_ID() ) ) ); ?>" target="_blank"><?php echo publishnow_get_social_icon_svg( 'linkedin' ); ?><span class="screen-reader-text">LinkedIn</span></a></li>
					<li class="pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" target="_blank"><?php echo publishnow_get_social_icon_svg( 'pinterest' ); ?><span class="screen-reader-text">Pinterest</span></a></li>
					<li class="email"><a href="mailto:?subject=<?php echo esc_url( urlencode( '[' . get_bloginfo( 'name' ) . '] ' . get_the_title( get_the_ID() ) ) ); ?>&amp;body=<?php echo esc_url( urlencode( get_permalink( get_the_ID() ) ) ); ?>"><?php echo publishnow_get_icon_svg( 'mail' ); ?><span class="screen-reader-text">Email</span></a></li>
				</ul>
			</div>
		<?php
	}
endif;

if ( ! function_exists( 'publishnow_post_author_box' ) ) :
	/**
	 * Author post informations.
	 */
	function publishnow_post_author_box() {

		// Get the data set in customizer
		$enable = get_theme_mod( 'publishnow_author_box', 1 );

		// Disable if user choose it.
		if ( !$enable ) {
			return;
		}

		// Bail if not on the single post.
		if ( ! is_single() ) {
			return;
		}

		// Bail if not in 'post' type
		if ( 'post' != get_post_type() ) {
			return;
		}

		// Bail if user hasn't fill the Biographical Info field.
		if ( ! get_the_author_meta( 'description' ) ) {
			return;
		}

		// Get the author social information.
		$url       = get_the_author_meta( 'url' );
		$twitter   = get_the_author_meta( 'twitter' );
		$facebook  = get_the_author_meta( 'facebook' );
		$gplus     = get_the_author_meta( 'gplus' );
		$instagram = get_the_author_meta( 'instagram' );
		$pinterest = get_the_author_meta( 'pinterest' );
		$linkedin  = get_the_author_meta( 'linkedin' );
	?>

		<div class="author-bio">

			<div class="author-avatar">
				<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'publishnow_author_bio_avatar_size', 120 ), '', strip_tags( get_the_author() ) ); ?>
			</div>

			<div class="description">

				<h3 class="author-title name">
					<a class="author-name url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo strip_tags( get_the_author() ); ?></a>
				</h3>

				<p class="bio"><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>

				<?php if ( $url || $twitter || $facebook || $gplus || $instagram || $pinterest || $linkedin ) : ?>
					<div class="author-social-links">
						<?php if ( $url ) { ?>
							<a href="<?php echo esc_url( $url ); ?>"><i class="fa fa-home"></i></a>
						<?php } ?>
						<?php if ( $twitter ) { ?>
							<a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a>
						<?php } ?>
						<?php if ( $facebook ) { ?>
							<a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a>
						<?php } ?>
						<?php if ( $gplus ) { ?>
							<a href="<?php echo esc_url( $gplus ); ?>"><i class="fa fa-google-plus"></i></a>
						<?php } ?>
						<?php if ( $instagram ) { ?>
							<a href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram"></i></a>
						<?php } ?>
						<?php if ( $pinterest ) { ?>
							<a href="<?php echo esc_url( $pinterest ); ?>"><i class="fa fa-pinterest"></i></a>
						<?php } ?>
						<?php if ( $linkedin ) { ?>
							<a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a>
						<?php } ?>
					</div>
				<?php endif; ?>

			</div>

		</div><!-- .author-bio -->

	<?php
	}
endif;

if ( ! function_exists( 'publishnow_next_prev_post' ) ) :
	/**
	 * Custom next post link
	 *
	 * @since 1.0.0
	 */
	function publishnow_next_prev_post() {

		// Get the data set in customizer
		$nav  = get_theme_mod( 'publishnow_next_prev_post', 1 );

		if ( !$nav ) {
			return;
		}

		// Display on single post page.
		if ( ! is_single() ) {
			return;
		}

		// Get the next and previous post id.
		$next = get_adjacent_post( false, '', false );
		$prev = get_adjacent_post( false, '', true );
	?>
		<div class="post-pagination">

			<?php if ( $prev ) : ?>
				<div class="prev-post">

					<div class="post-detail">
						<span><span class="arrow"><?php echo publishnow_get_icon_svg( 'chevron_left' ); ?></span><?php esc_html_e( 'Don\'t Miss it', 'publishnow' ); ?></span>
						<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="post-title"><?php echo esc_attr( get_the_title( $prev->ID ) ); ?></a>
					</div>

				</div>
			<?php endif; ?>

			<?php if ( $next ) : ?>
				<div class="next-post">

					<div class="post-detail">
						<span><?php esc_html_e( 'Up Next', 'publishnow' ); ?><span class="arrow"><?php echo publishnow_get_icon_svg( 'chevron_right' ); ?></span></span>
						<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="post-title"><?php echo esc_attr( get_the_title( $next->ID ) ); ?></a>
					</div>

				</div>
			<?php endif; ?>

		</div>
	<?php
	}
endif;

if ( ! function_exists( 'publishnow_related_posts' ) ) :
	/**
	 * Related posts.
	 */
	function publishnow_related_posts() {

		// Get the data set in customizer
		$enable  = get_theme_mod( 'publishnow_related_posts', 1 );
		$title   = get_theme_mod( 'publishnow_related_posts_title', esc_html__( 'You Might Also Like', 'publishnow' ) );
		$number  = get_theme_mod( 'publishnow_related_posts_number', 6 );

		// Disable if user choose it.
		if ( !$enable ) {
			return;
		}

		// Get the taxonomy terms of the current page for the specified taxonomy.
		$terms = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

		// Bail if the term empty.
		if ( empty( $terms ) ) {
			return;
		}

		// Posts query arguments.
		$query = array(
			'post__not_in' => array( get_the_ID() ),
			'tax_query'    => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'id',
					'terms'    => $terms,
					'operator' => 'IN'
				)
			),
			'posts_per_page' => absint( $number ),
			'post_type'      => 'post',
		);

		// Allow dev to filter the query.
		$args = apply_filters( 'publishnow_related_posts_args', $query );

		// The post query
		$related = new WP_Query( $args );

		if ( $related->have_posts() ) : ?>

			<div class="related-posts">
				<h3 class="related-posts-title"><?php echo wp_kses_post( $title ); ?></h3>
				<div class="posts">
					<?php while ( $related->have_posts() ) : $related->the_post(); ?>
						<article class="post-layout-grid-two">

							<div class="thumbnail">
								<?php publishnow_post_thumbnail( 'publishnow-post' ); ?>
							</div>

							<div class="content">
								<header class="entry-header">
									<?php publishnow_post_header(); ?>
								</header>

								<div class="entry-summary">
									<?php the_excerpt(); ?>
								</div>

								<div class="post-meta">
									<?php publishnow_post_meta(); ?>
								</div>
							</div>

						</article><!-- #post-## -->

					<?php endwhile; ?>
				</div>
			</div>

		<?php endif;

		// Restore original Post Data.
		wp_reset_postdata();

	}
endif;

if ( ! function_exists( 'publishnow_random_posts' ) ) :
	/**
	 * Random posts.
	 */
	function publishnow_random_posts() {

		// Get the data set in customizer
		$enable  = get_theme_mod( 'publishnow_random_posts', 1 );
		$title   = get_theme_mod( 'publishnow_random_posts_title', esc_html__( 'Random Posts', 'publishnow' ) );
		$number  = get_theme_mod( 'publishnow_random_posts_number', 6 );

		// Disable if user choose it.
		if ( !$enable ) {
			return;
		}

		// Bail if not in 'post' type
		if ( 'post' != get_post_type() ) {
			return;
		}

		// Posts query arguments.
		$query = array(
			'post__not_in'   => array( get_the_ID() ),
			'posts_per_page' => $number,
			'post_type'      => 'post',
			'orderby'        => 'rand'
		);

		// Allow dev to filter the query.
		$args = apply_filters( 'publishnow_random_posts_args', $query );

		// The post query
		$random = new WP_Query( $args );

		if ( $random->have_posts() ) : ?>

			<div class="random-posts ">
				<h3 class="random-posts-title block-title"><?php echo wp_kses_post( $title ); ?></h3>
				<div class="posts">
					<?php while ( $random->have_posts() ) : $random->the_post(); ?>

						<article class="post-layout-grid-three">

							<div class="thumbnail">
								<?php publishnow_post_thumbnail( 'publishnow-post' ); ?>
							</div>

							<div class="content">
								<header class="entry-header">
									<?php publishnow_post_header(); ?>
								</header>

								<div class="entry-summary">
									<?php the_excerpt(); ?>
								</div>

								<div class="post-meta">
									<?php publishnow_post_meta(); ?>
								</div>
							</div>

						</article><!-- #post-## -->

					<?php endwhile; ?>
				</div>
			</div>

		<?php endif;

		// Restore original Post Data.
		wp_reset_postdata();

	}
endif;

if ( ! function_exists( 'publishnow_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	function publishnow_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment-container">
				<p><?php esc_html_e( 'Pingback:', 'publishnow' ); ?> <span><?php comment_author_link(); ?></span> <?php edit_comment_link( esc_html__( '(Edit)', 'publishnow' ), '<span class="edit-link">', '</span>' ); ?></p>
			</article>
		<?php
				break;
			default :
			// Proceed with normal comments.
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment-container">

				<div class="comment-avatar">
					<?php echo get_avatar( $comment, apply_filters( 'publishnow_comment_avatar_size', 80 ) ); ?>
					<span class="name"><?php echo get_comment_author_link(); ?></span>
					<?php echo publishnow_comment_author_badge(); ?>
				</div>

				<div class="comment-body">
					<div class="comment-wrapper">

						<div class="comment-head">
							<?php
								$edit_comment_link = '';
								if ( get_edit_comment_link() )
									$edit_comment_link = sprintf( esc_html__( '&middot; %1$sEdit%2$s', 'publishnow' ), '<a href="' . get_edit_comment_link() . '" title="' . esc_attr__( 'Edit Comment', 'publishnow' ) . '">', '</a>' );

								printf( '<span class="date"><a href="%1$s"><time datetime="%2$s">%3$s</time></a> %4$s</span>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* translators: 1: date, 2: time */
									sprintf( esc_html__( '%1$s at %2$s', 'publishnow' ), get_comment_date(), get_comment_time() ),
									$edit_comment_link
								);
							?>
						</div><!-- comment-head -->

						<div class="comment-content comment-entry">
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'publishnow' ); ?></p>
							<?php endif; ?>
							<?php comment_text(); ?>
							<span class="reply">
								<?php comment_reply_link( array_merge( $args, array( 'reply_text' => wp_kses_post( __( '<i class="fa fa-reply"></i> Reply', 'publishnow' ) ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</span><!-- .reply -->
						</div><!-- .comment-content -->

					</div>
				</div>

			</article><!-- #comment-## -->
		<?php
			break;
		endswitch; // end comment_type check
	}
endif;

if ( ! function_exists( 'publishnow_comment_author_badge' ) ) :
	/**
	 * Custom badge for post author comment
	 */
	function publishnow_comment_author_badge() {

		// Set up empty variable
		$output = '';

		// Get comment classes
		$classes = get_comment_class();

		if ( in_array( 'bypostauthor', $classes ) ) {
			$output = '<span class="author-badge">' . esc_html__( 'Author', 'publishnow' ) . '</span>';
		}

		// Display the badge
		return apply_filters( 'publishnow_comment_author_badge', $output );
	}
endif;

if ( ! function_exists( 'publishnow_footer_text' ) ) :
	/**
	 * Footer text.
	 */
	function publishnow_footer_text() {

		// Get the customizer data
		$default = '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed and Developed by <a href="https://www.happythemes.com/">HappyThemes</a>';
		$footer_text = get_theme_mod( 'publishnow_footer_credits', $default );

		// Display the data
		echo '<p class="copyright">' . wp_kses_post( $footer_text ) . '</p>';

	}
endif;
