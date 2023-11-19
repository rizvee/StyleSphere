<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 6.1.0
 */
defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys = array_keys( $attributes );
$product_get_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<div class="grve-product-form grve-border">
<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ); // WPCS: XSS ok. ?>">
		<?php do_action( 'woocommerce_before_variations_form' ); ?>

		<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
			<div class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></div>
		<?php else : ?>
			<ul class="grve-variations variations">
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
				<li>
					<div class="grve-var-label grve-small-text label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></div>
					<div class="grve-var-content value">
						<?php
							wc_dropdown_variation_attribute_options( array(
								'options'   => $options,
								'attribute' => $attribute_name,
								'product'   => $product,
							) );
							echo end( $attribute_keys ) === $attribute_name ? '<a class="grve-reset-var grve-small-text grve-text-grey grve-text-hover-black reset_variations" href="#"><i class="grve-icon grve-icon-close-sm grve-text-red"></i>' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' : '';
						?>
					</div>
				</li>
				 <?php endforeach;?>
			</ul>

			<div class="single_variation_wrap grve-border" style="display:none;">
				<?php
					/**
					 * Hook: woocommerce_before_single_variation.
					 */
					do_action( 'woocommerce_before_single_variation' );

					 /**
					 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
					 *
					 * @since 2.4.0
					 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
					 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
					 */
					do_action( 'woocommerce_single_variation' );

					/**
					 * Hook: woocommerce_after_single_variation.
					 */
					do_action( 'woocommerce_after_single_variation' );
				?>
			</div>
		<?php endif; ?>

		<?php do_action( 'woocommerce_after_variations_form' ); ?>
	</form>
</div>

<?php do_action( 'woocommerce_after_add_to_cart_form' );
	
//Omit closing PHP tag to avoid accidental whitespace output errors.
