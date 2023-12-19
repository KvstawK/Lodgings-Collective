<?php

/**
 * Plugin name: LC Essentials
 * Plugin URI: https://www.example.com
 * Description: An essentials functions plugin for WordPress websites, created by Lodgings Collective
 * Version: 1.0
 * Requires at least: 5.6
 * Author: Lodgings Collective
 * Author URI: https://lodgingscollective.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text domain: lc-essentials
 * Domain path: /languages
 */

/*
LC Essentials is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

LC Essentials is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MELCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with LC Essentials. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if(!defined('ABSPATH')) {
	exit;
}

if(!class_exists('LC_Essentials')) {
	class LC_Essentials {
		function __construct() {

			$this->define_constants();

			$this->load_textdomain();

			require_once( LC_ESSENTIALS_PATH . 'inc/compress-on-upload.php' );

//			require_once( LC_ESSENTIALS_PATH . 'inc/class.lc-slider-cpt.php' );
//			$LC_Slider_Post_Type = new LC_Slider_Post_Type();
//
//			require_once (LC_ESSENTIALS_PATH . 'inc/class.lc-slider-shortcode.php');
//			$LC_Slider_Shortcode = new LC_Slider_Shortcode();
		}

		public function define_constants() {
			define( 'LC_ESSENTIALS_PATH', plugin_dir_path(__FILE__));
			define( 'LC_ESSENTIALS_URL', plugin_dir_url(__FILE__));
			define( 'LC_ESSENTIALS_VERSION', '1.0.0' );
		}

		public static function activate() {
			update_option('rewrite_rules', '');
		}

		public static function deactivate() {
			flush_rewrite_rules();
//			unregister_post_type('lc-slider');
		}

		public static function uninstall() {
//			delete_option('rc_slider_options');
//
//			$posts = get_posts(
//				array(
//					'post_type' => 'lc-slider',
//					'number_posts' => -1,
//					'post_status' => 'any'
//				)
//			);
//
//			foreach ($posts as $post) {
//				wp_delete_post($post->ID, true);
//			}
		}

		public function load_textdomain() {
			load_textdomain(
				'lc-essentials',
				false,
				dirname(plugin_basename(__FILE__)) . '/languages/'
			);
		}
	}
}

if(class_exists('LC_Essentials')) {
	register_activation_hook(__FILE__, array('LC_Essentials', 'activate'));
	register_deactivation_hook(__FILE__, array('LC_Essentials', 'deactivate'));
	register_uninstall_hook(__FILE__, array('LC_Essentials', 'uninstall'));
	$lc_essentials = new LC_Essentials();
}