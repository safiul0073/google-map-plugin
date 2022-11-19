<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://YH_AUTHOR_URL_HERE
 * @since             1.0.0
 * @package           SPP
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Plugin Package
 * Plugin URI:        https://YOUR_PLUGIN_URL_HERE
 * Description:       SHORT_DESCRIPTION_HERE
 * Version:           1.0.0
 * Author:            YH_AUTHOR_NAME_HERE
 * Author URI:        https://YH_AUTHOR_URL_HERE
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       spp
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// composer autoloader added
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


function activate () {

    \Src\includes\SPP_Activator::activate();  
}

function deactivate () {

    \Src\includes\SPP_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate' );
register_deactivation_hook( __FILE__, 'deactivate' );

// require plugin_dir_path( __FILE__ ) . 'src/includes/SPP_Main.php';

function runPlugin () {
    $initial = new  \Src\includes\SPP_Main();
    $initial->run();
    
}

runPlugin();