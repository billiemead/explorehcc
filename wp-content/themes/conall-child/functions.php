<?php

/*https://stackoverflow.com/questions/3947979/fatal-error-call-to-undefined-function-add-action*/
/*require(dirname(__FILE__) . '/wp-load.php');*/

/*** Child Theme Function  ***/

/*if ( ! function_exists( 'conall_edge_child_theme_enqueue_scripts' ) ) {*/
function conall_edge_child_theme_enqueue_scripts()
{
    $parent_style = 'conall-edge-default-style';

    wp_enqueue_style('conall-edge-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action('wp_enqueue_scripts', 'conall_edge_child_theme_enqueue_scripts');
/*}*/

function elevar_assets()
{
    wp_register_style('elevar-stylesheet', get_theme_file_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all');
    wp_enqueue_style('elevar-stylesheet');
    wp_enqueue_script('elevar_js', get_theme_file_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'elevar_assets');

// Force WP to default to WebM first, MP4 and OGV last
$array = apply_filters( 'wp_video_extensions', $array );

function filter_wp_video_extensions( $array ) {
    return array( 'webm', 'mp4', 'm4v', 'ogv', 'wmv', 'flv' );
   }
add_filter( 'wp_video_extensions', 'filter_wp_video_extensions', 10, 1 );