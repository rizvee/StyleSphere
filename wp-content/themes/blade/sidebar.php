<?php

/*
*	Main sidebar area
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

$fixed = "";
$grve_fixed_sidebar = 'no';
$grve_sidebar_extra_content = false;

$sidebar_view = blade_grve_get_current_view();
if ( 'search_page' == $sidebar_view  ) {
	$grve_sidebar_id = blade_grve_option( 'search_page_sidebar' );
	$grve_sidebar_layout = blade_grve_option( 'search_page_layout', 'none' );
	$grve_fixed_sidebar = blade_grve_option( 'search_page_fixed_sidebar', 'no' );
} else if ( 'shop' == $sidebar_view ) {
	if( is_search() ) {
		$grve_sidebar_id = blade_grve_option( 'product_search_sidebar' );
		$grve_sidebar_layout = blade_grve_option( 'product_search_layout', 'none' );
		$grve_fixed_sidebar = blade_grve_option( 'product_search_fixed_sidebar', 'no' );
	} else if ( is_shop() ) {
		$grve_sidebar_id = blade_grve_post_meta_shop( 'grve_sidebar', blade_grve_option( 'page_sidebar' ) );
		$grve_sidebar_layout = blade_grve_post_meta_shop( 'grve_layout', blade_grve_option( 'page_layout', 'none' ) );
		$grve_fixed_sidebar = blade_grve_post_meta_shop( 'grve_fixed_sidebar' );
	} else if( is_product() ) {
		$grve_sidebar_id = blade_grve_post_meta( 'grve_sidebar', blade_grve_option( 'product_sidebar' ) );
		$grve_sidebar_layout = blade_grve_post_meta( 'grve_layout', blade_grve_option( 'product_layout', 'none' ) );
		$grve_fixed_sidebar = blade_grve_post_meta( 'grve_fixed_sidebar' );
	} else {
		$grve_sidebar_id = blade_grve_option( 'product_tax_sidebar' );
		$grve_sidebar_layout = blade_grve_option( 'product_tax_layout', 'none' );
	}
} else if ( is_singular() ) {

	$grve_fixed_sidebar = blade_grve_post_meta( 'grve_fixed_sidebar' );

	if ( is_singular( 'post' ) ) {
		$grve_sidebar_id = blade_grve_post_meta( 'grve_sidebar', blade_grve_option( 'post_sidebar' ) );
		$grve_sidebar_layout = blade_grve_post_meta( 'grve_layout', blade_grve_option( 'post_layout', 'none' ) );
	} else if ( is_singular( 'portfolio' ) ) {
		$grve_sidebar_id = blade_grve_post_meta( 'grve_sidebar', blade_grve_option( 'portfolio_sidebar' ) );
		$grve_sidebar_layout = blade_grve_post_meta( 'grve_layout', blade_grve_option( 'portfolio_layout', 'none' ) );
		$grve_sidebar_extra_content = blade_grve_check_portfolio_details();
		if( $grve_sidebar_extra_content && 'none' == $grve_sidebar_layout ) {
			$grve_sidebar_layout = 'right';
		}
	} else {
		$grve_sidebar_id = blade_grve_post_meta( 'grve_sidebar', blade_grve_option( 'page_sidebar' ) );
		$grve_sidebar_layout = blade_grve_post_meta( 'grve_layout', blade_grve_option( 'page_layout', 'none' ) );
	}
} else {
	$grve_sidebar_id = blade_grve_option( 'blog_sidebar' );
	$grve_sidebar_layout = blade_grve_option( 'blog_layout', 'none' );
	$grve_fixed_sidebar = blade_grve_option( 'blog_fixed_sidebar' );
}

if ( 'yes' == $grve_fixed_sidebar ) {
	$fixed = " grve-fixed-sidebar";
}

if ( 'none' != $grve_sidebar_layout && ( is_active_sidebar( $grve_sidebar_id ) || $grve_sidebar_extra_content ) ) {
	if ( 'left' == $grve_sidebar_layout || 'right' == $grve_sidebar_layout ) {

		$grve_sidebar_class = 'grve-sidebar' . $fixed;
?>
		<!-- Sidebar -->
		<aside id="grve-sidebar" class="<?php echo esc_attr( $grve_sidebar_class ); ?>">
			<div class="grve-wrapper clearfix">
				<?php
					if ( $grve_sidebar_extra_content ) {
						blade_grve_print_portfolio_details();
					}
				?>
				<?php dynamic_sidebar( $grve_sidebar_id ); ?>
			</div>
		</aside>
		<!-- End Sidebar -->
<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
