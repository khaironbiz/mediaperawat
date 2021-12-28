<?php
/**
 * Layout five posts widgets
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PublishnowPro_Layout_Five_Widget extends Widget_Base {

	public function get_name() {
		return 'publishnow-layout-five';
	}

	public function get_title() {
		return esc_html__( 'Layout Five', 'publishnow' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-right';
	}

	public function get_categories() {
		return [ 'publishnow-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_posts',
			[
				'label' => esc_html__( 'Posts', 'publishnow' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'         => esc_html__( 'Title', 'publishnow' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);

		$this->add_control(
			'count',
			[
				'label'         => esc_html__( 'Number of Posts', 'publishnow' ),
				'description'   => esc_html__( 'The number of posts you want to show', 'publishnow' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => '7',
				'label_block'   => true,
			]
		);

		$this->add_control(
			'order',
			[
				'label'         => esc_html__( 'Order', 'publishnow' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''          => esc_html__( 'Default', 'publishnow' ),
					'DESC'      => esc_html__( 'DESC', 'publishnow' ),
					'ASC'       => esc_html__( 'ASC', 'publishnow' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'         => esc_html__( 'Order By', 'publishnow' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''              => esc_html__( 'Default', 'publishnow' ),
					'date'          => esc_html__( 'Date', 'publishnow' ),
					'title'         => esc_html__( 'Title', 'publishnow' ),
					'name'          => esc_html__( 'Name', 'publishnow' ),
					'modified'      => esc_html__( 'Modified', 'publishnow' ),
					'author'        => esc_html__( 'Author', 'publishnow' ),
					'rand'          => esc_html__( 'Random', 'publishnow' ),
					'ID'            => esc_html__( 'ID', 'publishnow' ),
					'comment_count' => esc_html__( 'Comment Count', 'publishnow' ),
					'menu_order'    => esc_html__( 'Menu Order', 'publishnow' ),
				],
			]
		);

		$this->add_control(
			'include_categories',
			[
				'label'         => esc_html__( 'Include Categories', 'publishnow' ),
				'description'   => esc_html__( 'Enter the categories slugs seperated by a "comma"', 'publishnow' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);

		$this->add_control(
			'include_tags',
			[
				'label'         => esc_html__( 'Include Tags', 'publishnow' ),
				'description'   => esc_html__( 'Enter the tags slugs seperated by a "comma"', 'publishnow' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);

		$this->add_control(
			'formats',
			[
				'label'         => esc_html__( 'Post Formats', 'publishnow' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''                  => esc_html__( 'Standard', 'publishnow' ),
					'post-format-image' => esc_html__( 'Image', 'publishnow' ),
					'post-format-video' => esc_html__( 'Video', 'publishnow' ),
					'post-format-audio' => esc_html__( 'Audio', 'publishnow' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_elements',
			[
				'label' => esc_html__( 'Elements', 'publishnow' )
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'        => esc_html__( 'Show Title', 'publishnow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => esc_html__( 'Show', 'publishnow' ),
				'label_off'    => esc_html__( 'Hide', 'publishnow' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'view_more',
			[
				'label'        => esc_html__( 'Show View More', 'publishnow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => esc_html__( 'Show', 'publishnow' ),
				'label_off'    => esc_html__( 'Hide', 'publishnow' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'view_more_text',
			[
				'label'         => esc_html__( 'View More Text', 'publishnow' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => esc_html__( 'View More', 'publishnow' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'view_more_url',
			[
				'label'         => esc_html__( 'View More URL', 'publishnow' ),
				'type'          => Controls_Manager::URL,
				'default'       => [
					'url'         => 'http://',
					'is_external' => '',
				],
				'show_external' => true
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_color',
			[
				'label'         => esc_html__( 'Title', 'publishnow' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_bg_color',
			[
				'label'         => esc_html__( 'Background Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .layout-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'         => esc_html__( 'Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .layout-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'title_typography',
				'selector'      => '{{WRAPPER}} .publishnow-elements.layout-five .layout-title',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_view_more_color',
			[
				'label'         => esc_html__( 'View More', 'publishnow' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'view_more_color',
			[
				'label'         => esc_html__( 'Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .view-more' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view_more_color_hover',
			[
				'label'         => esc_html__( 'Hover Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .view-more:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'view_more_typography',
				'selector'      => '{{WRAPPER}} .publishnow-elements.layout-five .view-more',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_post_title_color',
			[
				'label'         => esc_html__( 'Post Title', 'publishnow' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'post_title_color',
			[
				'label'         => esc_html__( 'Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .entry-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_title_color_hover',
			[
				'label'         => esc_html__( 'Hover Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .entry-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_title_large_typography',
				'label'         => esc_html__( 'Typography: Large', 'publishnow' ),
				'selector'      => '{{WRAPPER}} .publishnow-elements.layout-five .large-post .entry-title',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_title_small_typography',
				'label'         => esc_html__( 'Typography: Small', 'publishnow' ),
				'selector'      => '{{WRAPPER}} .publishnow-elements.layout-five .small-posts .entry-title',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cat_color',
			[
				'label'         => esc_html__( 'Category', 'publishnow' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cat_color',
			[
				'label'         => esc_html__( 'Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .cat-links a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cat_color_hover',
			[
				'label'         => esc_html__( 'Hover Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.layout-five .cat-links a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'cat_typography',
				'selector'      => '{{WRAPPER}} .publishnow-elements.layout-five .cat-links a',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		// Vars
		$count      = $settings['count'];
		$order      = $settings['order'];
		$orderby    = $settings['orderby'];
		$categories = $settings['include_categories'];
		$tags       = $settings['include_tags'];
		$formats    = $settings['formats'];

		$args = array(
			'post_type'         => 'post',
			'posts_per_page'    => absint( $count ),
			'order'             => esc_attr( $order ),
			'orderby'           => esc_attr( $orderby ),
			'tax_query'         => array(
				'relation'      => 'AND',
			),
		);

		// Include category
		if ( ! empty( $categories ) ) {

			// Sanitize category and convert to array
			$categories = str_replace( ', ', ',', $categories );
			$categories = explode( ',', $categories );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $categories,
				'operator' => 'IN',
			);

		}

		// Include tag
		if ( ! empty( $tags ) ) {

			// Sanitize category and convert to array
			$tags = str_replace( ', ', ',', $tags );
			$tags = explode( ',', $tags );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => $tags,
				'operator' => 'IN',
			);

		}

		// Include post formats
		if ( $formats != '' ) {

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => $formats,
				'operator' => 'IN',
			);

		}

		// Build the WordPress query
		$five = new \WP_Query( $args );

		// Output posts
		if ( $five->have_posts() ) :

			// Vars
			$title          = $settings['title'];
			$show_title     = $settings['show_title'];
			$view_more      = $settings['view_more'];
			$view_more_text = $settings['view_more_text'];
			$view_more_url  = $settings['view_more_url'];

			// Wrapper classes
			$wrap_classes = array( 'publishnow-elements', 'layout-five' );

			$wrap_classes = implode( ' ', $wrap_classes ); ?>

			<div class="<?php echo esc_attr( $wrap_classes ); ?>">

				<?php
				// Display title if $title is true
				if ( $title && ( $show_title == 'yes' ) ) : ?>

					<div class="layout-title block-title">
						<span><?php echo esc_html( $title ); ?></span>

						<?php
						$url    = $view_more_url['url'];
						$target = $view_more_url['is_external'] ? 'target="_blank"' : '';
						// Display view more
						if ( $view_more  ) : ?>
							<a class="view-more" href="<?php echo esc_url( $url ); ?>" <?php echo $target; ?>><?php echo esc_html( $view_more_text ); ?></a>
						<?php endif; ?>
					</div>

				<?php endif; ?>

				<div class="posts">
					<?php while ( $five->have_posts() ) : $five->the_post(); ?>

						<?php if ( $five->current_post == 0 ) : ?>
							<div <?php post_class( 'large-post' ); ?>>
								<div class="thumbnail">
									<?php publishnow_post_thumbnail( 'publishnow-post' ); ?>
								</div>

								<div class="post-content">
									<header class="entry-header">
										<?php publishnow_post_header(); ?>
									</header>
								</div>
							</div>

						<div class="small-posts">
						<?php else : ?>

							<div <?php post_class(); ?>>
								<div class="thumbnail">
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
										<?php
											the_post_thumbnail( 'thumbnail', array(
												'alt' => the_title_attribute( array(
													'echo' => false,
												) ),
											) );
										?>
									</a>
								</div>

								<div class="post-content">
									<header class="entry-header">
										<?php publishnow_post_header(); ?>
									</header>
								</div>
							</div>

						<?php endif; ?>

					<?php endwhile; ?>
					</div>
				</div>

			</div>

			<?php
			// Reset the post data to prevent conflicts with WP globals
			wp_reset_postdata();

		// If no posts are found display message
		else : ?>

			<div class="layout-five">
				<div class="container">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'publishnow' ); ?></p>
				</div>
			</div>

		<?php
		// End post check
		endif; ?>

	<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new PublishnowPro_Layout_Five_Widget() );
