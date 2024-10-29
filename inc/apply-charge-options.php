<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ACWC_APPLY_CHARGE_OPTIONS {

    public function __construct() {
        // Hook into WooCommerce to apply charges
        add_action("woocommerce_cart_calculate_fees", array($this, 'acwc_apply_charges_fee'));
    }

    /**
     * Apply additional charges to the cart
     */
    public function acwc_apply_charges_fee() {
        // Check if the option to enable additional charges is set
        if (get_option('wc_enable_additional_charges_options', 'no') === 'yes') {
            // Retrieve settings with default values
            $fee_label = sanitize_text_field(get_option('wc_additional_fee_title', __('Additional Charge', 'additional-charges-on-wc-checkout')));
            $fee_amount = floatval(get_option('wc_additional_fee_amount', 0));
            
            // Get cart totals and ensure they are valid
            $cart_total = WC()->cart->subtotal ?? 0;
            $shipping_total = WC()->cart->get_shipping_total() ?? 0;
            
            // Check minimum cart amount condition
            $min_cart_val = floatval(get_option('wc_additional_fee_minimum_cart_amount', 0));
            $condition_type = sanitize_text_field(get_option('wc_additional_fee_condition_type', ''));
            
            if (
                $min_cart_val > 0 &&
                (($condition_type === 'Order is more than' && $cart_total <= $min_cart_val) ||
                 ($condition_type === 'Order is less than' && $cart_total >= $min_cart_val))
            ) {
                return; // Do not apply the fee if conditions are not met
            }

            // Include or exclude shipping in total
            if (get_option('wc_additional_fee_include_shipping_charge', 'no') !== 'yes') {
                $shipping_total = 0; // Ignore shipping total if not included
            }

            // Calculate the fee based on type
            $fee_type = sanitize_text_field(get_option('wc_additional_fee_type', 'Fixed Amount'));
            if ($fee_type === 'Fixed Amount') {
                $calculated_fee = $fee_amount;
            } else {
                $calculated_fee = ($cart_total + $shipping_total) * ($fee_amount / 100);
            }

            // Add fee to cart if valid
            if ($calculated_fee > 0) {
                WC()->cart->add_fee(esc_html($fee_label), $calculated_fee);
            }
        }
    }
}

// Instantiate the class
$chargeOptions = new ACWC_APPLY_CHARGE_OPTIONS();
?>
