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
	$add_to_cart_button .= "<button type='button'>Customize</button>";
	return $add_to_cart_button;
}

function checkout_order_created($order) {
	var_dump($order);
}

register_activation_hook(__FILE__, "activate");

register_deactivation_hook(__FILE__, "deactivate");

register_uninstall_hook(__FILE__, "uninstall");

add_action('wp_enqueue_scripts', 'load_assets');

add_action("woocommerce_loop_add_to_cart_link", 'add_customize_button');

add_action('woocommerce_checkout_order_created', 'checkout_order_created');
