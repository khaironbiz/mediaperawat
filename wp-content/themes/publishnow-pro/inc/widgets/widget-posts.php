<?php
/**
 * Posts with Thumbnail widget.
 */
class PublishnowPro_Posts_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Set up the widget options.
		$widget_ops = array(
			'classname'   => 'widget_entries_thumbnail',
			'description' => esc_html__( 'Display your site\'s posts with thumbnails.', 'publishnow' ),
			'customize_selective_refresh' => true
		);

		// Create the widget.
		parent::__construct(
			'publishnow-posts',                                         // $this->id_base
			esc_html__( '&raquo; Posts with Thumbnail', 'publishnow' ), // $this->name
			$widget_ops                                               // $this->widget_options
		);

		$this->alt_option_name = 'widget_entries_thumbnail';

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
		$title     = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'publishnow' );
		$number    = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$orderby   = ( ! empty( $instance['orderby'] ) ) ? esc_attr( $instance['orderby'] ) : 'date';

		// Output the theme's $before_widget wrapper.
		echo $args['before_widget'];

		// If the title not empty, display it.
		if ( $title ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
		}

			// Posts query arguments.
			$query = array(
				'post_type'           => 'post',
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'             => $orderby
			);

			// Allow developer to filter the arguments.
			$query = apply_filters( 'publishnow_widget_recent_args', $query );

			// The post query.
			$recent = new WP_Query( $query ); ?>

			<?php if ( $recent->have_posts() ) : ?>
				<ul>

					<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>

						<?php if ( $recent->current_post == 0 && !is_paged() ) : ?>

							<li class="large-post">
								<?php if ( has_post_thumbnail() ) : ?>
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
										<?php
											the_post_thumbnail( 'publishnow-post', array(
												'alt' => the_title_attribute( array(
													'echo' => false,
												) ),
											) );
										?>
									</a>
								<?php endif; ?>
								<div class="post-detail">
									<?php
										$category = get_the_category( get_the_ID() );
										if ( $category ) :
									?>
									<span class="cat-links">
										<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_attr( $category[0]->name ); ?></a>
									</span>
									<?php endif; // End if categories ?>
									<a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</div>
							</li>

						<?php else : ?>

							<li class="small-posts">
								<?php if ( has_post_thumbnail() ) : ?>
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
										<?php
											the_post_thumbnail( 'thumbnail', array(
												'alt' => the_title_attribute( array(
													'echo' => false,
												) ),
											) );
										?>
									</a>
								<?php endif; ?>
								<div class="post-detail">
									<?php
										$category = get_the_category( get_the_ID() );
										if ( $category ) :
									?>
									<span class="cat-links">
										<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_attr( $category[0]->name ); ?></a>
									</span>
									<?php endif; // End if categories ?>
									<a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</div>
							</li>

						<?php endif; ?>

					<?php endwhile; ?>

				</ul>

			<?php
			endif; wp_reset_postdata();

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
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['orderby']   = isset( $new_instance['orderby'] ) ? esc_attr( $new_instance['orderby'] ) : 'date';
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
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'publishnow' );
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$orderby   = isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : 'date';
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php esc_html_e( 'Title', 'publishnow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">
				<?php esc_html_e( 'Number of posts to show', 'publishnow' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>">
				<?php esc_html_e( 'Type', 'publishnow' ); ?>
			</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" style="width:100%;">
				<option value="date" <?php selected( $orderby, 'date' ); ?>><?php esc_html_e( 'Recent Posts', 'publishnow' ) ?></option>
				<option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php esc_html_e( 'Random Posts', 'publishnow' ) ?></option>
				<option value="comment_count" <?php selected( $orderby, 'comment_count' ); ?>><?php esc_html_e( 'Popular Posts', 'publishnow' ) ?></option>
			</select>
		</p>

	<?php

	}

}
