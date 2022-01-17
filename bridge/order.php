<?php

add_action('woocommerce_checkout_order_created', 'checkout_order_created', 10, 1);
add_action('woocommerce_checkout_order_processed', 'checkout_order_processed', 10, 3);

function checkout_order_created($order) {
	echo '<script>console.log("checkout_order_created")</script>';
	echo "<h1 id='dolly'>$chosen</h1>";
	var_dump($order);
	printf($order);
}

function checkout_order_processed($order_id, $posted_data, $order) {
	echo '<script>console.log("checkout_order_processed")</script>';
	var_dump($order);
	printf($order_id, $posted_data, $order);
}

?>
