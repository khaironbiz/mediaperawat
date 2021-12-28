<?php get_header(); ?>

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/post/content', 'single' ); ?>

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
