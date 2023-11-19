<?php

/*
 *	Media functions
 *
 * 	@version	1.0
 * 	@author		Greatives Team
 * 	@URI		http://greatives.eu
 */


 /**
 * Generic function that prints a slider/carousel navigation
 */
function blade_grve_element_navigation( $navigation_type = 0, $navigation_color = 'dark' ) {

	$output = '';

	if ( 0 != $navigation_type ) {

		switch( $navigation_type ) {

			case '2':
				$icon_nav_prev = 'grve-icon-arrow-left-alt';
				$icon_nav_next = 'grve-icon-arrow-right-alt';
				break;
			case '3':
				$icon_nav_prev = 'grve-icon-arrow-left';
				$icon_nav_next = 'grve-icon-arrow-right';
				break;
			case '4':
				$icon_nav_prev = 'grve-icon-arrow-left';
				$icon_nav_next = 'grve-icon-arrow-right';
				break;
			default:
				$navigation_type = '1';
				$icon_nav_prev = 'grve-icon-arrow-left-lg-alt';
				$icon_nav_next = 'grve-icon-arrow-right-lg-alt';
				break;
		}

		$output .= '<div class="grve-carousel-navigation grve-' . esc_attr( $navigation_color ) . ' grve-navigation-' . esc_attr( $navigation_type ) . '">';
		$output .= '	<div class="grve-carousel-buttons">';
		$output .= '		<div class="grve-carousel-prev">';
		$output .= '			<i class="' . esc_attr( $icon_nav_prev ) . '"></i>';
		$output .= '		</div>';
		$output .= '		<div class="grve-carousel-next">';
		$output .= '			<i class="' . esc_attr( $icon_nav_next ) . '"></i>';
		$output .= '		</div>';
		$output .= '	</div>';
		$output .= '</div>';
	}

	return 	$output;

}

/**
 * Generic function that prints a slider or gallery
 */
function blade_grve_print_gallery_slider( $gallery_mode, $slider_items , $image_size_slider = 'blade-grve-large-rect-horizontal', $extra_class = "") {

	if ( empty( $slider_items ) ) {
		return;
	}
	$image_size_gallery_thumb = 'blade-grve-small-rect-horizontal';
	if( 'gallery-vertical' == $gallery_mode ) {
		$image_size_gallery_thumb = $image_size_slider;
	}

	$start_block = $end_block = $item_class = '';


	if ( 'gallery' == $gallery_mode || '' == $gallery_mode || 'gallery-vertical' == $gallery_mode ) {

		$gallery_index = 0;

?>
		<div class="grve-media">
			<ul class="grve-post-gallery grve-post-gallery-popup <?php echo esc_attr( $extra_class ); ?>">
<?php

		foreach ( $slider_items as $slider_item ) {

			$media_id = $slider_item['id'];
			$full_src = wp_get_attachment_image_src( $media_id, 'blade-grve-fullscreen' );
			$image_full_url = $full_src[0];

			$caption = get_post_field( 'post_excerpt', $media_id );
			$figcaption = '';

			if	( !empty( $caption ) ) {
				$figcaption = wptexturize( $caption );
			}
			echo '<li class="grve-image-hover">';
			echo '<a data-title="' . esc_attr( $figcaption ) . '" href="' . esc_url( $image_full_url ) . '">';
			echo wp_get_attachment_image( $media_id, $image_size_gallery_thumb );
			echo '</a>';
			echo '</li>';
		}
?>
			</ul>
		</div>
<?php

	} else {

		$slider_settings = array();
		if ( is_singular( 'post' ) || is_singular( 'portfolio' ) ) {
			if ( is_singular( 'post' ) ) {
				$slider_settings = blade_grve_post_meta( 'grve_post_slider_settings' );
			} else {
				$slider_settings = blade_grve_post_meta( 'grve_portfolio_slider_settings' );
			}
		}
		$slider_speed = blade_grve_array_value( $slider_settings, 'slideshow_speed', '2500' );
		$slider_dir_nav = blade_grve_array_value( $slider_settings, 'direction_nav', '1' );
		$slider_dir_nav_color = blade_grve_array_value( $slider_settings, 'direction_nav_color', 'dark' );

?>
		<div class="grve-media clearfix">
			<div class="grve-element grve-carousel-wrapper">

			<?php echo blade_grve_element_navigation( $slider_dir_nav, $slider_dir_nav_color ); ?>

				<div class="grve-slider grve-carousel-element " data-slider-speed="<?php echo esc_attr( $slider_speed ); ?>" data-slider-pause="yes" data-slider-autoheight="no">
<?php
					foreach ( $slider_items as $slider_item ) {
						$media_id = $slider_item['id'];
						echo '<div class="grve-slider-item">';
						echo wp_get_attachment_image( $media_id, $image_size_slider );
						echo '</div>';
					}
?>
				</div>

			</div>
		</div>
<?php
	}
}

