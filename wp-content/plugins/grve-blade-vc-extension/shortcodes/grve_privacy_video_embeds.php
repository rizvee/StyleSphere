<?php
/**
 * Privacy Video Embeds Shortcode
 */

if( !function_exists( 'grve_blade_vce_privacy_video_embeds_shortcode' ) ) {

	function grve_blade_vce_privacy_video_embeds_shortcode( $atts, $content ) {

		$output = $el_class = '';

		if( empty( $content ) ) {
			$content = "Click to enable/disable video embeds.";
		}

		if ( function_exists( 'blade_grve_get_privacy_switch' ) ) {
			$output .= blade_grve_get_privacy_switch ( 'grve-privacy-content-video-embeds' , $content );
		}

		return $output;
	}
	add_shortcode( 'grve_privacy_video_embeds', 'grve_blade_vce_privacy_video_embeds_shortcode' );

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
