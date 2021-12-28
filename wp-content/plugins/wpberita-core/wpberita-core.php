<?php
/**
 * Plugin Name: Wpberita Core
 * Plugin URI: https://www.idtheme.com/wpberita/
 * Description: Wpberita Core - Core Plugin for Wpberita
 * Author: Gian Mokhammad R
 * Version: 1.0.0
 *
 * @package Wpberita Core
 * Author URI: http://www.gianmr.com
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wpberita_Core_Init' ) ) {
	/**
	 * Main Plugin Class
	 */
	class Wpberita_Core_Init {
		/**
		 * Contract
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function __construct() {
			/* Define */
			define( 'WPBERITA_CORE_DIRNAME', plugin_dir_path( __FILE__ ) );
			define( 'WPBERITA_CORE_URL', plugin_dir_url( __FILE__ ) );

			/* This is the URL our updater / license checker pings. This should be the URL of the site */
			define( 'WPBERITA_API_URL_CHECK', 'https://member.kentooz.com/softsale/api/check-license' );
			define( 'WPBERITA_API_URL', 'https://member.kentooz.com/softsale/api/activate' );
			define( 'WPBERITA_API_URL_DEACTIVATED', 'https://member.kentooz.com/softsale/api/deactivate' );

			/* the name of the settings page for the license input to be displayed */
			define( 'WPBERITA_PLUGIN_LICENSE_PAGE', 'wpberita-license' );

			/* Include library */
			include WPBERITA_CORE_DIRNAME . 'lib/taxonomy.php';

			/* Include lcs. Load only if dashboard */
			if ( is_admin() ) {
				include_once WPBERITA_CORE_DIRNAME . 'lib/lcs.php';
			}

			/* Action */
			add_action( 'plugins_loaded', array( $this, 'wpberita_core_load_textdomain' ) );

			/* Other functionally */
			include_once WPBERITA_CORE_DIRNAME . 'lib/update/plugin-update-checker.php';
			$MyUpdateChecker = PucFactory::buildUpdateChecker(
				'https://www.kentooz.com/files/wpberita-core/mugowwpb3e4rditoac0r3.json',
				__FILE__,
				'wpberita-core'
			);

		}

		/**
		 * Activated plugin
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function wpberita_core_activate() {
			/* nothing to do yet */
		}

		/**
		 * Deativated plugin
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function wpberita_core_deactivate() {
			/* nothing to do yet */
		}

		/**
		 * Load languange
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function wpberita_core_load_textdomain() {
			load_plugin_textdomain( 'wpberita-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

	}
}


if ( class_exists( 'Wpberita_Core_Init' ) ) {
	/* Installation and uninstallation hooks */
	register_activation_hook( __FILE__, array( 'Wpberita_Core_Init', 'wpberita_core_activate' ) );
	register_deactivation_hook( __FILE__, array( 'Wpberita_Core_Init', 'wpberita_core_deactivate' ) );

	/* Initialise Class */
	$wpberita_core_init_by_gianmr = new Wpberita_Core_Init();

}
