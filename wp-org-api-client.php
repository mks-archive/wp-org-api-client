<?php
/*
 * Library Name: WordPress.org API Client
 * Author: Mike Schinkel <mike@newclarity.net>
 * Author URL: http://about.me/mikeschinkel
 */

/**
 * @see https://github.com/newclarity/restian
 * @assumes That RESTian is in a peer directory
 */
require_once( dirname( dirname( __FILE__ ) )  . '/restian/restian.php');
require_once( dirname( __FILE__ ) . '/classes/class-plugin-info-api-client.php' );
require_once( dirname( __FILE__ ) . '/classes/class-plugin-slugs-api-client.php' );
require_once( dirname( __FILE__ ) . '/classes/class-api-client.php' );
