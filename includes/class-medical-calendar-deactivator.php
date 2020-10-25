<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Medical_Calendar
 * @subpackage Medical_Calendar/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Medical_Calendar
 * @subpackage Medical_Calendar/includes
 * @author     Your Name <email@example.com>
 */
class Medical_Calendar_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

        // Clear the permalinks since we registered a custom post type in this plugin.
        flush_rewrite_rules();

	}

}
