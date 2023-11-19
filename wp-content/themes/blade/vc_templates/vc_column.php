<?php

	extract(
		shortcode_atts(
			array(
				'width' => '1/1',
				'font_color' => '',
				'heading_color' => '',
				'vertical_content_position' => 'top',
				'desktop_hide' => '',
				'tablet_width' => '',
				'tablet_sm_width' => '',
				'mobile_width' => '',
				'el_class' => '',
				'offset' => '',
				'el_id' => '',
				'css' => '',
				'column_has_gap' => '',
			),
			$atts
		)
	);

	switch( $width ) {
		case '1/12':
			$shortcode_column = '1-12';
			break;
		case '1/6':
			$shortcode_column = '1-6';
			break;
		case '1/4':
			$shortcode_column = '1-4';
			break;
		case '1/3':
			$shortcode_column = '1-3';
			break;
		case '5/12':
			$shortcode_column = '5-12';
			break;
		case '1/2':
			$shortcode_column = '1-2';
			break;
		case '7/12':
			$shortcode_column = '7-12';
			break;
		case '2/3':
		case '4/6':
			$shortcode_column = '2-3';
			break;
		case '3/4':
			$shortcode_column = '3-4';
			break;
		case '5/6':
			$shortcode_column = '5-6';
			break;
		case '11/12':
			$shortcode_column = '11-12';
			break;
		case '1/5':
			$shortcode_column = '1-5';
			break;
		case '2/5':
			$shortcode_column = '2-5';
			break;
		case '3/5':
			$shortcode_column = '3-5';
			break;
		case '4/5':
			$shortcode_column = '4-5';
			break;
		case '1/1':
		default :
			$shortcode_column = '1';
			break;
	}

	$column_classes = array( 'wpb_column', 'grve-column' );
	$column_classes[] = 'grve-column-' . $shortcode_column;

	if ( !empty ( $heading_color ) ) {
		$column_classes[] = 'grve-headings-' . $heading_color;
	}

	$css_custom = blade_grve_vc_shortcode_custom_css_class( $css, '' );
	if ( !empty( $css_custom ) && 'yes' != $column_has_gap ) {
		$column_classes[] = $css_custom;
	}

	if( vc_settings()->get( 'not_responsive_css' ) != '1') {

		if ( !empty( $desktop_hide ) ) {
			$column_classes[] = 'grve-desktop-column-' . $desktop_hide;
		}
		if ( !empty( $tablet_width ) ) {
			$column_classes[] = 'grve-tablet-column-' . $tablet_width;
		}
		if ( !empty( $tablet_sm_width ) ) {
			$column_classes[] = 'grve-tablet-sm-column-' . $tablet_sm_width;
		} else {
			if ( !empty( $tablet_width ) ) {
				$column_classes[] = 'grve-tablet-sm-column-' . $tablet_width;
			}
		}
		if ( !empty( $mobile_width ) ) {
			$column_classes[] = 'grve-mobile-column-' . $mobile_width;
		}
	}

	if ( !empty ( $el_class ) ) {
		$column_classes[] = $el_class;
	}
	if ( !empty ( $responsive_class ) ) {
		$column_classes[] = $responsive_class;
	}

	if( 'top' != $vertical_content_position && 'yes' != $column_has_gap ) {
		$column_classes[] = 'grve-flex grve-flex-position-' . $vertical_content_position;
	}

	$column_string = implode( ' ', $column_classes );

	$style = blade_grve_build_shortcode_style(
		array(
			'font_color' => $font_color,
		)
	);

	$column_attributes = array();
	$column_attributes[] = 'class="' . esc_attr( trim( $column_string ) ) . '"';
	if ( ! empty( $el_id ) ) {
		$column_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
	}
	if ( ! empty( $style ) && 'yes' != $column_has_gap ) {
		$column_attributes[] = $style;
	}

	// Wrapper Classes
	$wrapper_classes = array( 'grve-column-wrapper' );
	if ( !empty( $css_custom ) && 'yes' == $column_has_gap ) {
		$wrapper_classes[] = $css_custom;
	}

	if( 'top' != $vertical_content_position && 'yes' == $column_has_gap ) {
		$wrapper_classes[] = 'grve-flex grve-flex-position-' . $vertical_content_position;
	}

	$wrapper_string = implode( ' ', $wrapper_classes );

	$wrapper_attributes = array();
	$wrapper_attributes[] = 'class="' . esc_attr( trim( $wrapper_string ) ) . '"';

	if ( ! empty( $style ) && 'yes' == $column_has_gap ) {
		$wrapper_attributes[] = $style;
	}

	$output= '';
	if ( 'yes' == $column_has_gap ) {
		echo '<div ' . implode( ' ', $column_attributes ) . '>';
		echo '  <div ' . implode( ' ', $wrapper_attributes ) . '>';

		if( $vertical_content_position != 'top' ) {
			echo '<div class="grve-column-content">' . do_shortcode( $content ) . '</div>' ;
		} else {
			echo do_shortcode( $content );
		}
		echo '  </div>';
		echo '</div>';
	} else {
		echo '<div ' . implode( ' ', $column_attributes ) . '>';
		if( $vertical_content_position != 'top' ) {
			echo '<div class="grve-column-content">' . do_shortcode( $content ) . '</div>' ;
		} else {
			echo do_shortcode( $content );
		}
		echo '</div>';
	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
