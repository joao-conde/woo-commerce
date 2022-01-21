<?php
if (!defined('ABSPATH')) exit;

die("THIS RUNS")

add_action('woocommerce_checkout_order_created', 'checkout_order_created', 10, 1);
add_action('woocommerce_checkout_order_processed', 'checkout_order_processed', 10, 3);

function checkout_order_created($order) {
	var_dump($order);
	die("checkout_order_created");
}

function checkout_order_processed($order_id, $posted_data, $order) {
	var_dump($order);
	die("checkout_order_processed");
}


add_action('woocommerce_proceed_to_checkout', 'dummy', 10, 1);
function dummy($order) {
	var_dump($order);
	die("woocommerce_proceed_to_checkout");
}

?>
