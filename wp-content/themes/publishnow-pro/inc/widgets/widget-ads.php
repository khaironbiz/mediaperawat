<?php
/**
 * Ads widget.
 */
class PublishnowPro_Ads_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget_ad',
			'description' => esc_html__( 'Easily to display any type of ad.', 'publishnow' ),
			'customize_selective_refresh' => true
		);

		// Create the widget.
		parent::__construct(
			'publishnow-ads',                                    // $this->id_base
			esc_html__( '&raquo; Advertisement', 'publishnow' ), // $this->name
			$widget_options                                    // $this->widget_options
		);

		$this->alt_option_name = 'widget_ad';
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
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Advertisement', 'publishnow' );
		$code  = ( ! empty( $instance['code'] ) ) ? wp_kses_post( $instance['code'] ) : '';

		// Output the theme's $before_widget wrapper.
		echo $args['before_widget'];

		// If the title not empty, display it.
		if ( $title ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
		}

			// Display the ad banner.
			if ( $code ) {
				echo '<div class="adwidget">' . $code . '</div>';
			}

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
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['code']  = wp_kses_post( $new_instance['code'] );
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
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Advertisement', 'publishnow' );
		$code  = isset( $instance['code'] ) ? wp_kses_post( $instance['code'] ) : '';
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php esc_html_e( 'Title:', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'code' ); ?>">
				<?php esc_html_e( 'Ad Code:', 'publishnow' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'code' ); ?>" id="<?php echo $this->get_field_id( 'code' ); ?>" cols="30" rows="6"><?php echo $code; ?></textarea>
		</p>

	<?php

	}

}
