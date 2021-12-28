<?php
/**
 * Social widget.
 */
class PublishnowPro_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget_social_icons',
			'description' => esc_html__( 'Display your social media icons.', 'publishnow' ),
			'customize_selective_refresh' => true
		);

		// Create the widget.
		parent::__construct(
			'publishnow-social',                                // $this->id_base
			esc_html__( '&raquo; Social Icons', 'publishnow' ), // $this->name
			$widget_options                                   // $this->widget_options
		);

		$this->alt_option_name = 'widget_social_icons';
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		// Set up default value
		$title     = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Follow Us', 'publishnow' );
		$facebook  = ( ! empty( $instance['facebook'] ) ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = ( ! empty( $instance['twitter'] ) ) ? esc_url( $instance['twitter'] ) : '';
		$youtube   = ( ! empty( $instance['youtube'] ) ) ? esc_url( $instance['youtube'] ) : '';
		$pinterest = ( ! empty( $instance['pinterest'] ) ) ? esc_url( $instance['pinterest'] ) : '';
		$linkedin  = ( ! empty( $instance['linkedin'] ) ) ? esc_url( $instance['linkedin'] ) : '';
		$instagram = ( ! empty( $instance['instagram'] ) ) ? esc_url( $instance['instagram'] ) : '';
		$dribbble  = ( ! empty( $instance['dribbble'] ) ) ? esc_url( $instance['dribbble'] ) : '';
		$rss       = ( ! empty( $instance['rss'] ) ) ? esc_url( $instance['rss'] ) : '';

		// Output the theme's $before_widget wrapper.
		echo $args['before_widget'];

		// If the title not empty, display it.
		if ( $title ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
		}

			// Display the social icons.
			echo '<div class="social-icons">';
				if ( $facebook ) {
					echo '<a class="facebook" href="' . esc_url( $facebook ) . '">' . publishnow_get_social_icon_svg( 'facebook' ) . '</a>';
				}
				if ( $twitter ) {
					echo '<a class="twitter" href="' . esc_url( $twitter ) . '">' . publishnow_get_social_icon_svg( 'twitter' ) . '</a>';
				}
				if ( $youtube ) {
					echo '<a class="youtube" href="' . esc_url( $youtube ) . '">' . publishnow_get_social_icon_svg( 'youtube' ) . '</a>';
				}
				if ( $pinterest ) {
					echo '<a class="pinterest" href="' . esc_url( $pinterest ) . '">' . publishnow_get_social_icon_svg( 'pinterest' ) . '</a>';
				}
				if ( $linkedin ) {
					echo '<a class="linkedin" href="' . esc_url( $linkedin ) . '">' . publishnow_get_social_icon_svg( 'linkedin' ) . '</a>';
				}
				if ( $instagram ) {
					echo '<a class="instagram" href="' . esc_url( $instagram ) . '">' . publishnow_get_social_icon_svg( 'instagram' ) . '</a>';
				}
				if ( $dribbble ) {
					echo '<a class="dribbble" href="' . esc_url( $dribbble ) . '">' . publishnow_get_social_icon_svg( 'dribbble' ) . '</a>';
				}
				if ( $rss ) {
					echo '<a class="rss" href="' . esc_url( $rss ) . '">' . publishnow_get_social_icon_svg( 'feed' ) . '</a>';
				}
			echo '</div>';

		// Close the theme's widget wrapper.
		echo $args['after_widget'];

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['title']      = sanitize_text_field( $new_instance['title'] );
		$instance['facebook']   = esc_url_raw( $new_instance['facebook'] );
		$instance['twitter']    = esc_url_raw( $new_instance['twitter'] );
		$instance['youtube']      = esc_url_raw( $new_instance['youtube'] );
		$instance['pinterest']  = esc_url_raw( $new_instance['pinterest'] );
		$instance['linkedin']   = esc_url_raw( $new_instance['linkedin'] );
		$instance['instagram']  = esc_url_raw( $new_instance['instagram'] );
		$instance['dribbble']   = esc_url_raw( $new_instance['dribbble'] );
		$instance['rss']        = esc_url_raw( $new_instance['rss'] );
		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Follow Us', 'publishnow' );
		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$youtube     = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		$dribbble  = isset( $instance['dribbble'] ) ? esc_url( $instance['dribbble'] ) : '';
		$rss       = isset( $instance['rss'] ) ? esc_url( $instance['rss'] ) : '';
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php esc_html_e( 'Title', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">
				<?php esc_html_e( 'Facebook', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $facebook; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">
				<?php esc_html_e( 'Twitter', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $twitter; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">
				<?php esc_html_e( 'Youtube', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $youtube; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">
				<?php esc_html_e( 'Pinterest', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $pinterest; ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">
				<?php esc_html_e( 'LinkedIn', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $linkedin; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">
				<?php esc_html_e( 'Instagram', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instagram; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>">
				<?php esc_html_e( 'Dribbble', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $dribbble; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">
				<?php esc_html_e( 'RSS Feed', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $rss; ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
		</p>

	<?php

	}

}
