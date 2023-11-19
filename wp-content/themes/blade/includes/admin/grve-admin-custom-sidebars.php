<?php
/*
*	Admin Custom Sidebars
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

	function blade_grve_add_sidebar_settings() {

		if ( isset( $_POST['_blade_grve_nonce_sidebar_save'] ) && wp_verify_nonce( $_POST['_blade_grve_nonce_sidebar_save'], 'blade_grve_nonce_sidebar_save' ) ) {

			$sidebars_items = array();
			if( isset( $_POST['grve_custom_sidebar_item_id'] ) ) {
				$num_of_sidebars = sizeof( $_POST['grve_custom_sidebar_item_id'] );
				for ( $i=0; $i < $num_of_sidebars; $i++ ) {
					$this_sidebar = array (
						'id' => sanitize_text_field( $_POST['grve_custom_sidebar_item_id'][ $i ] ),
						'name' => sanitize_text_field( $_POST['grve_custom_sidebar_item_name'][ $i ] ),
					);
					array_push( $sidebars_items, $this_sidebar );
				}
			}
			if ( empty( $sidebars_items ) ) {
				delete_option( 'grve-blade-custom-sidebars' );
			} else {
				update_option( 'grve-blade-custom-sidebars', $sidebars_items );
			}
			//Update Sidebar list
			wp_get_sidebars_widgets();
			wp_safe_redirect( 'admin.php?page=blade-sidebars&sidebar-settings=saved' );
		}

	}

	add_action( 'admin_menu', 'blade_grve_add_sidebar_settings' );



	function  blade_grve_print_admin_custom_sidebars( $grve_custom_sidebars ) {

		blade_grve_print_admin_empty_custom_sidebar();
		if ( ! empty( $grve_custom_sidebars ) ) {
			foreach ( $grve_custom_sidebars as $grve_custom_sidebar ) {
				blade_grve_print_admin_single_custom_sidebar( $grve_custom_sidebar );
			}
		}
	}

	function  blade_grve_print_admin_empty_custom_sidebar() {
?>
		<tr class="grve-custom-sidebar-item grve-custom-sidebar-empty">
			<td>&nbsp;</td>
			<td>
				<h4 class="grve-custom-sidebar-title">
					<span><?php esc_html_e('No Sidebars added yet!', 'blade' ); ?></span>
				</h4>
			</td>
		</tr>
<?php
	}
	function  blade_grve_print_admin_single_custom_sidebar( $sidebar_item, $mode = '' ) {

		$grve_button_class = "grve-custom-sidebar-item-delete-button";
		$sidebar_item_id = uniqid('grve_sidebar_');

		if( $mode = "new" ) {
			$grve_button_class = "grve-custom-sidebar-item-delete-button grve-item-new";
	}
?>


	<tr class="grve-custom-sidebar-item grve-custom-sidebar-normal">
		<td>
			<input class="<?php echo esc_attr( $grve_button_class ); ?> button" type="button" value="<?php esc_attr_e('Delete', 'blade' ); ?>">
		</td>
		<td>
			<h4 class="grve-custom-sidebar-title">
				<span><?php esc_html_e('Custom Sidebar', 'blade' ); ?>: <?php echo blade_grve_array_value( $sidebar_item, 'name' ); ?></span>
			</h4>
			<div class="grve-custom-sidebar-settings">
				<input type="hidden" name="grve_custom_sidebar_item_id[]" value="<?php echo blade_grve_array_value( $sidebar_item, 'id', $sidebar_item_id ); ?>">
				<input type="hidden" class="grve-custom-sidebar-item-name" name="grve_custom_sidebar_item_name[]" value="<?php echo blade_grve_array_value( $sidebar_item, 'name' ); ?>"/>
			</div>
		</td>
	</tr>

<?php
	}

	add_action( 'wp_ajax_blade_grve_get_custom_sidebar', 'blade_grve_get_custom_sidebar' );

	function blade_grve_get_custom_sidebar() {

		check_ajax_referer( 'blade-grve-get-custom-sidebar', '_grve_nonce' );

		if( isset( $_POST['grve_sidebar_name'] ) ) {

			$sidebar_item_name = sanitize_text_field( $_POST['grve_sidebar_name'] );
			$sidebar_item_id = uniqid('grve_sidebar_');
			if( empty( $sidebar_item_name ) ) {
				$sidebar_item_name = $sidebar_item_id;
			}

			$this_sidebar = array (
				'id' => $sidebar_item_id,
				'name' => $sidebar_item_name,
			);

			blade_grve_print_admin_single_custom_sidebar( $this_sidebar, 'new' );
		}
		die();

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
