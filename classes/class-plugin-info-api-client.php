<?php

if ( ! class_exists( 'WordPress_Org_Plugin_Info_API_Client' ) ) {
  /**
   *
   */
  class WordPress_Org_Plugin_Info_API_Client extends RESTian_Client {

    /**
     *
     */
    function initialize() {

      $this->base_url = 'http://api.wordpress.org/plugins/info/1.0';
      $this->api_version = '1.0';
      $this->use_cache = false;
      $this->auth_type = 'n/a';

      $this->register_service_defaults( array(
        'content_type'  => 'application/vnd.php.serialized',
      ));

      $this->register_resource( 'root' );

    }

    /**
     * @param string $plugin_slug
     * @param array $vars
     *
     * @return object|RESTian_Response
     */
    function get_plugin_information( $plugin_slug, $vars = array() ) {
      $vars['slug'] = $plugin_slug;
      return $this->_call_api( 'plugin_information', $vars );
    }

    /**
     * @param int $number
     * @param array $vars
     *
     * @return object|RESTian_Response
     */
    function get_hot_tags( $number = 100, $vars = array() ) {
      $vars['number'] = $number;
      return $this->_call_api( 'hot_tags', $vars );
    }

    /**
     * @param string $type 'newest', 'popular', featured', 'tag', 'author' or 'term' ('search' same as 'term')
     * @param string|bool $term
     *
     * @return object|RESTian_Response
     */
    function get_plugins( $type, $term = false ) {
      $plugins = false;
      if ( preg_match( '#(newest|popular|featured|tag|term|author)#', $type ) ) {
        switch ( $type ) {
          case 'newest':
          case 'popular':
          case 'featured':
            $plugins = call_user_func( array( $this, "get_{$type}_plugins" ) );
            break;
          default:
            if ( 'tag' == $type )
              $term = sanitize_title_with_dashes( $term );
            else if ( 'term' == $type )
              $type = 'search';
            $plugins = $this->do_query_plugins( array( $type => $term ) );
            break;
        }
      }
      return $plugins;
    }
    /**
     * @param string $tag
     *
     * @return object|RESTian_Response
     */
    function get_tag_plugins( $tag ) {
      return $this->get_plugins( 'term', $tag );
    }
    /**
     * @param string $term
     *
     * @return object|RESTian_Response
     */
    function get_term_plugins( $term ) {
      return $this->get_plugins( 'term', $term );
    }
    /**
     * @param string $author
     *
     * @return object|RESTian_Response
     */
    function get_author_plugins( $author ) {
      return $this->get_plugins( 'author', $author );
    }
    /**
     *
     * @return object|RESTian_Response
     */
    function get_newest_plugins() {
      return $this->do_query_plugins( array( 'browse' => 'new' ) );
    }

    /**
     *
     * @return object|RESTian_Response
     */
    function get_featured_plugins() {
      return $this->do_query_plugins( array( 'browse' => 'featured' ) );
    }

    /**
     *
     * @return object|RESTian_Response
     */
    function get_popular_plugins() {
      return $this->do_query_plugins( array( 'browse' => 'popular' ) );
    }

    /**
     * @param array $vars
     *
     * @return object|RESTian_Response
     */
    function do_query_plugins( $vars ) {
      return $this->_call_api( 'query_plugins', $vars );
    }

    /**
     * @param array $vars
     *
     * @return array
     */
    private function _parse_query_vars( $vars ) {
      return array_merge( array(
        'timeout' => 15,
        'page' => 1,
        'per_page' => 30,
      ), $vars );
    }

    /**
     * @param string $action
     * @param array $vars
     * @param array $args
     *
     * @return object|RESTian_Response
     */
    private function _call_api( $action, $vars = array(), $args = array() ) {
      $vars = $this->_parse_query_vars( $vars );
      $body = array(
        'action' => $action,
        'request' => urlencode( serialize( (object)$vars ) ),
       );
      $args['headers'] = array( 'Content-Type' => 'application/x-www-form-urlencoded; charset=' . get_option( 'blog_charset' ) );
      return $this->post_resource( 'root', $body, $args );
    }
  }
}
