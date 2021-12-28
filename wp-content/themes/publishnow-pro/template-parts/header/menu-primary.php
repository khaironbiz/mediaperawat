<?php if ( has_nav_menu ( 'menu-1' ) ) : ?>
	<nav class="main-navigation">
		<div class="container">
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'menu-1',
					'menu_id'         => 'primary-menu',
					'menu_class'      => 'primary-menu',
					'container'       => ''
				)
			); ?>

			<ul class="social-search">

				<?php if ( has_nav_menu ( 'social' ) ) : ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'menu_class'     => 'social-menu',
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . publishnow_get_icon_svg( 'link' ),
							'depth'          => 1,
							'container'      => false
						)
					);
					?>
				<?php endif; ?>
			</ul>

		</div>
	</nav>
<?php endif; ?>
