<?php
  if ( ! defined( 'ABSPATH' ) ) {
    header( 'Content-type: text/plain' );
    require_once dirname( __FILE__ ) . '/../../../../wp-load.php';
  }
  /**
   * @var WordPress_Org_Plugin_Info_API_Client $api
   */
  $api = WordPress_Org_API_Client::get_new('plugin_info');
  $response = $api->get_hot_tags( 50 );
  print_r( $response->error );
  print_r( $response->data );
