<?php

if (!function_exists('odd_resume_body_class'))
{

  /**
   * Add a body class for this post type
   * @param $classes
   * @return array
   */
  function odd_resume_body_class($classes) {

    if ( is_post_type_archive( 'resume' ) ) {
      $classes[] = 'resume-page';
    }

    return $classes;
  }
  add_filter('body_class', 'odd_resume_body_class');
}


if (!function_exists('odd_resume_google_map_key')) {

  /**
   * Google maps api key
   * @param $api
   * @return mixed
   */
  function odd_resume_google_map_key($api)
  {

    $api['key'] = 'AIzaSyDBzTE2nyoo8h7kh_jbxTPujoKHtldq9_U';
    return $api;

  }

  add_filter('acf/fields/google_map/api', 'odd_resume_google_map_key');
}
