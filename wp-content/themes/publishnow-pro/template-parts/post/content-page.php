<?php
// Get the customizer value.
$title = get_theme_mod( 'publishnow_page_title', 1 );
$image = get_theme_mod( 'publishnow_page_featured_image', 0 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $title ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if ( has_post_thumbnail() && $image ) : ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'large', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
		</a>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'publishnow' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( !is_page_template( 'templates/elementor.php' ) ) edit_post_link( esc_html__( 'Edit', 'publishnow' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
