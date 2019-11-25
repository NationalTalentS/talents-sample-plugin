<?php
/**
 * Plugin Name:     Talents Sample Plugin
 * Plugin URI:      https://github.com/NationalTalentS/talents-sample-plugin
 * Description:     A sample plugin to test js translation. 
 * Author:          Ahmader
 * Author URI:      https://github.com/NationalTalentS
 * Text Domain:     talents-sample-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * GitHub Plugin URI: NationalTalentS/talents-sample-plugin
 * GitHub Languages:  https://github.com/NationalTalentS/talents-sample-plugin-translations
 * 
 * 
 * @package         Talents_Sample_Plugin
 */

// Your code starts here.

function tsp_load_textdomain() {
    
    // Make theme available for translation.
    load_plugin_textdomain( 'talents-sample-plugin' ); 
}
add_action( 'plugins_loaded', 'tsp_load_textdomain' );

function tsp_enqueue_scripts() {   

    // Load script 1
    wp_enqueue_script( 'my_custom_script-1', plugin_dir_url( __FILE__ ) . 'js/test1.js', array('wp-i18n'), '1.0' );
    wp_set_script_translations( 'my_custom_script-1', 'talents-sample-plugin' );

    // Load script 2
    wp_enqueue_script( 'my_custom_script-2', plugin_dir_url( __FILE__ ) . 'js/test2.js', array('wp-i18n'), '1.0' );
    wp_set_script_translations( 'my_custom_script-2', 'talents-sample-plugin' );
}
add_action('admin_enqueue_scripts', 'tsp_enqueue_scripts');

 
/**
 * top level menu
 */
function tsp_options_page() {
    // add top level menu page
    add_menu_page(
        'TalentS TEST',
        'TalentS TEST',
        'manage_options',
        'wporg',
        'tsp_options_page_html'
    );
}
 
/**
 * register our tsp_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'tsp_options_page' );
 
/**
 * top level menu:
 * callback functions
 */
function tsp_options_page_html() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <p><?php esc_html_e( 'Testing php string.', 'wporg' ); ?></p>
        <p>
            <input type="button" onclick="test1()" value="<?php echo __( 'Test 1', 'talents-sample-plugin' ); ?>"> 
            <input type="button" onclick="test2()" value="<?php echo __( 'Test 2', 'talents-sample-plugin' ); ?>">
        </p>
        <textarea id="tsp_test" rows="4"></textarea>
    </div>
    <?php
}
