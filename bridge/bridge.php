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
defined("ABSPATH") or die;

class BridgePlugin {
	function activate() {
		echo "The plugin was activated";
	}

	function deactivate() {
		echo "The plugin was deactivated";
	}

	function uninstall() {

	}
}

function add_customize_button($add_to_cart_button) {
	$add_to_cart_button .= "<button type='button'>Customize</button>";
	return $add_to_cart_button;
}

function checkout_order_created($order) {
	var_dump($order);
	die("checkout_order_created");
}

function checkout_order_processed($order_id, $posted_data, $order) {
	var_dump($order);
	die("checkout_order_processed");
}

function callback_for_setting_up_scripts() {
    wp_register_style( 'style', '/assets/index.css' );
    wp_enqueue_style( 'style' );
    wp_enqueue_script( 'script', '/assets/index.js' );
}

if (class_exists("BridgePlugin")) $bridge_plugin = new BridgePlugin();

register_activation_hook(__FILE__, array($bridge_plugin, "activate"));

register_deactivation_hook(__FILE__, array($bridge_plugin, "deactivate"));

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');

add_action("woocommerce_loop_add_to_cart_link", 'add_customize_button', 10, 1);

add_action('woocommerce_checkout_order_created', 'checkout_order_created', 10, 1);

add_action('woocommerce_checkout_order_processed', 'checkout_order_processed', 10, 3);
