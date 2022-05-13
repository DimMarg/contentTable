<?php
/**
 * Plugin Name: Content Table
 * Plugin URI: https://www.forthright.gr/
 * Description: Plugin which takes all the headers and returns a table of contents
 * Version: 0.1
 * Text Domain: https://www.forthright.gr/
 * Authors: https://www.forthright.gr/
 * Author URI: https://www.forthright.gr/
 */

function enqueue_content_table_scripts_and_styles(){
	wp_enqueue_style('content-table-styles', plugins_url('assets/css/content-table.css', __FILE__));
	wp_enqueue_script('content-table-script', plugins_url( 'assets/js/content-table.js' , __FILE__ ), array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts','enqueue_content_table_scripts_and_styles');

// Shortcode function for content table
function content_table_function() {
	ob_start();

    ?>
        <div class="container-content-table text-center">
            <div id="ct_TableOfContents">
                <div class="ct_container">
                    <div class="ct_header">
                        <p class="ct_content-table_title">ΕΝΟΤΗΤΕΣ</p>
                        <button type="button" id="ct_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </div>
                    <ul class="ct_list-of-content"></ul>
                </div>
            </div>
        </div>

    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
}
add_shortcode( 'content_table', 'content_table_function' );