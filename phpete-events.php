<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://phpete.com
 * @since             1.0.0
 * @package           Phpete_Whatson
 *
 * @wordpress-plugin
 * Plugin Name:       phpete what's on
 * Plugin URI:        https://phpete.com
 * Description:       A simple what's on plugin for Wordpress
 * Version:           1.0.2
 * Author:            phpete
 * Author URI:        https://phpete.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       phpete-whatson
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PHPETE_WHATSON_VERSION', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-phpete-whatson-activator.php
 */
function activate_phpete_whatson() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-phpete-whatson-activator.php';
	Phpete_Whatson_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-phpete-whatson-deactivator.php
 */
function deactivate_phpete_whatson() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-phpete-whatson-deactivator.php';
	Phpete_Whatson_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_phpete_whatson' );
register_deactivation_hook( __FILE__, 'deactivate_phpete_whatson' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-phpete-whatson.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_phpete_whatson() {

	$plugin = new Phpete_Whatson();
	$plugin->run();

}
run_phpete_whatson();