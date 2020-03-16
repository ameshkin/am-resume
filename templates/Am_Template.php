<?php

namespace Resume\Plugin;

//avoid direct calls to this file, because now WP core and framework has been used
if (!function_exists('add_filter')) {
  header('Status: 403 Forbidden');
  header('HTTP/1.1 403 Forbidden');
  exit();
}

if (!class_exists('Am_Template')) {

  /**
   * Class Am_Template
   * @package Resume\Plugin
   */
  class Am_Template extends Plugin
  {

    /**
     * Am_Resume constructor.
     */
    public function __construct()
    {

      add_action('wp_enqueue_scripts', [get_called_class(), 'init_template']);
      add_filter('body_class', [get_called_class(), 'add_body_class']);
      add_filter('template_include', [get_called_class(), 'resume_page_template'], 99);

    }


    /**
     * Initialize styles and scripts
     */
    static function init_template()
    {

      // TODO: add jspdf
      // wp_enqueue_script('print-script', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js', array('jquery'), false, true);
      // wp_enqueue_script('print-pdf', 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js', array('jquery'), false, true);


      $ID        = get_the_ID();
      $plugindir = plugin_dir_path(__FILE__);
      $pluginurl = plugin_dir_url(__FILE__);
      $template  = get_field( "template_name", $ID );  //  get the user's template from acf fields
      $css       = '/assets/default.css';
      $js        = '/assets/default.js';
      $themes    = '/assets/themes/';

      // set default theme files
      $default_style  = $pluginurl.'default'.$css;
      $default_js     = $pluginurl.'default'.$js;

      // always use default css file at the top so it can be overridden
      wp_enqueue_style('am-resume', $default_style);

      // if there's a custom template, wp_enqueue the files
      if($template)
      {

        $cssfile  = $plugindir.$template.$css;
        // if a custom css file exists, then enqueue it after default like an override
        if(file_exists($cssfile))
        {
          wp_enqueue_style('am-resume-'.$template, $pluginurl.$template.$css);
        }

        // check for any themes
        $dir = ($plugindir.$template.$themes);

        $files = scandir($dir);
        foreach($files as $file) {

          $parts = pathinfo($file);
          switch($parts['extension'])
          {
            case "css":

              wp_enqueue_style('am-theme-'.$parts['filename'], $pluginurl.$template.$themes.$parts['filename'].'.'.$parts['extension']);

              break;
            case NULL: // do nothing
              break;
          }

        }

        // handle js scripts
        $jsfile   = $plugindir.$template.$js;

        // JS file is not overridden but replaced
        if(file_exists($jsfile))
        {
          wp_enqueue_script('am-resume-'.$template, $pluginurl.$template.$js, array('jquery'), false, true);
        } else {
          // if the file doesn't exist, then enqueue the default script
          wp_enqueue_script('am-resume', $default_js, array('jquery'), false, true);
        }

      } else {
        wp_enqueue_script('am-resume', $default_js, array('jquery'), false, true);
      }

    }

    /**
     * Add a class to the body tag for this plugin's post type
     * @param $classes
     * @return array
     */
    static function add_body_class($classes)
    {
      $classes[] = 'resume-print';
      return $classes;
    }

    /**
     * Include custom template if there is one
     * @param $template
     * @return string
     */
    function resume_page_template($template)
    {

      $post      = get_queried_object();
      $post_type = get_post_type_object(get_post_type($post));

      if (esc_html($post_type->labels->singular_name) == 'Resume') {
        $default_template = dirname(__FILE__) . '/default/default.php';
        $newtemplate      = dirname(__FILE__) . '/' . get_field( "template_name", $post->ID ).'/default.php';

        // make sure the template file actually exists
        if(file_exists($newtemplate))
        {
          return $newtemplate;
        } else {
          return $default_template;
        }
      }
      // return the same template if user has not created a new one
      return $template;
    }
  }
}
