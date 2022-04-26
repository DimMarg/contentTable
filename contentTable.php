<?php
/**
 * Plugin Name: Content Table
 * Plugin URI: https://www.forthright.gr/
 * Description: Plugin which takes all the headers and returns a table of contents
 * Version: 0.1
 * Text Domain: https://www.forthright.gr/
 * Authors: Anastasios Tsourounis, Dimitris Margelos, Andreas Andrikopoulos
 * Author URI: https://www.forthright.gr/
 */

function enqueue_content_table_scripts_and_styles(){
	wp_enqueue_style('content-table-styles', plugins_url('assets/css/content-table.css', __FILE__));
	wp_enqueue_script('content-table-script', plugins_url( 'assets/js/content-table.js' , __FILE__ ), array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts','enqueue_content_table_scripts_and_styles');

// Shortcode function for sceenshot button
function content_table( $atts ) {
	ob_start();
 
    // define attributes/parameters and their defaults

    $attributes = shortcode_atts(
        array(
            'title' => 'Page Screenshot',
            'color' => '',
         ), 
        $atts
    );
    
    $postid = get_the_ID();

    ?>
        <div class="container-scrshot-your-page text-center">
            <div class="row" id="post-<?php echo $postid; ?>">
                <div class="col-sm-6 col-md-3">
                    <button id="button-<?php echo $postid; ?>" class="scrshot-btn" style="background-color: <?php echo $attributes['color'] ?>"><?php echo $attributes['title'] ?></button>
                </div>
            </div>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
}
add_shortcode( 'content', 'content_table' );