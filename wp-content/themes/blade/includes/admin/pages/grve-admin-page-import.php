<?php
/*
*	Admin Page Import
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'GRVE_Blade_Importer' ) ) {
	$import_url = admin_url( 'admin.php?import=blade-demo-importer' );
} else {
	$import_url = admin_url( 'admin.php?page=blade-tgmpa-install-plugins' );
}

?>
	<div id="grve-import-wrap" class="wrap">
		<h2><?php esc_html_e( "Import Demos", 'blade' ); ?></h2>
		<?php blade_grve_print_admin_links('import'); ?>
		<div id="grve-import-panel" class="grve-admin-panel">
			<div class="grve-admin-panel-content">
				<h2><?php esc_html_e( "The Easiest Ways to Import Blade Demo Content", 'blade' ); ?></h2>
				<p class="about-description"><?php esc_html_e( "Blade offers you two options to import the content of our theme. With the first one, the Import on Demand, you can import specific pages, posts, portfolios. With the second one, the Full Import Demo, you can import any of the available demos. It's up to you!", 'blade' ); ?></p>
				<?php if ( class_exists( 'GRVE_Blade_Importer' ) ) { ?>
				<a href="<?php echo esc_url( $import_url ); ?>" class="grve-admin-panel-btn"><?php esc_html_e( "Import Demos", 'blade' ); ?></a>
				<?php } else { ?>
				<a href="<?php echo esc_url( $import_url ); ?>" class="grve-admin-panel-btn"><?php esc_html_e( "Install/Activate Demo Importer", 'blade' ); ?></a>
				<?php } ?>
				<div class="grve-admin-panel-container">
					<div class="grve-admin-panel-row">
						<div class="grve-admin-panel-column grve-admin-panel-column-1-4">
							<div class="grve-admin-panel-column-content"></div>
						</div>
						<div class="grve-admin-panel-column grve-admin-panel-column-1-2">
							<div class="grve-admin-panel-column-content">
								<iframe width="100%" height="290" src="https://www.youtube-nocookie.com/embed/LsXBw-ZYDWg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<h3><?php esc_html_e( "Import on Demand", 'blade' ); ?></h3>
								<p><?php esc_html_e( "Do you just need specific pages or portfolios, posts, products of our demo content to create your site? Select the ones you prefer via the available multi selectors under Blade Demos.", 'blade' ); ?></p>
							</div>
						</div>
						<div class="grve-admin-panel-column grve-admin-panel-column-1-4">
							<div class="grve-admin-panel-column-content"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php

//Omit closing PHP tag to avoid accidental whitespace output errors.
