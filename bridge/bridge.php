<?php

function checkout_order_created($order) {
	var_dump($order);
	die("checkout_order_created");
}

function checkout_order_processed($order_id, $posted_data, $order) {
	var_dump($order);
	die("checkout_order_processed");
}

add_action('woocommerce_checkout_order_created', 'checkout_order_created', 10, 1);
add_action('woocommerce_checkout_order_processed', 'checkout_order_processed', 10, 3);

?>
