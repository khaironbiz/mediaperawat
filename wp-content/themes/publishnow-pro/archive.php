<?php get_header(); ?>

	<div class="container">

		<section id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

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
		</section><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>
