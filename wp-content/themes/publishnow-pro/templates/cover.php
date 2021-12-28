<?php
/*
Template Name: Cover
Template Post Type: post
*/
get_header(); ?>

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="content">

							<?php publishnow_social_share(); ?>

							<div class="post-content">

								<?php the_content(); ?>
								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'publishnow' ),
										'after'  => '</div>',
									) );
								?>

								<?php
									$tags   = get_the_tags();
									$enable = get_theme_mod( 'publishnow_post_tags', 1 );
									$title  = get_theme_mod( 'publishnow_post_tags_title', esc_html__( 'Topics', 'publishnow' ) );
									if ( $enable && $tags ) :
								?>
									<span class="tag-links">
										<span class="tag-title block-title"><?php echo esc_html( $title ); ?></span>
										<?php foreach( $tags as $tag ) : ?>
											<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">#<?php echo esc_attr( $tag->name ); ?></a>
										<?php endforeach; ?>
									</span>
								<?php endif; ?>

							</div>

						</div>

					</article><!-- #post-## -->

					<?php publishnow_post_views( get_the_ID() ); // Count post views ?>

					<?php publishnow_next_prev_post(); // Display the next and previous post. ?>

					<?php publishnow_post_author_box(); // Display the author box. ?>

					<?php publishnow_related_posts(); // Display the related posts. ?>

					<?php
						// Get data set in customizer
						$comment = get_theme_mod( 'publishnow_post_comment', 1 );

						// Check if comment enable on customizer
						if ( $comment ) :
							// If enable and comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						endif;
					?>

					<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>
