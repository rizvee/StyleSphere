<?php
/*
*	Admin Page Codes
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
	<div id="grve-codes-wrap" class="wrap">
		<h2><?php esc_html_e( "Custom Codes", 'grve-blade-vc-extension' ); ?></h2>
		<?php
			if ( function_exists( 'blade_grve_print_admin_links') ) {
				blade_grve_print_admin_links('codes');
			}
		?>
		<div id="grve-codes-panel" class="grve-admin-panel">

			<form method="post" action="admin.php?page=blade-codes">
				<?php
					settings_fields('blade_grve_ext_options');
					$options = get_option('blade_grve_ext_options');
					$head_code = ( isset( $options['head_code'] ) ? $options['head_code'] : '' );
					$body_code = ( isset( $options['body_code'] ) ? $options['body_code'] : '' );
					$footer_code = ( isset( $options['footer_code'] ) ? $options['footer_code'] : '' );
				?>
				<p class="about-description"><?php echo esc_html__( "In this area you can paste your tracking codes. Place your code inside &lt;script&gt; tags." , 'grve-blade-vc-extension' ) . '<br/>' . esc_html__( "Usually tracking code is added to the head but in some cases additional script is needed after the body or closer to the footer.", 'grve-blade-vc-extension' ); ?></p>

				<table class="grve-admin-panel-left widefat" cellspacing="0">
					<tr>
						<td>
							<h3><?php esc_html_e( 'Code ( Head )', 'grve-blade-vc-extension'); ?></h3>
							<p><?php esc_html_e( 'Code will be placed after the opening &lt;head&gt; tag. ', 'grve-blade-vc-extension' ); ?></p>
							<textarea id="grve-head-code-area" name="blade_grve_ext_options[head_code]" class="widefat" rows="8"><?php echo wp_unslash( $head_code ); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Code ( Body )', 'grve-blade-vc-extension'); ?></h3>
							<p><?php esc_html_e( 'Code will be placed after the opening &lt;body&gt; tag. ', 'grve-blade-vc-extension' ); ?></p>
							<textarea id="grve-body-code-area" name="blade_grve_ext_options[body_code]" class="widefat" rows="8"><?php echo wp_unslash( $body_code ); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Code ( Footer )', 'grve-blade-vc-extension'); ?></h3>
							<p><?php esc_html_e( 'Code will be placed before the closing &lt;/body&gt; tag.', 'grve-blade-vc-extension' ); ?></p>
							<textarea id="grve-footer-code-area" name="blade_grve_ext_options[footer_code]" class="widefat" rows="8"><?php echo wp_unslash( $footer_code ); ?></textarea>
						</td>
					</tr>
				</table>
				<?php wp_nonce_field( 'blade_ext_options_nonce_save', '_blade_ext_options_nonce_save' ); ?>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php esc_html_e('Save Changes', 'grve-blade-vc-extension') ?>" />
				</p>
			</form>

		</div>
	</div>
<?php

//Omit closing PHP tag to avoid accidental whitespace output errors.
