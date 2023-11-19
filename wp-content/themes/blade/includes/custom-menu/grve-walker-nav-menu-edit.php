<?php

/*
*	Nav Menu Edit
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! class_exists( 'Walker_Nav_Menu_Edit' ) ) {
	global $wp_version;
	if ( version_compare( $wp_version, '4.4', '>=' ) ) {
		require_once ABSPATH . 'wp-admin/includes/class-walker-nav-menu-edit.php';
	} else {
		require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
	}
}

class Blade_Grve_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $item_output = '';
        $output .= parent::start_el( $item_output, $item, $depth, $args, $id );
        $output .= preg_replace(
            // NOTE: Check this regex on major WP version updates!
            '/(?=<fieldset[^>]+class="[^"]*field-move)/',
            $this->get_custom_fields( $item, $depth, $args ),
            $item_output
        );
	}

	protected function get_custom_fields( $item, $depth, $args = array() ) {
		ob_start();
		$item_id = intval( $item->ID );
		do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args );

		return ob_get_clean();
	}

} // Blade_Grve_Walker_Nav_Menu_Edit

function blade_grve_wp_nav_menu_item_custom_fields( $item_id, $item, $depth, $args ) {
?>
	<p class="grve-field-custom description description-wide">
		<label for="edit-menu-item-grve-megamenu-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Mega Menu', 'blade' ); ?><br />
			<select class="widefat grve-menu-item-megamenu" id="edit-menu-grve-item-megamenu-<?php echo esc_attr($item_id); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_megamenu_' . $item_id ); ?>">
				<option value="" <?php selected( "", $item->grve_megamenu ); ?>><?php esc_html_e( 'None', 'blade' ); ?></option>
				<option value="2" <?php selected( "2", $item->grve_megamenu ); ?>><?php esc_html_e( '2 Columns', 'blade' ); ?></option>
				<option value="3" <?php selected( "3", $item->grve_megamenu ); ?>><?php esc_html_e( '3 Columns', 'blade' ); ?></option>
				<option value="4" <?php selected( "4", $item->grve_megamenu ); ?>><?php esc_html_e( '4 Columns', 'blade' ); ?></option>
				<option value="5" <?php selected( "5", $item->grve_megamenu ); ?>><?php esc_html_e( '5 Columns', 'blade' ); ?></option>
				<option value="6" <?php selected( "6", $item->grve_megamenu ); ?>><?php esc_html_e( '6 Columns', 'blade' ); ?></option>
			</select>
			<span class="description"><?php esc_html_e( 'Mega Menu should be used only on first level menu items.', 'blade' ); ?></span>
		</label>
	</p>
	<p class="grve-field-custom description description-wide">
		<label for="edit-menu-item-grve-link-mode-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Link Mode', 'blade' ); ?><br />
			<select class="widefat" id="edit-menu-item-grve-link-mode-<?php echo esc_attr($item_id); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_link_mode_' . $item_id ); ?>">
				<option value="" <?php selected( "", $item->grve_link_mode ); ?>><?php esc_html_e( 'Default', 'blade' ); ?></option>
				<option value="no-link" <?php selected( "no-link", $item->grve_link_mode ); ?>><?php esc_html_e( 'No Link', 'blade' ); ?></option>
				<option value="hidden" <?php selected( "hidden", $item->grve_link_mode ); ?>><?php esc_html_e( 'Hidden', 'blade' ); ?></option>
			</select>
		</label>
	</p>
	<p class="grve-field-custom description description-wide">
		<label for="edit-menu-item-grve-link-classes-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Link CSS Classes', 'blade' ); ?><br />
			<input type="text" id="edit-menu-item-grve-link-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code" value="<?php echo esc_attr( $item->grve_link_classes ); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_link_classes_' . $item_id ); ?>"/>
		</label>
	</p>
	<p class="grve-field-custom description description-wide">
		<label for="edit-menu-item-grve-label-text-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Label Text', 'blade' ); ?><br />
			<input id="edit-menu-item-grve-label-text-<?php echo esc_attr( $item_id ); ?>" type="text" class="widefat"  value="<?php echo esc_attr( $item->grve_label_text ); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_label_text_' . $item_id ); ?>"/>
		</label>
	</p>
	<p class="grve-field-custom description description-wide">
		<label for="edit-menu-item-grve-style-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Menu item Style', 'blade' ); ?><br />
			<select class="widefat grve-menu-item-style" id="edit-menu-grve-item-style-<?php echo esc_attr($item_id); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_style_' . $item_id ); ?>">
				<option value="" <?php selected( "", $item->grve_style ); ?>><?php esc_html_e( 'Default', 'blade' ); ?></option>
				<option value="button" <?php selected( "button", $item->grve_style ); ?>><?php esc_html_e( 'Button', 'blade' ); ?></option>
			</select>
		</label>
	</p>
	<p class="grve-field-custom description description-wide grve-menu-item-color-container">
		<label for="edit-menu-item-grve-color-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Menu Item Color', 'blade' ); ?><br />
			<select class="widefat" id="edit-menu-grve-item-color-<?php echo esc_attr($item_id); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_color_' . $item_id ); ?>">
				<option value="" <?php selected( "", $item->grve_color ); ?>><?php esc_html_e( 'Default', 'blade' ); ?></option>
				<?php blade_grve_print_media_button_color_selection( $item->grve_color ); ?>
			</select>
		</label>
	</p>
	<p class="grve-field-custom description description-wide grve-menu-item-hover-color-container">
		<label for="edit-menu-item-grve-hover-color-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Menu Item Hover color', 'blade' ); ?><br />
			<select class="widefat" id="edit-menu-grve-item-hover-color-<?php echo esc_attr($item_id); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_hover_color_' . $item_id ); ?>">
				<option value="" <?php selected( "", $item->grve_hover_color ); ?>><?php esc_html_e( 'Default', 'blade' ); ?></option>
				<?php blade_grve_print_media_button_color_selection( $item->grve_hover_color ); ?>
			</select>
		</label>
	</p>
	<?php
		global $blade_grve_awsome_fonts_list;
	?>
	<p class="grve-field-custom description description-wide">
		<label for="edit-menu-item-grve-icon-fontawesome-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Icon', 'blade' ); ?><br />
			<select class="widefat" id="edit-menu-item-grve-icon-fontawesome-<?php echo esc_attr($item_id); ?>" data-grve-menu-item data-grve-menu-name="<?php echo esc_attr( '_grve_menu_item_icon_fontawesome_' . $item_id ); ?>">
				<option value="" <?php selected( "", $item->grve_icon_fontawesome ); ?>><?php esc_html_e( 'None', 'blade' ); ?></option>
			<?php
				$icons_array = $blade_grve_awsome_fonts_list;
				foreach ($icons_array as $icon) {
			?>
					<option value="fa fa-<?php echo esc_attr( $icon ); ?>" <?php selected( $item->grve_icon_fontawesome, 'fa fa-' . $icon ); ?>><?php echo esc_html( $icon ); ?></option>
			<?php
				}
			?>
			</select>
		</label>
	</p>
<?php
}

// add the action
add_action( 'wp_nav_menu_item_custom_fields', 'blade_grve_wp_nav_menu_item_custom_fields', 10, 4 );

//Omit closing PHP tag to avoid accidental whitespace output errors.
