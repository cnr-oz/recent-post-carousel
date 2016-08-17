<?php
/*
 * Plugin Name: CNR recent post carousel
 * Description: Display a recent post carousel.
 * Version: 1.0
 * Author: Code n' Roll
 * Author URI: http://www.codenroll.co.il/
 * License: GPLv2 or later
 * Text Domain: cnr
*/

// Add Shortcode
function cnr_recent_post_carousel() {

    $args = array(
        'post_type'    => 'post',
        'posts_per_page' => 5
    );
    $count = 0;
    $the_query = new WP_Query( $args );
    if($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $count++;
            echo $count;
            $the_query->the_post();
            $pid = get_the_id();
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full' );
            $url = $thumb[0];

            $output = '';
            $output .= '<div class="the-content" style="background-image: url(' . $url . ')">';
            $output .= '';
            $output .= '    <div class="img-title">';
            $output .=          get_the_title();
            $output .= '    </div>';
            $output .= '    <div class="img-text">';
            $output .=          get_the_excerpt();
            $output .= '    </div>';
            $output .= '</div>';
        }
    }
    return $output;
}
add_shortcode( 'recent_post_carousel', 'cnr_recent_post_carousel' );

function cnr_recent_enqueue_style(){
    wp_enqueue_script('cnr-script.js', '/wp-content/plugins/cnr-recent-post-carousel/js/cnr-scripts.js', false);
    wp_enqueue_script('owl', '/wp-content/plugins/cnr-recent-post-carousel/js/owl.carousel.js', false);
    wp_enqueue_script('owl-min', '/wp-content/plugins/cnr-recent-post-carousel/js/owl.carousel.min.js', false);
    wp_enqueue_style('cnr-style.css', '/wp-content/plugins/cnr-recent-post-carousel/css/cnr-style.css', false);
    wp_enqueue_style('owl-style', '/wp-content/plugins/cnr-recent-post-carousel/css/owl.carousel.css', false);
}

add_action( 'wp_enqueue_scripts', 'cnr_recent_enqueue_style' );
