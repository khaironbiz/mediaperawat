<?php if ( has_nav_menu ( 'secondary' ) ) : ?>
	<nav class="secondary-navigation">
		<div class="container">
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'secondary',
					'menu_id'         => 'secondary-menu',
					'menu_class'      => 'secondary-menu',
					'container_class' => 'secondary-menu-items'
				)
			); ?>

			<ul class="social-search">
				<?php
					$search = get_theme_mod( 'publishnow_top_bar_search', 1 );
					if ( $search ) :
				?>
					<li class="search-link">
						<a href="#"><?php echo publishnow_get_icon_svg( 'search' ); ?></a>
						<ul class="sub-menu search-menu">
							<li><?php echo get_search_form(); ?></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>

		</div>
	</nav>
<?php endif; ?>
