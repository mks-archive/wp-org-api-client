<?php
  if ( ! defined( 'ABSPATH' ) ) {
    header( 'Content-type: text/plain' );
    require_once dirname( __FILE__ ) . '/../../../../wp-load.php';
  }

  /**
   * @var WordPress_Org_Plugin_Slugs_API_Client $api
   */
  $api = WordPress_Org_API_Client::get_new('plugin_slugs');
  $response = $api->get_plugin_list();
  print_r( $response->error );
  print_r( $response->data );
