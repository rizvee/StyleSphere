<?php

/*
*	Admin screen functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

function blade_grve_admin_menu(){
	if ( current_user_can( 'edit_theme_options' ) ) {
		add_menu_page( 'Blade', 'Blade', 'edit_theme_options', 'blade', 'blade_grve_admin_page_welcome', get_template_directory_uri() .'/includes/images/adminmenu/theme.png', 4 );
		add_submenu_page( 'blade', esc_html__('Welcome','blade'), esc_html__('Welcome','blade'), 'edit_theme_options', 'blade', 'blade_grve_admin_page_welcome' );
		add_submenu_page( 'blade', esc_html__('Status','blade'), esc_html__('Status','blade'), 'edit_theme_options', 'blade-status', 'blade_grve_admin_page_status' );
		add_submenu_page( 'blade', esc_html__( 'Custom Sidebars', 'blade' ), esc_html__( 'Custom Sidebars', 'blade' ), 'edit_theme_options','blade-sidebars','blade_grve_admin_page_sidebars');
		add_submenu_page( 'blade', esc_html__( 'Import Demos', 'blade' ), esc_html__( 'Import Demos', 'blade' ), 'edit_theme_options','blade-import','blade_grve_admin_page_import');
	}
}

add_action( 'admin_menu', 'blade_grve_admin_menu' );


function blade_grve_tgmpa_plugins_links(){
	blade_grve_print_admin_links('plugins');
}
add_action( 'blade_grve_before_tgmpa_plugins', 'blade_grve_tgmpa_plugins_links' );

function blade_grve_admin_page_welcome(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-welcome.php';
}
function blade_grve_admin_page_status(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-status.php';
}
function blade_grve_admin_page_sidebars(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-sidebars.php';
}
function blade_grve_admin_page_import(){
	require_once get_template_directory() . '/includes/admin/pages/grve-admin-page-import.php';
}

function blade_grve_print_admin_links( $active_tab = 'status' ) {
?>
<h2 class="nav-tab-wrapper">
	<a href="?page=blade" class="nav-tab <?php echo 'welcome' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Welcome','blade'); ?></a>
	<a href="?page=blade-status" class="nav-tab <?php echo 'status' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Status','blade'); ?></a>
	<a href="?page=blade-sidebars" class="nav-tab <?php echo 'sidebars' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Custom Sidebars','blade'); ?></a>
	<a href="?page=blade-import" class="nav-tab <?php echo 'import' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Import Demos','blade'); ?></a>
	<a href="?page=blade-tgmpa-install-plugins" class="nav-tab <?php echo 'plugins' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Theme Plugins','blade'); ?></a>
	<?php do_action( 'blade_grve_admin_links', $active_tab ); ?>
</h2>
<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.