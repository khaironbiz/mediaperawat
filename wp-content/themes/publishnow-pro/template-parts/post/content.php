<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
