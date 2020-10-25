<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Medical_Calendar
 * @subpackage Medical_Calendar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Medical_Calendar
 * @subpackage Medical_Calendar/includes
 * @author     Your Name <email@example.com>
 */
class Medical_Calendar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-medical-calendar-admin.php';

        Medical_Calendar_Admin::new_cpt_job();

        // Clear the permalinks after registering a custom post type (avoid 404 errors)
        flush_rewrite_rules();

	}

}
