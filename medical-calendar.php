<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Medical_Calendar
 *
 * @wordpress-plugin
 * Plugin Name:       Medical Calendar
 * Plugin URI:        http://example.com/medical-calendar-uri/
 * Description:       Plugin pour la prise de rendez-vous médicaux.
 * Version:           1.0.0
 * Author:            Charles Anguenot
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       medical-calendar
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
define( 'MEDICAL_CALENDAR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-medical-calendar-activator.php
 */
function activate_medical_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-medical-calendar-activator.php';
	Medical_Calendar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-medical-calendar-deactivator.php
 */
function deactivate_medical_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-medical-calendar-deactivator.php';
	Medical_Calendar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_medical_calendar' );
register_deactivation_hook( __FILE__, 'deactivate_medical_calendar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-medical-calendar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_medical_calendar() {

	$plugin = new Medical_Calendar();
	$plugin->run();

}
run_medical_calendar();