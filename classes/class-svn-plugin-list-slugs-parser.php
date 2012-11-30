<?php

/**
 * TODO: Need to test this one first.
 */
class WordPress_Org_Svn_Plugin_List_Slugs_Parser extends RESTian_Parser_Base {
  /**
   * Returns an object or array of stdClass objects from a string containing valid JSON
   *
   * @param string $body
   * @return array|object|void A(n array of) stdClass object(s) with structure dictated by the passed JSON string.
   */
  function parse( $body ) {
    preg_match_all( '#<a href="([^"]+)/">#', $body, $matches, PREG_PATTERN_ORDER );
    return $matches[1];
  }
}
