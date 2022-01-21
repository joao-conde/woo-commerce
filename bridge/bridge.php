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
	echo $add_to_cart_button;
	return "<button type='button'>Customize</button>";
}

if (class_exists("BridgePlugin")) $bridge_plugin = new BridgePlugin();

register_activation_hook(__FILE__, array($bridge_plugin, "activate"));

register_deactivation_hook(__FILE__, array($bridge_plugin, "deactivate"));

add_action("woocommerce_loop_add_to_cart_link", 'add_customize_button', 10, 1);
