<?php
/**
 * Privacy Google Tracking Code Shortcode
 */

if( !function_exists( 'grve_blade_vce_privacy_gtracking_shortcode' ) ) {

	function grve_blade_vce_privacy_gtracking_shortcode( $atts, $content ) {

		$output = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable Google Analytics tracking code.";
		}

		if ( function_exists( 'blade_grve_get_privacy_switch' ) ) {
			$output .= blade_grve_get_privacy_switch ( 'grve-privacy-content-gtracking' , $content );
		}

		return $output;
	}
	add_shortcode( 'grve_privacy_gtracking', 'grve_blade_vce_privacy_gtracking_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
