<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpberita
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-single' ); ?>>
	<?php do_action( 'wpberita_view_breadcrumbs' ); ?>
	<header class="entry-header entry-header-single">
		<?php
		if ( ! is_wp_error( get_the_term_list( $post->ID, 'newstopic' ) ) ) {
			$termlist = get_the_term_list( $post->ID, 'newstopic' );
			if ( ! empty( $termlist ) ) {
				echo '<div class="gmr-meta-topic heading-text"><strong>';
				echo get_the_term_list( $post->ID, 'newstopic', '', ', ', '' );
				echo '</strong></div>';
			}
		}
		the_title( '<h1 class="entry-title"><strong>', '</strong></h1>' );

		echo '<div class="gmr-meta-topic heading-text">';
			$byline = sprintf(
				/* translators: %s: post author. */
				'%s',
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_html( get_the_author() ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
			echo $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( ', ' );
			$category        = '';
			if ( $categories_list ) {
				echo ' - <span class="cat-links-content">' . $categories_list . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo '</div>';
			echo '<div class="meta-content gmr-content-metasingle">';
			wpberita_posted_on();
			echo '</div>';
			?>
	</header><!-- .entry-header -->
	<?php
		do_action( 'wpberita_comment_social' );

		/* custom field using oembed https://codex.wordpress.org/Embeds */
		$oembed = get_post_meta( $post->ID, 'MAJPRO_Oembed', true );
		$iframe = get_post_meta( $post->ID, 'MAJPRO_Iframe', true );

	if ( ! empty( $oembed ) ) {
		echo '<div class="gmr-embed-responsive gmr-embed-responsive-16by9 single-thumbnail">';
		echo wp_oembed_get( $oembed );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</div>';

	} elseif ( ! empty( $iframe ) ) {
		echo '<div class="gmr-embed-responsive gmr-embed-responsive-16by9 single-thumbnail">';
		$var = do_shortcode( $iframe );
		echo $var;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</div>';

	} else {
		// Disable thumbnail options via customizer.
		$thumbnail = get_theme_mod( 'gmr_active-singlethumb', 0 );
		if ( 0 === $thumbnail && has_post_thumbnail() ) {
			?>
			<figure class="post-thumbnail gmr-thumbnail-single">
				<?php the_post_thumbnail(); ?>
				<?php
				$get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
				if ( ! empty( $get_description ) ) :
					?>
					<figcaption class="wp-caption-text"><?php echo esc_html( $get_description ); ?></figcaption>
				<?php endif; ?>
			</figure>
			<?php
		}
	}

	if ( has_post_format( 'gallery' ) ) {
		do_action( 'wpberita_get_attachment_gallery' );
	}
	$banner    = get_theme_mod( 'gmr_adsstickyrightcontent' );
	$classads  = '';
	if ( ! wpberita_is_amp() ) {
		if ( isset( $banner ) && ! empty( $banner ) ) {
			$classads = ' have-stickybanner';
		}
	}
	?>

	<div class="single-wrap">
		<div class="entry-content entry-content-single clearfix<?php echo esc_html( $classads ); ?>">
			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links"><span class="text-page-link">' . esc_html__( 'Pages:', 'wpberita' ) . '</span>',
						'after'  => '</div>',
					)
				);
				?>

			<footer class="entry-footer entry-footer-single">
				<?php wpberita_entry_footer(); ?>
				<?php

				$majpro_source = get_post_meta( $post->ID, 'MAJPRO_Source', true );
				$majpro_writer = get_post_meta( $post->ID, 'MAJPRO_Writer', true );
				$majpro_editor = get_post_meta( $post->ID, 'MAJPRO_Editor', true );
				echo '<div class="gmr-cf-metacontent heading-text meta-content">';
				if ( ! empty( $majpro_writer ) ) {
					echo '<span>';
					echo esc_attr__( 'Writer: ', 'wpberita' ) . esc_attr( $majpro_writer );
					echo '</span>';
				}
				if ( ! empty( $majpro_editor ) ) {
					echo '<span>';
					echo esc_attr__( 'Editor: ', 'wpberita' ) . esc_attr( $majpro_editor );
					echo '</span>';
				}
				if ( ! empty( $majpro_source ) ) {
					echo '<span>';
					echo '<a href="' . esc_url( $majpro_source ) . '" target="_blank" rel="nofollow">' . esc_attr__( 'Source News', 'wpberita' ) . '</a>';
					echo '</span>';
				}
				echo '</div>';
				?>
			</footer><!-- .entry-footer -->
		</div><!-- .entry-content -->
		<?php do_action( 'wpberita_banner_stickyright_content' ); ?>
	</div>
	<?php
		do_action( 'wpberita_comment_social' );
		do_action( 'wpberita_related_post' );
		do_action( 'wpberita_banner_after_relpost' );
		do_action( 'wpberita_related_post_second' );
		do_action( 'wpberita_related_post_third' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->
