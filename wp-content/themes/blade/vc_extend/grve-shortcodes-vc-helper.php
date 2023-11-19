<?php
/*
*	Greatives Visual Composer Shortcode helper functions
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

function blade_grve_vc_social_elements_visibility() {
	$visibility = apply_filters( 'blade_grve_vc_social_elements_visibility', false );
	return $visibility;
}
function blade_grve_vc_wp_elements_visibility() {
	$visibility = apply_filters( 'blade_grve_vc_wp_elements_visibility', false );
	return $visibility;
}
function blade_grve_vc_grid_visibility() {
	$visibility = blade_grve_visibility( 'vc_grid_visibility' );
	$visibility = apply_filters( 'blade_grve_vc_grid_visibility', $visibility );
	return $visibility;
}
function blade_grve_vc_charts_visibility() {
	$visibility = blade_grve_visibility( 'vc_charts_visibility' );
	$visibility = apply_filters( 'blade_grve_vc_charts_visibility', $visibility );
	return $visibility;
}
function blade_grve_vc_other_elements_visibility() {
	$visibility = apply_filters( 'blade_grve_vc_other_elements_visibility', false );
	return $visibility;
}

function blade_grve_build_shortcode_img_style( $bg_image = '' , $bg_image_size = '' ) {

	$has_image = false;
	$style = '';

	if ( empty ( $bg_image_size ) ) {
		$bg_image_size = blade_grve_option( 'row_section_bg_size' );
	}
	$image_size = blade_grve_get_image_size( $bg_image_size );

	if((int)$bg_image > 0 && ($attachment_src = wp_get_attachment_image_src( $bg_image, $image_size )) !== false) {

		$image_url = $attachment_src[0];

		$has_image = true;
		$style .= "background-image: url(".$image_url.");";
		return ' style="'.$style.'"';
	}

}

function blade_grve_vc_shortcode_img_url( $bg_image = '', $bg_image_size = ''  ) {
	if ( empty ( $bg_image_size ) ) {
		$bg_image_size = blade_grve_option( 'row_section_bg_size' );
	}
	$image_size = blade_grve_get_image_size( $bg_image_size );

	if((int)$bg_image > 0 && ($attachment_src = wp_get_attachment_image_src( $bg_image, $image_size )) !== false) {
		$image_url = $attachment_src[0];
	} else {
		$image_url = '';
	}
	return $image_url;

}

function blade_grve_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
}

function blade_grve_build_shortcode_style( $item = array() ) {

	$style = '';

	$bg_color = blade_grve_array_value( $item, 'bg_color' );
	$bg_gradient_color_1 = blade_grve_array_value( $item, 'bg_gradient_color_1' );
	$bg_gradient_color_2 = blade_grve_array_value( $item, 'bg_gradient_color_2' );
	$bg_gradient_direction = blade_grve_array_value( $item, 'bg_gradient_direction' );
	$font_color = blade_grve_array_value( $item, 'font_color' );
	$padding_top = blade_grve_array_value( $item, 'padding_top');
	$padding_bottom = blade_grve_array_value( $item, 'padding_bottom' );
	$margin_bottom = blade_grve_array_value( $item, 'margin_bottom' );

	if(!empty($bg_color)) {
		$style .= blade_grve_get_css_color( 'background-color', $bg_color );
	}

	if( !empty($bg_gradient_color_1) && !empty($bg_gradient_color_2) && !empty($bg_gradient_direction) ) {
		$style .= blade_grve_get_css_color( 'background', $bg_gradient_color_1 );
		$style .= 'background: linear-gradient(' . $bg_gradient_direction. 'deg,' . $bg_gradient_color_1 . ' 0%,' . $bg_gradient_color_2 .' 100%);';
	}

	if( !empty($font_color) ) {
		$style .= blade_grve_get_css_color( 'color', $font_color );
	}
	if( $padding_top != '' ) {
		$style .= 'padding-top: '.(preg_match('/(px|em|\%|pt|cm)$/', $padding_top) ? $padding_top : $padding_top.'px').';';
	}
	if( $padding_bottom != '' ) {
		$style .= 'padding-bottom: '.(preg_match('/(px|em|\%|pt|cm)$/', $padding_bottom) ? $padding_bottom : $padding_bottom.'px').';';
	}
	if( $margin_bottom != '' ) {
		$style .= 'margin-bottom: '.(preg_match('/(px|em|\%|pt|cm)$/', $margin_bottom) ? $margin_bottom : $margin_bottom.'px').';';
	}
	return empty($style) ? $style : ' style="'.$style.'"';
}



if ( !blade_grve_vc_grid_visibility() ) {

	//Remove Builder Grid Menu
	function blade_grve_remove_vc_menu_items( ){
		remove_menu_page( 'edit.php?post_type=vc_grid_item' );
		remove_submenu_page( 'vc-general', 'edit.php?post_type=vc_grid_item' );
	}
	add_filter( 'admin_menu', 'blade_grve_remove_vc_menu_items' );

	//Remove grid element shortcodes
	function blade_grve_vc_remove_shortcodes_from_vc_grid_element( $shortcodes ) {
		unset( $shortcodes['vc_icon'] );
		unset( $shortcodes['vc_button2'] );
		unset( $shortcodes['vc_btn'] );
		unset( $shortcodes['vc_custom_heading'] );
		unset( $shortcodes['vc_single_image'] );
		unset( $shortcodes['vc_empty_space'] );
		unset( $shortcodes['vc_separator'] );
		unset( $shortcodes['vc_text_separator'] );
		unset( $shortcodes['vc_gitem_post_title'] );
		unset( $shortcodes['vc_gitem_post_excerpt'] );
		unset( $shortcodes['vc_gitem_post_date'] );
		unset( $shortcodes['vc_gitem_image'] );
		unset( $shortcodes['vc_gitem_post_meta'] );

	  return $shortcodes;
	}
	add_filter( 'vc_grid_item_shortcodes', 'blade_grve_vc_remove_shortcodes_from_vc_grid_element', 100 );
}
//Remove all default templates.
add_filter( 'vc_load_default_templates', 'blade_grve_remove_custom_template_array' );
function blade_grve_remove_custom_template_array( $data ) {
	return array();
}

/**
 * VC Disable Updater Functions
 */
