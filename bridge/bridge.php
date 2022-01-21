<?php
/**
 * @package Bridge Plugin
 * @version 0.0.1
 */
/*
Plugin Name: Bridge Plugin
Plugin URI: https://github.com/ripe-tech/ripe-bridge
Description: Bridge Plugin by Platforme MTO.
Author: Platforme MTO
Version: 0.0.1
Author URI: https://github.com/ripe-tech
*/

defined("ABSPATH") || die;

function activate() {

}

function deactivate() {
	
}

function uninstall() {
	
}

function load_assets() {
    wp_enqueue_style("style", plugins_url('/assets/index.css', __FILE__));
    wp_enqueue_script("script", plugins_url('/assets/index.js', __FILE__));
}

function add_customize_button($add_to_cart_button) {
	$customize_button = file_get_contents(plugin_dir_path( __FILE__ ) . 'assets/templates/button.html');
	return $add_to_cart_button . $customize_button;
}

function import_order($order) {
	// fake key and URL
	$url = "http://ecf5-213-22-16-106.ngrok.io/api/orders/import";
    $data = wp_remote_post($url, array(
		"method" => "POST",
		"headers" => array(
			'"X-Secret-Key' => 'd8b2dc1fdf506d640a6143564680d5892f6f5531',
			'Content-Type' => 'application/json; charset=utf-8'
		),
        'body' => json_encode(array( 
			'ff_order_id' => $order->get_id()
		)),
		'data_format' => 'body'
    ));
}

register_activation_hook(__FILE__, "activate");

register_deactivation_hook(__FILE__, "deactivate");

register_uninstall_hook(__FILE__, "uninstall");

add_action('wp_enqueue_scripts', 'load_assets');

add_action("woocommerce_loop_add_to_cart_link", 'add_customize_button');

add_action('woocommerce_checkout_order_created', 'import_order');
