<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
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

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="post-meta">
			<?php publishnow_post_meta(); ?>
		</div>
	</header>

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