function blade_grve_vc_disable_updater_dialog() {

	$auto_updater = blade_grve_visibility( 'vc_auto_updater' );
	if( !$auto_updater ) {
		global $vc_manager;

		if ( $vc_manager && method_exists( $vc_manager , 'disableUpdater' ) ) {
			$vc_manager->disableUpdater( true );
		}
	}
}
add_action( 'vc_before_init', 'blade_grve_vc_disable_updater_dialog', 9 );


function blade_grve_vc_updater_notification() {

	echo "<br>" .
		esc_html__( 'Note: In every new release of the Theme the latest compatible version of Page Builder is included.', 'blade' ) .
		" " .
		sprintf( '<a href="//docs.greatives.eu/tutorials/bundled-plugins/" target="_blank" rel="noopener noreferrer">%s</a>', esc_html__( 'Theme Bundled Plugins', 'blade' ) );
}

function blade_grve_vc_license_tab_notice() {
	$auto_updater = blade_grve_visibility( 'vc_auto_updater' );
	if( $auto_updater ) {
		$screen = get_current_screen();
		if ( 'visual-composer_page_vc-updater' == $screen->id ) {
			echo '<div class="error"><p><strong>'. esc_html__( 'Activating Page Builder plugin is optional and NOT required for the functionality of the Theme. In every new release of the Theme the latest compatible version of Page Builder is included.', 'blade' ) .'</strong></p></div>';
		}
	}
}
add_action( 'admin_notices', 'blade_grve_vc_license_tab_notice' );

//Omit closing PHP tag to avoid accidental whitespace output errors.
