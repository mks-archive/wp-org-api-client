<?php

if ( ! class_exists( 'WordPress_Org_Plugins_List_API_Client' ) ) {
  /**
   *
   */
  class WordPress_Org_Plugins_List_Slugs_API_Client extends RESTian_Client {

    /**
     *
     */
    function initialize() {

      RESTian::register_parser(
        'restian-custom/svn-repo-list',
        'WordPress_Org_Svn_Plugin_List_Slugs_Parser',
        dirname( __FILE__ ) . '/class-svn-plugin-list-slugs-parser.php'
      );

      $this->base_url = 'http://plugins.svn.wordpress.org';
      $this->api_version = '1.0';
      $this->use_cache = false;
      $this->auth_type = 'n/a';

      $this->register_service_defaults( array(
        'content_type'  => 'restian-custom/svn-repo-list',
      ));

      $this->register_resource( 'root' );

    }

    /**
     *
     * @return object|RESTian_Response
     */
    function get_plugin_list() {
      return $this->get_resource( 'root' );
    }

  }
}
