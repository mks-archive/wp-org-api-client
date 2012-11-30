<?php

if ( ! class_exists( 'WordPress_Org_API_Client' ) ) {
  /**
   *
   */
  class WordPress_Org_API_Client {

    /**
     * @param $which_api
     *
     * @return bool|RESTian_Client
     */
    static function get_new( $which_api ) {
      $api = false;
      switch ( $which_api ) {
        case 'plugin_info':
          $api = new WordPress_Org_Plugin_Info_API_Client();
          break;
        case 'plugin_slugs':
          $api = new WordPress_Org_Plugin_Slugs_API_Client();
          break;
        case 'theme_info':
          break;
      }
      return $api;
    }
  }
}
