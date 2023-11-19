<?php

/*
*	Theme update functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

/**
 * Display theme update notices in the admin area
 */
function blade_grve_admin_notices() {

	$message = '';
	if ( is_super_admin() ) {

		if ( ( defined( 'GRVE_BLADE_VC_EXT_VERSION' ) && version_compare( '3.0', GRVE_BLADE_VC_EXT_VERSION, '>' ) ) && !get_user_meta( get_current_user_id(), 'blade_grve_dismissed_notice_update_plugins', true ) ) {

		$plugins_link = 'admin.php?page=blade-tgmpa-install-plugins';
			$message = esc_html__( "Note: Blade v3 is a major theme release so be sure to update the required plugins, especially Blade Extension, to avoid any compatibility issues.", 'blade' ) .
						" <a href='" . esc_url( admin_url() . $plugins_link ) . "'>" . esc_html__( "Theme Plugins", 'blade' ) . "</a>";
			$message .=  '<br/><span><a href="' .esc_url( wp_nonce_url( add_query_arg( 'blade-grve-dismiss', 'dismiss_update_plugins_notice' ), 'blade-grve-dismiss-' . get_current_user_id() ) ) . '" class="dismiss-notice" target="_parent">' . esc_html__( "Dismiss this notice", 'blade' ) . '</a><span>';
			add_settings_error(
				'grve-theme-update-message',
				'plugins_update_required',
				$message,
				'updated'
			);
			if ( 'options-general' !== $GLOBALS['current_screen']->parent_base ) {
				settings_errors( 'grve-theme-update-message' );
			}

		}

		if ( !class_exists( 'Envato_Market' ) && !get_user_meta( get_current_user_id(), 'blade_grve_dismissed_notice_envato_market', true ) ) {

			$envato_market_link = 'admin.php?page=blade-tgmpa-install-plugins';
			$message = esc_html__( "Note:", "blade" ) . " " . esc_html__( "Envato official solution is recommended for theme updates using the new Envato Market API.", 'blade' ) .
					"<br/>" . esc_html__( "You can now update the theme using the", 'blade' ) . " " . "<a href='" . esc_url( admin_url() . $envato_market_link ) . "'>" . esc_html__( "Envato Market", 'blade' ) . "</a>" . " ". esc_html__( "plugin", 'blade' ) . "." .
					" " . esc_html__( "For more information read the related article in our", 'blade' ) . " " . "<a href='//docs.greatives.eu/tutorials/envato-market-wordpress-plugin-for-theme-updates/' target='_blank'>" . esc_html__( "documentation", 'blade' ) . "</a>.";

			$message .=  '<br/><span><a href="' .esc_url( wp_nonce_url( add_query_arg( 'blade-grve-dismiss', 'dismiss_envato_market_notice' ), 'blade-grve-dismiss-' . get_current_user_id() ) ) . '" class="dismiss-notice" target="_parent">' . esc_html__( "Dismiss this notice", 'blade' ) . '</a><span>';

			add_settings_error(
				'grve-envato-market-message',
				'plugins_update_required',
				$message,
				'updated'
			);
			if ( 'options-general' !== $GLOBALS['current_screen']->parent_base ) {
				settings_errors( 'grve-envato-market-message' );
			}

		}

	}

}
add_action( 'admin_notices', 'blade_grve_admin_notices' );

/**
 * Dismiss notices and update user meta data
 */
function blade_grve_notice_dismiss() {
	if ( isset( $_GET['blade-grve-dismiss'] ) && check_admin_referer( 'blade-grve-dismiss-' . get_current_user_id() ) ) {
		$dismiss = $_GET['blade-grve-dismiss'];
		if ( 'dismiss_envato_market_notice' == $dismiss ) {
			update_user_meta( get_current_user_id(), 'blade_grve_dismissed_notice_envato_market' , 1 );
		} else if ( 'dismiss_update_plugins_notice' == $dismiss ) {
			update_user_meta( get_current_user_id(), 'blade_grve_dismissed_notice_update_plugins' , 1 );
		}
	}
}
add_action( 'admin_head', 'blade_grve_notice_dismiss' );

/**
 * Delete metadata for admin notices when switching themes
 */
function blade_grve_update_dismiss() {
	delete_metadata( 'user', null, 'blade_grve_dismissed_notice_envato_market', null, true );
	delete_metadata( 'user', null, 'blade_grve_dismissed_notice_update_plugins', null, true );
}
add_action( 'switch_theme', 'blade_grve_update_dismiss' );


//Omit closing PHP tag to avoid accidental whitespace output errors.
