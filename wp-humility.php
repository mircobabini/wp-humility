<?php
/*
Plugin Name: Humility
Plugin URI: http://github.com/mirkolofio/wp-humility
Description: Make a bunch of exuberant plugins humble
Author: Mirco Babini
Version: 1.0.1
Author URI: http://github.com/mirkolofio
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

if ( is_admin() ) { // make 'em humble

	wp_register_style ('humility', plugin_dir_url (__FILE__) . 'style.css');
	wp_enqueue_style ('humility');
	
	wp_register_script ('humility', plugin_dir_url (__FILE__) . 'script.js');
	wp_enqueue_script ('humility');
	
	add_action( 'plugins_loaded', function() {
	
		// humble! remove wpmu plugins' alert when no 'Update Notifications' plugin detected; https://premium.wpmudev.org/projects/
		remove_action( 'admin_notices', 'wdp_un_check', 5 );
		remove_action( 'network_admin_notices', 'wdp_un_check', 5 );

	} );
	
	add_action( 'admin_menu', function() {

		global $menu;
		global $submenu;

		foreach ($menu as $key => &$menu_item) {
			switch ($menu_item[0]) {

				// humble! Shortens menu item for 'MailChimp for WordPress' plugin; http://bit.ly/mailchimp-for-wordpress
				case 'MailChimp for WP':
					$menu_item[0]  = 'MailChimp';
					$menu_item[0] .= '<br/><p class="humble-subtitle">MailChimp for WP';
					$menu_item[4] .= ' humble-menu-large';
					break;

				// humble! Shortens menu item for 'LayerSlider Responsive WordPress Slider' plugin; http://bit.ly/codecanyon-layerslider
				case 'LayerSlider WP':
					$menu_item[0] = 'LayerSlider';
					break;
			}
		}

	} );

}
