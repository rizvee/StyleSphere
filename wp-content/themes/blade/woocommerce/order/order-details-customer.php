<?php
/**
 * Order Customer Details
 *
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>

<?php if ( $show_shipping ) : ?>

<div class="col2-set addresses">
	<div class="col-1">

<?php endif; ?>

<header class="title">
	<h3 class="grve-align-center"><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></h3>
</header>
<address>
		<?php echo wp_kses_post( $order->get_formatted_billing_address( esc_html__( 'N/A', 'woocommerce' ) ) ); ?>

	<?php if ( $order->get_billing_phone() ) : ?>
			<p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
	<?php endif; ?>

	<?php if ( $order->get_billing_email() ) : ?>
			<p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
	<?php endif; ?>
</address>

<?php if ( $show_shipping ) : ?>

	</div><!-- /.col-1 -->
	<div class="col-2">
		<header class="title">
			<h3 class="grve-align-center"><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></h3>
		</header>
		<address>
				<?php echo wp_kses_post( $order->get_formatted_shipping_address( esc_html__( 'N/A', 'woocommerce' ) ) ); ?>
		</address>
	</div><!-- /.col-2 -->
</div><!-- /.col2-set -->

<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order );

//Omit closing PHP tag to avoid accidental whitespace output errors.