/**
 * Generic function that prints video settings ( HTML5 )
 */

if ( !function_exists( 'blade_grve_print_media_video_settings' ) ) {
	function blade_grve_print_media_video_settings( $video_settings ) {
		$video_attr = '';

		if ( !empty( $video_settings ) ) {

			$video_poster = blade_grve_array_value( $video_settings, 'poster' );
			$video_preload = blade_grve_array_value( $video_settings, 'preload', 'metadata' );

			if( 'yes' == blade_grve_array_value( $video_settings, 'controls' ) ) {
				$video_attr .= ' controls';
			}
			if( 'yes' == blade_grve_array_value( $video_settings, 'loop' ) ) {
				$video_attr .= ' loop="loop"';
			}
			if( 'yes' ==  blade_grve_array_value( $video_settings, 'muted' ) ) {
				$video_attr .= ' muted="muted"';
			}
			if( 'yes' == blade_grve_array_value( $video_settings, 'autoplay' ) ) {
				$video_attr .= ' autoplay="autoplay"';
			}
			if( 'yes' == blade_grve_array_value( $video_settings, 'playsinline' ) ) {
				$video_attr .= ' playsinline';
			}
			if( !empty( $video_poster ) ) {
				$video_attr .= ' poster="' . esc_url( $video_poster ) . '"';
			}
			$video_attr .= ' preload="' . esc_attr( $video_preload ) . '"';

		}
		return $video_attr;
	}
}

/**
 * Generic function that prints a video ( Embed or HTML5 )
 */
function blade_grve_print_media_video( $video_mode, $video_webm, $video_mp4, $video_ogv, $video_embed, $video_poster = '' ) {
	global $wp_embed;

	if( empty( $video_mode ) && !empty( $video_embed ) ) {
		echo '<div class="grve-media">' . $wp_embed->run_shortcode( '[embed]' . $video_embed . '[/embed]' ) . '</div>';
	} else {


		if ( !empty( $video_webm ) || !empty( $video_mp4 ) || !empty( $video_ogv ) ) {

			$video_settings = array(
				'controls' => 'yes',
				'poster' => $video_poster,
			);
			$video_settings = apply_filters( 'blade_grve_media_video_settings', $video_settings );

			echo '<div class="grve-media">';
			echo '<video ' . blade_grve_print_media_video_settings( $video_settings ) . ' >';

			if ( !empty( $video_webm ) ) {
				echo '<source src="' . esc_url( $video_webm ) . '" type="video/webm">';
			}
			if ( !empty( $video_mp4 ) ) {
				echo '<source src="' . esc_url( $video_mp4 ) . '" type="video/mp4">';
			}
			if ( !empty( $video_ogv ) ) {
				echo '<source src="' . esc_url( $video_ogv ) . '" type="video/ogg">';
			}
			echo '</video>';
			echo '</div>';

		}
	}

}

if ( !function_exists('blade_grve_get_image_size') ) {
	function blade_grve_get_image_size( $image_mode = 'large' ) {

		switch( $image_mode ) {
			case 'thumbnail':
				$image_size = 'thumbnail';
			break;
			case 'medium':
				$image_size = 'medium';
			break;
			case 'medium_large':
				$image_size = 'medium_large';
			break;
			case 'large':
				$image_size = 'large';
			break;
			case 'square':
				$image_size = 'blade-grve-small-square';
			break;
			case 'square-medium':
				$image_size = 'blade-grve-medium-square';
			break;			
			case 'landscape':
				$image_size = 'blade-grve-small-rect-horizontal';
			break;
			case 'portrait':
				$image_size = 'blade-grve-small-rect-vertical';
			break;
			case 'portrait-medium':
				$image_size = 'blade-grve-medium-rect-vertical';
			break;
			case 'landscape-small-wide':
				$image_size = 'blade-grve-small-rect-horizontal-wide';
			break;
			case 'landscape-large-wide':
				$image_size = 'blade-grve-large-rect-horizontal';
			break;
			case 'fullscreen':
			case 'extra-extra-large':
				$image_size = 'blade-grve-fullscreen';
			break;
			case 'full':
				$image_size = 'full';
			break;
			default:
				$image_size = 'large';
			break;
		}

		return $image_size;

	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
