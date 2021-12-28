		</div><!-- #content -->

		<footer id="colophon" class="site-footer">

			<div class="container">
				<?php get_template_part( 'sidebar', 'footer' ); // Loads the sidebar-footer.php template. ?>
			</div>

			<div class="container">
				<div class="site-info">
					<?php publishnow_footer_text(); ?>
				</div>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div><!-- .wide-container -->

</div><!-- #page -->

<a href="#" class="back-to-top" title="<?php esc_html_e( 'Back to top', 'publishnow' ); ?>"><?php echo publishnow_get_icon_svg( 'keyboard_arrow_up' ); ?></a>

<?php wp_footer(); ?>

</body>
</html>
