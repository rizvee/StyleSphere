<?php
/**
 * Privacy Google Maps Shortcode
 */

if( !function_exists( 'grve_blade_vce_privacy_gmaps_shortcode' ) ) {

	function grve_blade_vce_privacy_gmaps_shortcode( $atts, $content ) {

		$output = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable Google Maps.";
		}

		if ( function_exists( 'blade_grve_get_privacy_switch' ) ) {
			$output .= blade_grve_get_privacy_switch ( 'grve-privacy-content-gmaps' , $content );
		}

		return $output;
	}
	add_shortcode( 'grve_privacy_gmaps', 'grve_blade_vce_privacy_gmaps_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
