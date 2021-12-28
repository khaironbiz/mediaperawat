<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpberita
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>
<main id="primary" class="site-main col-md-8">
	<?php
	while ( have_posts() ) :
		the_post();

		if ( is_attachment() ) {
			get_template_part( 'template-parts/content', 'attachment' );
		} else {
			get_template_part( 'template-parts/content', 'single' );
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			if ( wpberita_is_amp() ) {
				/* Add Non AMP Version using <div id="site-version-switcher"> and id="version-switch-link" */
				$nonamp_link = amp_remove_endpoint( amp_get_current_url() );
				echo '<div id="respond" class="text-center"><div id="site-version-switcher"><a id="version-switch-link" class="button" href="' . esc_url( $nonamp_link ) . '#comments" class="amp-wp-canonical-link" title="' . esc_html__( 'Add Comment', 'wpberita' ) . '" rel="noamphtml nofollow">' . esc_attr__( 'Add Comment', 'wpberita' ) . '</a></div></div>';
			} else {
				comments_template();
			}
		endif;
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
