<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

//Remove Single Product Hooks
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//Add Single Product Hooks
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );


//Product Title
if ( blade_grve_check_title_visibility() ) {
	global $post;
	$post_id = $post->ID;
	$grve_custom_title_options = get_post_meta( $post_id, 'grve_custom_title_options', true );
	$grve_page_title_custom = blade_grve_array_value( $grve_custom_title_options, 'custom' );
	if ( 'custom' == $grve_page_title_custom ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		add_action( 'woocommerce_single_product_summary', 'blade_grve_woo_single_title', 5 );
	} else {
		if ( 'advanced' == blade_grve_option( 'product_title_style', 'advanced' ) ) { 
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			add_action( 'woocommerce_single_product_summary', 'blade_grve_woo_single_title', 5 );
		}
	}
} else {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'blade_grve_woo_single_title', 5 );
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

?>

<?php if ( function_exists( 'wc_product_class' ) ) { ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
<?php } else { ?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php }  ?>

	<div class="grve-container">
		<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div id="grve-entry-summary" class="summary entry-summary grve-bookmark">

			<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>

		</div><!-- .summary -->
	</div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' );

//Omit closing PHP tag to avoid accidental whitespace output errors.

