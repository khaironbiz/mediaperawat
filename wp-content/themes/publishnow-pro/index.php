<?php get_header(); ?>

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<div class="posts">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/post/content' ); ?>

						<?php endwhile; ?>
					</div>

					<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/post/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>
