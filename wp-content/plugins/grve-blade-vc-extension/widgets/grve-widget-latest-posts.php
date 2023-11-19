<?php
/**
 * Greatives Latest Posts
 * A widget that displays latest posts.
 * @author		Greatives Team
 * @URI			http://greatives.eu
 */

class Blade_Ext_Widget_Latest_Posts extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'grve-latest-news',
			'description' => esc_html__( 'A widget that displays latest posts', 'grve-blade-vc-extension'),
		);
		$control_ops = array(
			'width' => 300,
			'height' => 400,
			'id_base' => 'grve-widget-latest-posts',
		);
		parent::__construct( 'grve-widget-latest-posts', '(Greatives) ' . esc_html__( 'Latest Posts', 'grve-blade-vc-extension' ), $widget_ops, $control_ops );
	}

	function blade_ext_widget_latest_posts() {
		$this->__construct();
	}

	function widget( $args, $instance ) {

		//Our variables from the widget settings.
		extract( $args );

		$show_image = $instance['show_image'];
		$num_of_posts = $instance['num_of_posts'];
		if( empty( $num_of_posts ) ) {
			$num_of_posts = 5;
		}

		echo $before_widget; // XSS OK

		// Display the widget title
		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( $title ) {
			echo $before_title . esc_html( $title ) . $after_title; // XSS OK
		}

		$args = array(
			'post_type' => 'post',
			'post_status'=>'publish',
			'paged' => 1,
			'posts_per_page' => $num_of_posts,
		);
		//Loop posts
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
		?>
			<ul>
		<?php

		while ( $query->have_posts() ) : $query->the_post();

			$grve_link = get_permalink();
			$grve_target = '_self';

			if ( 'link' == get_post_format() ) {
				$grve_link = get_post_meta( get_the_ID(), 'grve_post_link_url', true );
				$new_window = get_post_meta( get_the_ID(), 'grve_post_link_new_window', true );
				if( empty( $grve_link ) ) {
					$grve_link = get_permalink();
				}

				if( !empty( $new_window ) ) {
					$grve_target = '_blank';
				}
			}

		?>

				<li <?php post_class(); ?>>
					<?php if( $show_image && '1' == $show_image ) { ?>
						<a href="<?php echo esc_url( $grve_link ); ?>" target="<?php echo esc_attr( $grve_target ); ?>" title="<?php the_title_attribute(); ?>" class="grve-post-thumb">
						<?php
							$image_size = 'thumbnail';
							if ( has_post_thumbnail() ) {
								$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
								$attachment_src = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );
								$image_url = $attachment_src[0];
						?>
							<div class="grve-bg-wrapper grve-small-square">
								<div class="grve-bg-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
							</div>
							<?php the_post_thumbnail( $image_size ); ?>
						<?php
							} else {
								$image_url = GRVE_BLADE_VC_EXT_PLUGIN_DIR_URL .'assets/images/empty/thumbnail.jpg';
						?>
							<div class="grve-bg-wrapper grve-small-square">
								<div class="grve-bg-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
							</div>
							<img width="150" height="150" src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
						<?php
							}
						?>
						</a>
					<?php } ?>
					<div class="grve-news-content">
						<a href="<?php echo esc_url( $grve_link ); ?>" target="<?php echo esc_attr( $grve_target ); ?>" class="grve-title" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<?php if ( function_exists( 'blade_grve_visibility' ) && blade_grve_visibility( 'blog_date_visibility', '1' ) ) { ?>
						<div class="grve-latest-news-date"><?php echo esc_html( get_the_date() ); ?></div>
						<?php } ?>
					</div>
				</li>

		<?php
		endwhile;
		?>
			</ul>
		<?php
		else :
		?>
				<?php echo esc_html__( 'No Posts Found!', 'grve-blade-vc-extension' ); ?>
		<?php
		endif;

		wp_reset_postdata();

		echo $after_widget; // XSS OK
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_of_posts'] = strip_tags( $new_instance['num_of_posts'] );
		$instance['show_image'] = strip_tags( $new_instance['show_image'] );

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'num_of_posts' => '5',
			'show_image' => '0',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'grve-blade-vc-extension' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_of_posts' ) ); ?>"><?php echo esc_html__( 'Number of Posts:', 'grve-blade-vc-extension' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'num_of_posts' ) ); ?>" style="width:100%;">
				<?php
				for ( $i = 1; $i <= 20; $i++ ) {
				?>
				    <option value="<?php echo esc_attr( $i ); ?>" <?php selected( $instance['num_of_posts'], $i ); ?>><?php echo esc_html( $i ); ?></option>
				<?php
				}
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php echo esc_html__( 'Show Featured Image:', 'grve-blade-vc-extension' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id('show_image') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_image') ); ?>" type="checkbox" value="1" <?php checked( $instance['show_image'], 1 ); ?> />
		</p>

	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
