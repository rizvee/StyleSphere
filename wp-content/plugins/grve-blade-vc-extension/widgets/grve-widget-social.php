<?php
/**
 * Greatives Social Networking
 * A widget that displays social networking links.
 * @author		Greatives Team
 * @URI			http://greatives.eu
 */


class Blade_Ext_Widget_Social extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'grve-element grve-social',
			'description' => esc_html__( 'A widget that displays social networking links', 'grve-blade-vc-extension' ),
		);
		$control_ops = array(
			'width' => 400,
			'height' => 600,
			'id_base' => 'grve-widget-social',
		);
		parent::__construct( 'grve-widget-social', '(Greatives) ' . esc_html__( 'Social Networking', 'grve-blade-vc-extension' ), $widget_ops, $control_ops );
	}

	function blade_ext_widget_social() {
		$this->__construct();
	}

	function widget( $args, $instance ) {

		global $blade_ext_social_list_extended;

		//Our variables from the widget settings.
		extract( $args );

		echo $before_widget; // XSS OK

		// Display the widget title
		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( $title ) {
			echo $before_title . esc_html( $title ) . $after_title; // XSS OK
		}

		$icon_size = grve_blade_vce_array_value( $instance, 'icon_size', 'extrasmall' );
		$icon_shape = grve_blade_vce_array_value( $instance, 'shape', 'square' );
		$shape_type = grve_blade_vce_array_value( $instance, 'shape_type', 'outline' );

		$icon_color = grve_blade_vce_array_value( $instance, 'icon_color', 'primary-1' );
		$shape_color = grve_blade_vce_array_value( $instance, 'shape_color', 'black' );


		$social_shape_classes = array();
		$social_shape_classes[] = 'grve-' . $icon_size;
		$social_shape_classes[] = 'grve-' . $icon_shape;

		if ( 'no-shape' != $icon_shape ) {
			$social_shape_classes[] = 'grve-with-shape';
			$social_shape_classes[] = 'grve-' . $shape_type;
			if ( 'outline' != $shape_type ) {
				$social_shape_classes[] = 'grve-bg-' . $shape_color;
			} else {
				$social_shape_classes[] = 'grve-text-' . $shape_color;
				$social_shape_classes[] = 'grve-text-hover-' . $shape_color;
			}
		}

		$social_shape_class_string = implode( ' ', $social_shape_classes );

	?>

		<ul>
		<?php
		foreach ( $blade_ext_social_list_extended as $social_item ) {

			$social_item_url = grve_blade_vce_array_value( $instance, $social_item['url'] );

			if ( ! empty( $social_item_url ) ) {

				if ( 'skype' == $social_item['id'] ) {
		?>
					<li>
						<a href="<?php echo esc_url( $social_item_url, array( 'skype', 'http', 'https' ) ); ?>" class="<?php echo esc_attr( $social_shape_class_string ); ?>">
							<i class="grve-text-<?php echo esc_attr( $icon_color ); ?> <?php echo esc_attr( $social_item['class'] ); ?>"></i>
						</a>
					</li>
		<?php
				} else {
		?>
					<li>
						<a href="<?php echo esc_url( $social_item_url ); ?>" class="<?php echo esc_attr( $social_shape_class_string ); ?>" target="_blank" rel="noopener noreferrer">
							<i class="grve-text-<?php echo esc_attr( $icon_color ); ?> <?php echo esc_attr( $social_item['class'] ); ?>"></i>
						</a>
					</li>
		<?php
				}
			}
		}
		?>
		</ul>


	<?php

		echo $after_widget; // XSS OK
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {

		global $blade_ext_social_list_extended;
		$instance = $old_instance;

		//Strip tags from title to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['icon_size'] = strip_tags( $new_instance['icon_size'] );
		$instance['icon_color'] = strip_tags( $new_instance['icon_color'] );
		$instance['shape'] = strip_tags( $new_instance['shape'] );
		$instance['shape_type'] = strip_tags( $new_instance['shape_type'] );
		$instance['shape_color'] = strip_tags( $new_instance['shape_color'] );


		foreach ( $blade_ext_social_list_extended as $social_item ) {
			$instance[ $social_item['url'] ] = strip_tags( $new_instance[ $social_item['url'] ] );
		}


		return $instance;
	}

	function form( $instance ) {

		global $blade_ext_social_list_extended;

		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'icon_size' => 'extrasmall',
			'icon_color' => 'primary-1',
			'shape' => 'square',
			'shape_type' => 'outline',
			'shape_color' => 'black',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$icon_size = grve_blade_vce_array_value( $instance, 'icon_size');
		$icon_shape = grve_blade_vce_array_value( $instance, 'shape');
		$icon_shape_type = grve_blade_vce_array_value( $instance, 'shape_type');
		$icon_color = grve_blade_vce_array_value( $instance, 'icon_color' );
		$shape_color = grve_blade_vce_array_value( $instance, 'shape_color' );

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'grve-blade-vc-extension' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>"><?php echo esc_html__( 'Icon Size:', 'grve-blade-vc-extension' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'icon_size' ) ); ?>" style="width:100%;">
				<?php
					blade_ext_print_select_options(
						array(
							'large' => __( 'Large', 'grve-blade-vc-extension'  ),
							'medium' => __( 'Medium', 'grve-blade-vc-extension' ),
							'small' => __( 'Small', 'grve-blade-vc-extension' ),
							'extrasmall' => __( 'Extra Small', 'grve-blade-vc-extension' ),
						),
						$icon_size
					);
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php echo esc_html__( 'Icon Color:', 'grve-blade-vc-extension' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" style="width:100%;">
				<?php
					blade_ext_print_select_options(
						array(
							'primary-1' => __( 'Primary 1', 'grve-blade-vc-extension' ),
							'primary-2' => __( 'Primary 2', 'grve-blade-vc-extension' ),
							'primary-3' => __( 'Primary 3', 'grve-blade-vc-extension' ),
							'primary-4' => __( 'Primary 4', 'grve-blade-vc-extension' ),
							'primary-5' => __( 'Primary 5', 'grve-blade-vc-extension' ),
							'green' => __( 'Green', 'grve-blade-vc-extension' ),
							'orange' => __( 'Orange', 'grve-blade-vc-extension' ),
							'red' => __( 'Red', 'grve-blade-vc-extension' ),
							'blue' => __( 'Blue', 'grve-blade-vc-extension' ),
							'aqua' => __( 'Aqua', 'grve-blade-vc-extension' ),
							'purple' => __( 'Purple', 'grve-blade-vc-extension' ),
							'black' => __( 'Black', 'grve-blade-vc-extension' ),
							'grey' => __( 'Grey', 'grve-blade-vc-extension' ),
							'white' => __( 'White', 'grve-blade-vc-extension' ),
						),
						$icon_color
					);
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shape' ) ); ?>"><?php echo esc_html__( 'Shape:', 'grve-blade-vc-extension' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'shape' ) ); ?>" style="width:100%;">
				<?php
					blade_ext_print_select_options(
						array(
							'square' => __( 'Square', 'grve-blade-vc-extension'  ),
							'round' => __( 'Round', 'grve-blade-vc-extension' ),
							'circle' => __( 'Circle', 'grve-blade-vc-extension' ),
							'no-shape' => __( 'None', 'grve-blade-vc-extension' ),
						),
						$icon_shape
					);
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shape_type' ) ); ?>"><?php echo esc_html__( 'Shape Type:', 'grve-blade-vc-extension' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'shape_type' ) ); ?>" style="width:100%;">
				<?php
					blade_ext_print_select_options(
						array(
							'simple' => __( 'Simple', 'grve-blade-vc-extension' ),
							'outline' => __( 'Outline', 'grve-blade-vc-extension' ),
						),
						$icon_shape_type
					);
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shape_color' ) ); ?>"><?php echo esc_html__( 'Shape Color:', 'grve-blade-vc-extension' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'shape_color' ) ); ?>" style="width:100%;">
				<?php
					blade_ext_print_select_options(
						array(
							'primary-1' => __( 'Primary 1', 'grve-blade-vc-extension' ),
							'primary-2' => __( 'Primary 2', 'grve-blade-vc-extension' ),
							'primary-3' => __( 'Primary 3', 'grve-blade-vc-extension' ),
							'primary-4' => __( 'Primary 4', 'grve-blade-vc-extension' ),
							'primary-5' => __( 'Primary 5', 'grve-blade-vc-extension' ),
							'green' => __( 'Green', 'grve-blade-vc-extension' ),
							'orange' => __( 'Orange', 'grve-blade-vc-extension' ),
							'red' => __( 'Red', 'grve-blade-vc-extension' ),
							'blue' => __( 'Blue', 'grve-blade-vc-extension' ),
							'aqua' => __( 'Aqua', 'grve-blade-vc-extension' ),
							'purple' => __( 'Purple', 'grve-blade-vc-extension' ),
							'black' => __( 'Black', 'grve-blade-vc-extension' ),
							'grey' => __( 'Grey', 'grve-blade-vc-extension' ),
							'white' => __( 'White', 'grve-blade-vc-extension' ),
						),
						$shape_color
					);
				?>
			</select>
		</p>

		<p>
				<em><?php echo esc_html__( 'Note: Make sure you include the full URL (i.e. http://www.samplesite.com)', 'grve-blade-vc-extension' ); ?></em>
				<br>
				 <?php echo esc_html__( 'If you do not want a social to be visible, simply delete the supplied URL.', 'grve-blade-vc-extension' ); ?>
		</p>

		<?php
		foreach ( $blade_ext_social_list_extended as $social_item ) {

			$social_item_url = grve_blade_vce_array_value( $instance, $social_item['url'] );
		?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( $social_item['url'] ) ); ?>"><?php echo esc_html( $social_item['title'] ); ?>:</label>
					<input style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id( $social_item['url'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $social_item['url'] ) ); ?>" value="<?php echo esc_attr( $social_item_url ); ?>" />
				</p>

		<?php
		}
		?>

	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
