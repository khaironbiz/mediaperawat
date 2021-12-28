<?php
// Get the customizer data.
$widget_columns = get_theme_mod( 'publishnow_footer_widget_column', '4' );
if ( $widget_columns ) :
?>
	<div class="footer-sidebar widget-column-<?php echo sanitize_html_class( $widget_columns ); ?>">

		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-column footer-column-1">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="footer-column footer-column-2">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="footer-column footer-column-3">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $widget_columns == '6' || $widget_columns == '4' ) : ?>

			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="footer-column footer-column-4">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			<?php endif; ?>

		<?php endif; ?>

		<?php if ( $widget_columns == '6' ) : ?>

			<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
				<div class="footer-column footer-column-5">
					<?php dynamic_sidebar( 'footer-5' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-6' ) ) : ?>
				<div class="footer-column footer-column-6">
					<?php dynamic_sidebar( 'footer-6' ); ?>
				</div>
			<?php endif; ?>

		<?php endif; ?>

	</div><!-- .footer-sidebar -->

<?php endif; ?>
