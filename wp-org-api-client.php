<?php
/*
 * Plugin Name: @DEV WordPress.org API Client
 * Author: Mike Schinkel <mike@newclarity.net>
 * Author URL: http://about.me/mikeschinkel
 */

/**
 * @see: https://github.com/newclarity/imperative
 */
require( dirname( __FILE__ ) . '/libraries/imperative/imperative.php');

/**
 * @see: https://github.com/newclarity/restian
 */
require_library( 'restian', '0.0.0', __FILE__, 'libraries/restian/restian.php');

register_loader( __FILE__, 'wp-org-api-client-loader.php' );

