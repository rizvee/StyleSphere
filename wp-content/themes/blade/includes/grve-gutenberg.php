<?php

/*
*	Gutenberg functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/
/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function blade_grve_gutenberg_styles() {
	 wp_enqueue_style( 'blade-grve-editor-customizer-styles', get_template_directory_uri() .  '/includes/css/grve-gutenberg-editor.css' , false, '1.0', 'all' );
	 wp_add_inline_style( 'blade-grve-editor-customizer-styles', blade_grve_custom_colors_css() );
}
add_action( 'enqueue_block_editor_assets', 'blade_grve_gutenberg_styles' );



function blade_grve_editor_custom_title_colors_css( $post ) {

	$post_id = $post->ID;
	$mode = $post->post_type;

	$image_url = '';
	$css = '';

	$blade_grve_page_title = array(
		'title_color' => blade_grve_option( $mode . '_title_color' ),
		'title_color_custom' => blade_grve_option( $mode . '_title_color_custom' ),
		'content_position' => blade_grve_option( $mode . '_title_content_position' ),
		'bg_mode' => blade_grve_option( $mode . '_title_bg_mode' ),
		'bg_image_id' => blade_grve_option( $mode . '_title_bg_image', '', 'id' ),
		'bg_position' => blade_grve_option( $mode . '_title_bg_position' ),
		'bg_color' => blade_grve_option( $mode . '_title_bg_color', 'dark' ),
		'bg_color_custom' => blade_grve_option( $mode . '_title_bg_color_custom' ),
	);

	$blade_grve_custom_title_options = get_post_meta( $post_id, 'grve_custom_title_options', true );
	$blade_grve_title_style = blade_grve_option( $mode . '_title_style' );
	$blade_grve_page_title_custom = blade_grve_array_value( $blade_grve_custom_title_options, 'custom', $blade_grve_title_style );

	if ( 'simple' !== $blade_grve_page_title_custom ) {
		if ( 'custom' == $blade_grve_page_title_custom ) {
			$blade_grve_page_title = $blade_grve_custom_title_options;
		}

		$title_bg_color = blade_grve_array_value( $blade_grve_page_title, 'bg_color', 'dark' );
		if ( 'custom' == $title_bg_color ) {
			$title_bg_color = blade_grve_array_value( $blade_grve_page_title, 'bg_color_custom', 'F8F8FB' );
		} elseif ( 'transparent' == $title_bg_color ) {
			$title_bg_color = 'transparent';
		} else {
			$title_bg_color = blade_grve_array_value( blade_grve_get_color_array(), $title_bg_color , 'dark' );
		}

		$title_color = blade_grve_array_value( $blade_grve_page_title, 'title_color', 'light' );
		if ( 'custom' == $title_color ) {
			$title_color = blade_grve_array_value( $blade_grve_page_title, 'title_color_custom', '#000000' );
		} else {
			$title_color = blade_grve_array_value( blade_grve_get_color_array(), $title_color , '#000000' );
		}
		
		
		$bg_mode = blade_grve_array_value( $blade_grve_page_title, 'bg_mode', 'color' );
		if ( 'color' != $bg_mode ) {

			$bg_position = blade_grve_array_value( $blade_grve_page_title, 'bg_position', 'center-center' );

			$media_id = '0';

			if ( 'featured' == $bg_mode ) {
				if( has_post_thumbnail( $post_id ) ) {
					$media_id = get_post_thumbnail_id( $post_id );
				}
			} else if ( 'custom' ) {
				$media_id = blade_grve_array_value( $blade_grve_page_title, 'bg_image_id' );
			}
			$full_src = wp_get_attachment_image_src( $media_id, 'blade-grve-fullscreen' );
			if( $full_src ){
				$image_url = $full_src[0];
			}
		}
		
		$content_position = blade_grve_array_value( $blade_grve_page_title, 'content_position', 'center-center' );
		switch( $content_position ) {

			case 'left-center':
			case 'left-top':
			case 'left-bottom':
				$title_align = 'left';
				break;
			case 'right-center':
			case 'right-top':
			case 'right-bottom':
				$title_align = 'right';
				break;
			case 'center-center':
			case 'center-top':
			case 'center-bottom':
				$title_align = 'center';
				break;
		}
		
		$css .= "
			.editor-styles-wrapper  .wp-block.editor-post-title__block {
				margin-bottom: 0;
			}
			.editor-styles-wrapper .edit-post-visual-editor__post-title-wrapper {
				background-color: " . esc_attr( $title_bg_color ) . ";
			}
			.editor-styles-wrapper .editor-post-title {
				padding-top: 60px;
				padding-bottom: 60px;
			}
			.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
			.editor-styles-wrapper .editor-post-title {
				text-align: " . esc_attr( $title_align ) .";
				color: " . esc_attr( $title_color ) . ";
			}
		";
					
		if( !empty( $image_url ) ) {
		$css .= "
			.editor-styles-wrapper .edit-post-visual-editor__post-title-wrapper {
				background-image: url(" . esc_url( $image_url ) . ");
				background-position: center center;
				background-size: cover;
				background-repeat: no-repeat;
			}
		";
		}		

		if ( 'post' == $post->post_type	) {
			$css .= "
				.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper .editor-post-title {
					font-family: " . blade_grve_option( 'post_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
					font-weight: " . blade_grve_option( 'post_title', 'normal', 'font-weight'  ) . ";
					font-style: " . blade_grve_option( 'post_title', 'normal', 'font-style'  ) . ";
					font-size: " . blade_grve_option( 'post_title', '60px', 'font-size'  ) . ";
					text-transform: " . blade_grve_option( 'post_title', 'uppercase', 'text-transform'  ) . ";
					line-height: " . blade_grve_option( 'post_title', '112px', 'line-height'  ) . ";
					" . blade_grve_css_option( 'post_title', '0px', 'letter-spacing'  ) . "
				}
			";
		} else {
			$css .= "
				.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper .editor-post-title {
					font-family: " . blade_grve_option( 'page_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
					font-weight: " . blade_grve_option( 'page_title', 'normal', 'font-weight'  ) . ";
					font-style: " . blade_grve_option( 'page_title', 'normal', 'font-style'  ) . ";
					font-size: " . blade_grve_option( 'page_title', '60px', 'font-size'  ) . ";
					text-transform: " . blade_grve_option( 'page_title', 'uppercase', 'text-transform'  ) . ";
					line-height: " . blade_grve_option( 'page_title', '60px', 'line-height'  ) . ";
					" . blade_grve_css_option( 'page_title', '0px', 'letter-spacing'  ) . "
				}
			";
		}
	} else {
		if ( 'post' == $post->post_type	) {
			$css .= "
				.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper .editor-post-title {
					font-family: " . blade_grve_option( 'post_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
					font-weight: " . blade_grve_option( 'post_title', 'normal', 'font-weight'  ) . ";
					font-style: " . blade_grve_option( 'post_title', 'normal', 'font-style'  ) . ";
					font-size: " . blade_grve_option( 'post_title', '60px', 'font-size'  ) . ";
					text-transform: " . blade_grve_option( 'post_title', 'uppercase', 'text-transform'  ) . ";
					line-height: " . blade_grve_option( 'post_title', '112px', 'line-height'  ) . ";
					" . blade_grve_css_option( 'post_title', '0px', 'letter-spacing'  ) . "
				}
			";
		}
	}




	return $css;

}

function blade_grve_custom_colors_css() {

	global $post, $pagenow;
	$css = "";

	$css .= "
		.edit-post-visual-editor .editor-block-list__layout {
			background-color: " . blade_grve_option( 'main_content_background_color' ) . ";
			padding-top: 40px;
			padding-bottom: 40px;
		}
		.edit-post-visual-editor .editor-block-list__block-edit,
		.edit-post-visual-editor {
			color: " . blade_grve_option( 'body_text_color' ) . ";
		}
	";

	/* Link Colors */

	$css .= "
	.editor-styles-wrapper a,
	.editor-styles-wrapper a code,
	.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce a code {
		color: " . blade_grve_option( 'body_text_link_color' ) . ";

	}
	.editor-styles-wrapper a:hover,
	.editor-styles-wrapper a:hover code {
		color: " . blade_grve_option( 'body_text_link_hover_color' ) . ";
	}
	";

	/* Header Colors */
	$css .= "
	.editor-styles-wrapper h1,
	.editor-styles-wrapper h2,
	.editor-styles-wrapper h3,
	.editor-styles-wrapper h4,
	.editor-styles-wrapper h5,
	.editor-styles-wrapper h6 {
		color: " . blade_grve_option( 'body_heading_color' ) . ";
	}
	";

	if ( $pagenow == 'post-new.php' || $pagenow == 'post.php' ) {

		$post_id = $post->ID;
		$mode = $post->post_type;


		$css .= blade_grve_editor_custom_title_colors_css( $post );
		
		$content_width = blade_grve_option( 'container_size', 1170 );
		if ( 'post' == $post->post_type	) {
			$content_width = blade_grve_post_meta( 'grve_post_content_width', blade_grve_option( 'post_content_width', 990 ) );
		}	

		$css .= "
		.editor-styles-wrapper .wp-block {
			max-width: " . esc_attr( $content_width ) . "px;
		}
		.edit-post-visual-editor .editor-block-list__block-edit,
		.edit-post-visual-editor {
			font-size: " . blade_grve_option( 'body_font', '14px', 'font-size'  ) . ";
			font-family: " . blade_grve_option( 'body_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
			font-weight: " . blade_grve_option( 'body_font', 'normal', 'font-weight'  ) . ";
			line-height: " . blade_grve_option( 'body_font', '36px', 'line-height'  ) . ";
			" . blade_grve_css_option( 'body_font', '0px', 'letter-spacing'  ) . "
		}
		";

	}
	$css .= "

	.mce-content-body h1,
	.editor-styles-wrapper h1,
	.editor-styles-wrapper .grve-h1,
	.wp-block-freeform.block-library-rich-text__tinymce h1,
	.wp-block-heading h1.editor-rich-text__tinymce {
		font-family: " . blade_grve_option( 'headings_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'headings_font', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'headings_font', 'normal', 'font-style'  ) . ";
		text-transform: " . blade_grve_option( 'headings_font', 'uppercase', 'text-transform'  ) . ";
		font-size: " . blade_grve_option( 'h1_font', '56px', 'font-size'  ) . ";
		line-height: " . blade_grve_option( 'h1_font', '60px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'h1_font', '0px', 'letter-spacing'  ) . "
	}

	.editor-styles-wrapper h2,
	.editor-styles-wrapper .grve-h2,
	.wp-block-freeform.block-library-rich-text__tinymce h2,
	.wp-block-heading h2.editor-rich-text__tinymce {
		font-family: " . blade_grve_option( 'headings_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'headings_font', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'headings_font', 'normal', 'font-style'  ) . ";
		text-transform: " . blade_grve_option( 'headings_font', 'uppercase', 'text-transform'  ) . ";
		font-size: " . blade_grve_option( 'h2_font', '36px', 'font-size'  ) . ";
		line-height: " . blade_grve_option( 'h2_font', '40px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'h2_font', '0px', 'letter-spacing'  ) . "
	}

	.editor-styles-wrapper h3,
	.editor-styles-wrapper .grve-h3,
	.wp-block-freeform.block-library-rich-text__tinymce h3,
	.wp-block-heading h3.editor-rich-text__tinymce {
		font-family: " . blade_grve_option( 'headings_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'headings_font', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'headings_font', 'normal', 'font-style'  ) . ";
		text-transform: " . blade_grve_option( 'headings_font', 'uppercase', 'text-transform'  ) . ";
		font-size: " . blade_grve_option( 'h3_font', '30px', 'font-size'  ) . ";
		line-height: " . blade_grve_option( 'h3_font', '33px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'h3_font', '0px', 'letter-spacing'  ) . "
	}

	.editor-styles-wrapper h4,
	.editor-styles-wrapper .grve-h4,
	.wp-block-freeform.block-library-rich-text__tinymce h4,
	.wp-block-heading h4.editor-rich-text__tinymce {
		font-family: " . blade_grve_option( 'headings_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'headings_font', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'headings_font', 'normal', 'font-style'  ) . ";
		text-transform: " . blade_grve_option( 'headings_font', 'uppercase', 'text-transform'  ) . ";
		font-size: " . blade_grve_option( 'h4_font', '23px', 'font-size'  ) . ";
		line-height: " . blade_grve_option( 'h4_font', '26px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'h4_font', '0px', 'letter-spacing'  ) . "
	}

	.editor-styles-wrapper h5,
	.editor-styles-wrapper .grve-h5,
	.wp-block-freeform.block-library-rich-text__tinymce h5,
	.wp-block-heading h5.editor-rich-text__tinymce {
		font-family: " . blade_grve_option( 'headings_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'headings_font', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'headings_font', 'normal', 'font-style'  ) . ";
		text-transform: " . blade_grve_option( 'headings_font', 'uppercase', 'text-transform'  ) . ";
		font-size: " . blade_grve_option( 'h5_font', '18px', 'font-size'  ) . ";
		line-height: " . blade_grve_option( 'h5_font', '20px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'h5_font', '0px', 'letter-spacing'  ) . "
	}

	.editor-styles-wrapper h6,
	.editor-styles-wrapper .grve-h6,
	.wp-block-freeform.block-library-rich-text__tinymce h6,
	.wp-block-heading h6.editor-rich-text__tinymce {
		font-family: " . blade_grve_option( 'headings_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'headings_font', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'headings_font', 'normal', 'font-style'  ) . ";
		text-transform: " . blade_grve_option( 'headings_font', 'uppercase', 'text-transform'  ) . ";
		font-size: " . blade_grve_option( 'h6_font', '16px', 'font-size'  ) . ";
		line-height: " . blade_grve_option( 'h6_font', '18px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'h6_font', '0px', 'letter-spacing'  ) . "
	}

	.editor-styles-wrapper blockquote p,
	.editor-styles-wrapper blockquote,
	.wp-block-freeform.block-library-rich-text__tinymce blockquote,
	.wp-block-freeform.block-library-rich-text__tinymce blockquote p,
	.wp-block-quote cite,
	.wp-block-pullquote cite,
	.wp-block-quote footer,
	.wp-block-pullquote footer,
	.wp-block-quote__citation,
	.wp-block-pullquote__citation {
		font-family: " . blade_grve_option( 'leader_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-weight: " . blade_grve_option( 'leader_text', 'normal', 'font-weight'  ) . ";
		font-style: " . blade_grve_option( 'leader_text', 'normal', 'font-style'  ) . ";
		font-size: " . blade_grve_option( 'leader_text', '34px', 'font-size'  ) . ";
		text-transform: " . blade_grve_option( 'leader_text', 'none', 'text-transform'  ) . ";
		line-height: " . blade_grve_option( 'leader_text', '36px', 'line-height'  ) . ";
		" . blade_grve_css_option( 'leader_text', '0px', 'letter-spacing'  ) . "
	}
	.editor-styles-wrapper blockquote:before {
		font-family: " . blade_grve_option( 'leader_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
		font-style: " . blade_grve_option( 'leader_text', 'normal', 'font-style'  ) . ";
	}
	.editor-styles-wrapper .wp-block-quote::before {
		background-color: " . blade_grve_option( 'body_primary_1_color' ) . ";
		color: #ffffff;
	}	
	";

	$css .= "
	.editor-styles-wrapper table,
	.editor-styles-wrapper tr,
	.editor-styles-wrapper td,
	.editor-styles-wrapper th,
	.editor-styles-wrapper form,
	.editor-styles-wrapper form p,
	.editor-styles-wrapper label,
	.editor-styles-wrapper div,
	.editor-styles-wrapper hr {
		border-color: " . blade_grve_option( 'body_border_color' ) . " !important;
	}

	.editor-styles-wrapper hr.is-style-dots:before {
		color: " . blade_grve_option( 'body_border_color' ) . " !important;
	}

	";

	return $css;
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
