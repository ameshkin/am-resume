<?php

// TODO: common code for all templates needs to go here

if ( ! function_exists( 'add_filter' ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  exit();
}

global $post;



if(!$ID) {
  $ID = get_the_ID();
}


if( function_exists('acf_get_fields'))
{
  $fields = get_fields( $ID );

} else {
  //echo "no acf fields"; exit;
}

$template_dir = plugin_dir_path(__DIR__) .'templates/'. $fields['template_name'];
$header_template = $template_dir.'/header.php';

// handle custom templates override
if($fields['custom_header'] && file_exists($header_template))
{
  require_once($header_template );
} else {
  get_header();
}
