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
	wp_enqueue_script('content-table-script', plugins_url( 'assets/js/content-table.js' , __FILE__ ), array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts','enqueue_content_table_scripts_and_styles');

// Shortcode function for sceenshot button
function content_table_function() {
	ob_start();

    ?>
        <div class="container-content-table text-center">
            <div class="row" id="ct_TableOfContents">
                <div class="col-sm-6 col-md-3">
                    <p class="ct_content-table_title">Περιεχόμενα</p>
                    <ul class="ct_list-of-content"></ul>
                </div>
            </div>

            <script>
                window.onload = get_headings;
                
                function get_headings() {
                    const h = ["h2", "h3", "h4", "h5", "h6"];
                let contentOfHeaders = [];
                let allHeaders = [];
                let i = z = 1;

                for (let i = 0; i < h.length; i++) {
                    allHeaders[i] = document.querySelectorAll(h[i]);
                }

                for (let j = 0; j < allHeaders.length; j++) {
                    for (let y = 0; y < allHeaders[j].length; y++) {
                        allHeaders[j][y].id = "heading_" + z;
                        contentOfHeaders.push(allHeaders[j][y].textContent);
                        z++;
                    }
                }
                console.log(allHeaders);
                contentOfHeaders.forEach(function(item) {
    
                    let list = document.createElement("li");
                    let listLink = document.createElement("a");
                    listLink.innerText = item;
                    listLink.href = "#heading_" + i;
                    list.appendChild(listLink);
                        document.querySelector('.ct_list-of-content').appendChild(list);
                    i++;
                })
                }

            </script>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
}
add_shortcode( 'content_table', 'content_table_function' );