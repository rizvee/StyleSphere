<!doctype html>
<!--[if lt IE 10]>
<html class="ie9 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
		<!-- allow pinned sites -->
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php } ?>
		<?php wp_head(); ?>
	</head>

	<body id="grve-body" <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<?php do_action( 'blade_grve_body_top' ); ?>
		<?php if ( blade_grve_check_theme_loader_visibility() ) { ?>

		<!-- LOADER -->
		<div id="grve-loader-overflow">
			<div class="grve-spinner"></div>
		</div>
		<?php } ?>

		<!-- Theme Wrapper -->
		<div id="grve-theme-wrapper">
