=== Additional Charges on WC Checkout ===
Contributors: Deepak
Tags: woocommerce, extra fee, minimum order, service charge, e-commerce, payment, shipping, product, additional fee, shipping fee, dynamic fee
Requires at least: 3.0.1
Tested up to: 6.6.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Additional Charges on WC Checkout allow administrators to add custom fees to a customer's order total conditionally and easily.

== Description ==

Additional Charges on WC Checkout is an extension plugin for WooCommerce that enables administrators to add dynamic fees to a customer's order total based on specific conditions.

### Key Features:
* Set custom titles and amounts for additional charges.
* Apply charges conditionally based on cart total, shipping charges, or specific criteria.
* Seamless integration with WooCommerce settings.
* Control whether shipping charges are included in the calculation for percentage-based fees.

The settings can be found under **WooCommerce >> Products >> Additional Charges**. Once configured, the defined fee will automatically be added to the customer's order total during checkout.

== Installation ==

1. Upload the `additional-charges-on-wc-checkout` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Can I change the title of the additional fee from the admin panel? =
Yes, you can change the title of the additional fee from the WooCommerce settings under **WooCommerce >> Products >> Additional Charges**.

= Will changing the fee amount affect my existing orders? =
No, changing the fee amount will not affect existing orders. It will only apply to orders placed after the changes have been saved.

= Can I apply the additional fee conditionally? =
Yes, you can apply the additional fee based on conditions like the cart total, type of fee (fixed or percentage), and whether to include shipping charges in the calculation.

= Does the fee include tax? =
The fee amount you set is added to the order total before tax calculations. If you want to apply tax to the fee, you need to configure it in WooCommerce settings.

== Screenshots ==

1. Admin interface for defining the additional fee "Title" and "Fixed Amount."
2. Checkout page where the admin-defined fee is added to the customer's order total amount.

== Changelog ==

= 1.0.0 =
* Initial release of Additional Charges on WC Checkout.
