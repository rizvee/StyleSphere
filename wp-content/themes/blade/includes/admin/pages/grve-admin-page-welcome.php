<?php
/*
*	Admin Page Welcome
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$docs_link = 'https://docs.greatives.eu/theme/blade/';
$videos_link = 'https://www.youtube.com/watch?v=qRwOPlUzohA&list=PLsRm8BqfgIKPrjhCLT07gtGUQ6KWjzisc';
$support_link = 'https://greatives.ticksy.com';

?>
	<div id="grve-welcome-wrap" class="wrap">
		<h2><?php esc_html_e( "Welcome", 'blade' ); ?></h2>
		<?php blade_grve_print_admin_links('welcome'); ?>
		<div id="grve-welcome-panel" class="grve-admin-panel">
			<div class="grve-admin-panel-content">
				<h2><?php esc_html_e( "Welcome to Blade!", 'blade' ); ?></h2>
				<p class="about-description"><?php esc_html_e( "Thank you so much for this purchase. You are now ready to use another premium WordPress theme by Greatives. Be sure that we'd be happy to support you all the way through and make Blade Theme a lasting experience.", 'blade' ); ?></p>
				<div class="grve-admin-panel-container">
					<div class="grve-admin-panel-row">
						<div class="grve-admin-panel-column grve-admin-panel-column-1-3">
							<div class="grve-admin-panel-column-content">
								<img class="grve-admin-panel-icon" src="<?php echo get_template_directory_uri() .'/includes/images/admin-icons/live-tutorial.jpg'?>" alt="Live Tutorial">
								<h3><?php esc_html_e( "Live Tutorial", 'blade' ); ?></h3>
								<p><?php esc_html_e( "We hope that in our Live Knowledgebase you will find all required information to get your site running.", 'blade' ); ?></p>
								<a href="<?php echo esc_url( $docs_link ); ?>" class="grve-admin-panel-more" target="_blank" rel="noopener noreferrer"><?php esc_html_e( "Read More", 'blade' ); ?></a>
							</div>
						</div>
						<div class="grve-admin-panel-column grve-admin-panel-column-1-3">
							<div class="grve-admin-panel-column-content">
								<img class="grve-admin-panel-icon" src="<?php echo get_template_directory_uri() .'/includes/images/admin-icons/video-tutorial.jpg'?>" alt="Video Tutorial">
								<h3><?php esc_html_e( "Video Tutorials", 'blade' ); ?></h3>
								<p><?php esc_html_e( "We also recommend to check out our Video Tutorials. The easiest way to discover the amazing features of Blade.", 'blade' ); ?></p>
								<a href="<?php echo esc_url( $videos_link ); ?>" class="grve-admin-panel-more" target="_blank" rel="noopener noreferrer"><?php esc_html_e( "Read More", 'blade' ); ?></a>
							</div>
						</div>
						<div class="grve-admin-panel-column grve-admin-panel-column-1-3">
							<div class="grve-admin-panel-column-content">
								<img class="grve-admin-panel-icon" src="<?php echo get_template_directory_uri() .'/includes/images/admin-icons/support-system.jpg'?>" alt="Live Tutorial">
								<h3><?php esc_html_e( "Support System", 'blade' ); ?></h3>
								<p><?php esc_html_e( "Still no luck? No worries, we are here to help. Contact our support agents and they will get back to you as soon as possible.", 'blade' ); ?></p>
								<a href="<?php echo esc_url( $support_link ); ?>" class="grve-admin-panel-more" target="_blank" rel="noopener noreferrer"><?php esc_html_e( "Read More", 'blade' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php

//Omit closing PHP tag to avoid accidental whitespace output errors.
