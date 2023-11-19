<?php
/**
 * Privacy Google Fonts Shortcode
 */

if( !function_exists( 'grve_blade_vce_privacy_gfonts_shortcode' ) ) {

	function grve_blade_vce_privacy_gfonts_shortcode( $atts, $content ) {

		$output = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable Google Fonts.";
		}

		if ( function_exists( 'blade_grve_get_privacy_switch' ) ) {
			$output .= blade_grve_get_privacy_switch ( 'grve-privacy-content-gfonts' , $content );
		}

		return $output;
	}
	add_shortcode( 'grve_privacy_gfonts', 'grve_blade_vce_privacy_gfonts_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
