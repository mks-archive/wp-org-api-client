<?php
/*
 * This code is run after Imperative validates that the required libraries are available and loaded.
 */
define( 'WP_PLUGIN_INFO_DIR', dirname( __FILE__ ) );
define( 'WP_PLUGIN_INFO_VER', '0.0.0' );
define( 'WP_PLUGIN_INFO_MIN_PHP', '5.2.4' );
define( 'WP_PLUGIN_INFO_MIN_WP', '3.2' );

require(WP_PLUGIN_INFO_DIR . '/classes/class-plugin-info-api-client.php');
require(WP_PLUGIN_INFO_DIR . '/classes/class-plugin-list-slugs-api-client.php');
//require( WP_PLUGIN_INFO_DIR . '/classes/class-transients.php');
//require( WP_PLUGIN_INFO_DIR . '/classes/class-plugin.php');


