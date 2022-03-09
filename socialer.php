<?php

/**
 * Plugin Name:       Socialer
 * Plugin URI:        https://codeblowing.com
 * Description:       Socialer is the most useful plugin for maintain social network in the WordPress website.
 * Version:           1.0.0
 * Author:            Md Dalwar
 * Author URI:        https://codeblowing.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       socialer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'SOCIALER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-socialer-activator.php
 */
function activate_socialer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-socialer-activator.php';
	Socialer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-socialer-deactivator.php
 */
function deactivate_socialer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-socialer-deactivator.php';
	Socialer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_socialer' );
register_deactivation_hook( __FILE__, 'deactivate_socialer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-socialer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_socialer() {

	$plugin = new Socialer();
	$plugin->run();

}
run_socialer();
