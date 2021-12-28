<?php
/**
 * Featured posts widgets
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PublishnowPro_Featured_Posts_Widget extends Widget_Base {

	public function get_name() {
		return 'publishnow-featured-posts';
	}

	public function get_title() {
		return esc_html__( 'Featured Posts', 'publishnow' );
	}

	public function get_icon() {
		return 'eicon-gallery-group';
	}

	public function get_categories() {
		return [ 'publishnow-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_featured',
			[
				'label' => esc_html__( 'Posts', 'publishnow' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_elements',
			[
				'label' => esc_html__( 'Elements', 'publishnow' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'         => esc_html__( 'Display Title', 'publishnow' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'true',
				'options'       => [
					'true'      => esc_html__( 'Show', 'publishnow' ),
					'false'     => esc_html__( 'Hide', 'publishnow' ),
				],
			]
		);

		$this->add_control(
			'cat',
			[
				'label'         => esc_html__( 'Display Categories', 'publishnow' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'true',
				'options'       => [
					'true'      => esc_html__( 'Show', 'publishnow' ),
					'false'     => esc_html__( 'Hide', 'publishnow' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_post_title',
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
					'{{WRAPPER}} .publishnow-elements.featured-posts .entry-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_title_hover_color',
			[
				'label'         => esc_html__( 'Color: Hover', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.featured-posts .entry-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_title_large_typography',
				'label'         => esc_html__( 'Typography: Large', 'publishnow' ),
				'selector'      => '{{WRAPPER}} .publishnow-elements.featured-posts .large-featured .entry-title',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_title_small_typography',
				'label'         => esc_html__( 'Typography: Small', 'publishnow' ),
				'selector'      => '{{WRAPPER}} .publishnow-elements.featured-posts .small-featured .entry-title',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_category',
			[
				'label'         => esc_html__( 'Category', 'publishnow' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_background_color',
			[
				'label'         => esc_html__( 'Background Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.featured-posts .cat-links' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'category_hover_background_color',
			[
				'label'         => esc_html__( 'Background Color: Hover', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.featured-posts .cat-links:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'category_color',
			[
				'label'         => esc_html__( 'Color', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.featured-posts .cat-links a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'category_hover_color',
			[
				'label'         => esc_html__( 'Color: Hover', 'publishnow' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .publishnow-elements.featured-posts .cat-links a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'category_typo',
				'selector'      => '{{WRAPPER}} .publishnow-elements.featured-posts .cat-links a',
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		// Vars
		$order          = $settings['order'];
		$orderby        = $settings['orderby'];
		$categories     = $settings['include_categories'];
		$tags           = $settings['include_tags'];

		$args = array(
			'post_type'         => 'post',
			'posts_per_page'    => 3,
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

		// Build the WordPress query
		$featured = new \WP_Query( $args );

		// Output posts
		if ( $featured->have_posts() ) :

			// Vars
			$title   = $settings['title'];
			$cat     = $settings['cat'];

			// Wrapper classes
			$wrap_classes = array( 'publishnow-elements', 'featured-posts' );

			$wrap_classes = implode( ' ', $wrap_classes ); ?>

			<div class="<?php echo esc_attr( $wrap_classes ); ?>">

				<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>

					<?php if ( $featured->current_post == 0 ) : ?>
						<div <?php post_class( 'large-featured' ); ?>>
							<div class="thumbnail">
								<a class="post-thumbnail" href="<?php the_permalink(); ?>">
									<?php
										the_post_thumbnail( 'publishnow-post-large', array(
											'alt' => the_title_attribute( array(
												'echo' => false,
											) ),
										) );
									?>
									<span class="img-overlay"></span>
								</a>
								<header class="entry-header">
									<?php
									// Display title if $title is true and there is a post title
									if ( 'true' == $title ) : ?>
										<?php the_title(
											sprintf(
												'<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'
											);
										?>
									<?php endif; ?>
									<div class="post-meta">
										<?php publishnow_post_meta(); ?>
									</div>
								</header>
							</div>
						</div>
					<div class="small-featured">
					<?php else : ?>
						<div <?php post_class(); ?>>
							<div class="thumbnail">
								<a class="post-thumbnail" href="<?php the_permalink(); ?>">
									<?php
										the_post_thumbnail( 'publishnow-post-small', array(
											'alt' => the_title_attribute( array(
												'echo' => false,
											) ),
										) );
									?>
									<span class="img-overlay"></span>
								</a>
								<header class="entry-header">
									<?php
									// Display title if $title is true and there is a post title
									if ( 'true' == $title ) : ?>
										<?php the_title(
											sprintf(
												'<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'
											);
										?>
									<?php endif; ?>
									<div class="post-meta">
										<?php publishnow_post_meta(); ?>
									</div>
								</header>
							</div>
						</div>
					<?php endif; ?>

				<?php endwhile; ?>
				</div>

			</div>

			<?php
			// Reset the post data to prevent conflicts with WP globals
			wp_reset_postdata();

		// If no posts are found display message
		else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'publishnow' ); ?></p>

		<?php
		// End post check
		endif; ?>

	<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new PublishnowPro_Featured_Posts_Widget() );
