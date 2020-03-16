<?php
/**
 * Plugin Name: Odyssey Resumes
 * Plugin URI: https://www.odysseycreativedesign.com
 * Description: A simple plugin to create beautiful resumes using custom templates. This plugin requires ACF as of now but I will be adding universal support soon.
 * Author: Amir Meshkin
 * Contributors: ameshkin
 * Author URI: https://www.odysseycreativedesign.com/resume/amir/
 * Version: 1.0.0
 * Requires at least: 3.1.0
 * Tested up to: 5.3.2
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! function_exists( 'add_filter' ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  exit();
}

register_activation_hook( __FILE__, 'odd_resume_activate' );

if( !function_exists('acf_get_fields')) {
  /**
   * Error out if ACF is not installed
   */
  function odd_resume_activate()
  {
    $plugin = plugin_basename(__FILE__);

    if (!is_plugin_active('advanced-custom-fields/acf.php')) {
      deactivate_plugins($plugin);
      wp_die("Odyssey Resumes Plugin requires Advanced Custom Fields (ACF)");
    }
  }
}

if( !function_exists('acf_get_fields'))
{

  $plugin = plugin_basename( __FILE__ );
  deactivate_plugins( $plugin );
  add_action( 'admin_notices', 'odd_resume_update_message_box');

}

/**
 * make sure acf is activated in case it was turned off after this plugin was activated
 */
function odd_resume_update_message_box() {
  ?>
  <div class="error notice">
    <p><?php _e( "Odyssey Resumes Plugin requires Advanced Custom Fields (ACF)"); ?></p>
  </div>
  <?php
}


global $post_type_array;

require_once( 'Plugin.php' );
require_once( 'functions.php' );

//Constants
define( 'RESUME_PLUGIN_DIRECTORY', plugins_url( '', __FILE__ ) );
define( 'RESUME_PLUGIN_DIRECTORY_PATH', dirname(__FILE__) );
define( 'RESUME_PREFIX', 'RESUME_' );

//Supports
add_theme_support( 'post-thumbnails' );


// TODO: no need for settings page as of now
//require_once( 'admin/Resume_Settings_Controller.php' );
//new \Resume\Plugin\Resume_Settings_Controller;

// post types
require_once( 'post-types/Am_Resume.php' );
new \Resume\Plugin\Am_Resume();


// Templates
require_once( 'templates/Am_Template.php' );
new \Resume\Plugin\Am_Template();
