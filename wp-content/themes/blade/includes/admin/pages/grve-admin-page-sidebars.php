<?php
/*
*	Admin Custom Sidebars
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blade_grve_custom_sidebars = get_option( 'grve-blade-custom-sidebars' );
?>
	<div id="grve-sidebar-wrap" class="wrap">
		<h2><?php esc_html_e( "Sidebars", 'blade' ); ?></h2>
		<?php blade_grve_print_admin_links('sidebars'); ?>
		<br/>
		<?php if( isset( $_GET['sidebar-settings'] ) ) { ?>
		<div class="grve-sidebar-saved updated inline grve-notice-green">
			<p><strong><?php esc_html_e('Settings Saved!', 'blade' ); ?></strong></p>
		</div>
		<?php } ?>
		<div class="grve-sidebar-changed updated inline grve-notice-green">
			<p><strong><?php esc_html_e('Settings have changed, you should save them!', 'blade' ); ?></strong></p>
		</div>
		<form method="post" action="admin.php?page=blade-sidebars">
			<table class="grve-sidebar-table widefat" cellspacing="0">
				<thead>
					<tr>
						<th>
							<input type="button" id="grve-add-custom-sidebar-item" class="button button-primary" value="<?php esc_html_e('Add Sidebar', 'blade' ); ?>"/>
							<span class="grve-sidebar-spinner"></span>
						</th>
						<th>
							<input type="text" class="grve-sidebar-text" id="grve-custom-sidebar-item-name-new" value=""/>
							<div class="grve-sidebar-notice grve-notice-red" style="display:none;">
								<strong><?php esc_html_e('Field must not be empty!', 'blade' ); ?></strong>
							</div>
							<div class="grve-sidebar-notice-exists grve-notice-red" style="display:none;">
								<strong><?php esc_html_e('Sidebar with this name already exists!', 'blade' ); ?></strong>
							</div>
						</th>
					</tr>
				</thead>
				<tbody id="grve-custom-sidebar-container">
					<?php blade_grve_print_admin_custom_sidebars( $blade_grve_custom_sidebars ); ?>
				</tbody>
				<tfoot>
					<tr>
						<td><?php submit_button(); ?></td>
						<td>&nbsp;</td>
					</tr>
				</tfoot>
			</table>
			<?php wp_nonce_field( 'blade_grve_nonce_sidebar_save', '_blade_grve_nonce_sidebar_save' ); ?>

		</form>
	</div>
<?php


//Omit closing PHP tag to avoid accidental whitespace output errors.
