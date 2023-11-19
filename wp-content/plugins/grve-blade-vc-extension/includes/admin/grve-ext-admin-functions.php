<?php
/*
*	Admin Functions
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function blade_ext_admin_menu(){
	if ( current_user_can( 'edit_theme_options' ) ) {
		if ( function_exists( 'blade_grve_info') ) {
			add_submenu_page( 'grve-blade-vc-extension', esc_html__('Custom Codes','grve-blade-vc-extension'), esc_html__('Custom Codes','grve-blade-vc-extension'), 'edit_theme_options', 'blade-codes', 'blade_ext_admin_page_html_codes' );
		} else {
			add_menu_page( 'Blade', 'Blade', 'edit_theme_options', 'grve-blade-vc-extension', 'blade_ext_admin_page_html_codes', GRVE_BLADE_VC_EXT_PLUGIN_DIR_URL .'assets/images/adminmenu/theme.png', 4 );
			add_submenu_page( 'grve-blade-vc-extension', esc_html__('Custom Codes','grve-blade-vc-extension'), esc_html__('Custom Codes','grve-blade-vc-extension'), 'edit_theme_options', 'blade-codes', 'blade_ext_admin_page_html_codes' );
		}
	}
}
add_action( 'admin_menu', 'blade_ext_admin_menu', 11 );


function blade_ext_admin_page_html_codes(){
	require_once GRVE_BLADE_VC_EXT_PLUGIN_DIR_PATH . 'includes/admin/grve-ext-admin-page-codes.php';
}

function blade_ext_admin_links( $active_tab = 'status' ){
?>
	<a href="?page=blade-codes" class="nav-tab <?php echo 'codes' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Custom Codes','grve-blade-vc-extension'); ?></a>
<?php
}
add_action( 'blade_grve_admin_links', 'blade_ext_admin_links' );

function blade_ext_add_settings() {

	if ( isset( $_POST['_blade_ext_options_nonce_save'] ) && wp_verify_nonce( $_POST['_blade_ext_options_nonce_save'], 'blade_ext_options_nonce_save' ) ) {

		if ( isset( $_POST['blade_grve_ext_options'] ) ) {
			$options = get_option('blade_grve_ext_options');

			$keys = array_keys( $_POST['blade_grve_ext_options'] );
			foreach ( $keys as $key ) {
				if ( isset( $_POST['blade_grve_ext_options'][$key] ) ) {
					$options[$key] = $_POST['blade_grve_ext_options'][$key];
				}
			}
			if ( empty( $options ) ) {
				delete_option( 'blade_grve_ext_options' );
			} else {
				update_option( 'blade_grve_ext_options', $options );
			}
		}
		wp_safe_redirect( 'admin.php?page=blade-codes&ext-settings=saved' );
	}
}
add_action( 'admin_menu', 'blade_ext_add_settings' );



if ( !function_exists('blade_ext_print_head_code') ) {
	function blade_ext_print_head_code() {
		$options = get_option('blade_grve_ext_options');
		$code = grve_blade_vce_array_value( $options, 'head_code' );
		if ( !empty( $code ) ) {
			echo wp_unslash( $code );
		}
	}
}
add_action('wp_head', 'blade_ext_print_head_code');

if ( !function_exists('blade_ext_print_body_code') ) {
	function blade_ext_print_body_code() {
		$options = get_option('blade_grve_ext_options');
		$code = grve_blade_vce_array_value( $options, 'body_code' );
		if ( !empty( $code ) ) {
			echo wp_unslash( $code );
		}
	}
}
add_action('blade_grve_body_top', 'blade_ext_print_body_code');

if ( !function_exists('blade_ext_print_footer_code') ) {
	function blade_ext_print_footer_code() {
		$options = get_option('blade_grve_ext_options');
		$code = grve_blade_vce_array_value( $options, 'footer_code' );
		if ( !empty( $code ) ) {
			echo wp_unslash( $code );
		}
	}
}
add_action('wp_footer', 'blade_ext_print_footer_code');

//Omit closing PHP tag to avoid accidental whitespace output errors.
