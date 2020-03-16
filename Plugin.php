<?php
/*
* Class: Plugin can be used to construct the plugin's Main Object
* No real need for now
* Developed by Amir Meshkin
*/

namespace Resume\Plugin;

//avoid direct calls to this file, because now WP core and framework has been used
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! class_exists( 'Plugin' ) ) {

	class Plugin {

    /**
     * Plugin constructor.
     */
		public function __construct() {


		}
  }
}
