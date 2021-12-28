<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<script data-ad-client="ca-pub-7113658310453963" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<head>
	
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'publishnow' ); ?></a>

	<div class="wide-container">

		<?php get_template_part( 'template-parts/header/menu', 'primary' ) ?>

		<header id="masthead" class="site-header">
			<div class="container">
				<div class="site-header-inner">

					<?php publishnow_site_branding(); ?>

					<?php publishnow_header_ad(); ?>

				</div>
			</div>
		</header><!-- #masthead -->

		<?php get_template_part( 'template-parts/header/menu', 'secondary' ) ?>

		<?php
		$breadcrumbs = get_theme_mod( 'publishnow_breadcrumbs', 1 );
		if ( $breadcrumbs && !is_front_page() ) {
			echo breadcrumb_trail(
				array(
					'container'   => 'div',
					'show_browse' => false,
					'before'      => '<div class="container">',
					'after'       => '</div>'
				)
			);
		}
		?>

		<?php publishnow_post_cover(); ?>

		<div id="content" class="site-content">
