<?php
/**
 * SKU Product Meta
 *
 * @author 	Greatives Team
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
<?php ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?>
<div class="product_meta grve-product-sku grve-border ">
	<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo esc_html( $sku ); ?></span></span>
</div>
<?php endif; ?>

