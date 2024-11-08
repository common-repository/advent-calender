<?php
/**
 *
 * @package   Advent_Calendar
 * @author    Paul Vincent Beigang <pbeigang@gmail.com>
 * @license   GPL-2.0+
 * @link      http://paul-beigang.de
 * @copyright 2013 Paul Vincent Beigang
 *
 * @wordpress-plugin
 * Plugin Name:       Advent calendar
 * Plugin URI:        http://wordpress.org/plugins/advent-calender
 * Description:       Simple Advent calendar which outputs 24 scheduled custom posts with images.
 * Version:           1.0.4
 * Author:            Paul Vincent Beigang
 * Author URI:        http://paul-beigang.de
 * Text Domain:       advent-calendar
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-advent-calendar.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'Advent_Calendar', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Advent_Calendar', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'Advent_Calendar', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-advent-calendar-admin.php' );
	add_action( 'plugins_loaded', array( 'Advent_Calendar_Admin', 'get_instance' ) );

}
