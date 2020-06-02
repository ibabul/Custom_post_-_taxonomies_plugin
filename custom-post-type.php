<?php
/**
 * Custom Post Type
 *
 * @package   tutorialPlugin
 * @author    MD Imtiaz
 * @copyright 2020 md imtiaz
 * @wordpress-plugin
 * Plugin Name: Custom Post Type
 * Description: This plugin is build on the bases of a learning course.
 * Author: MD Imtiaz
 * Author URI: https://wpmaestro.net/
 * Version: 1.0.0
 * Requires at least: 5.3.0
 * Tested up to: 5.4
 **/

if (!defined('ABSPATH')) {
	exit;
}
require_once __DIR__ . '/vendor/autoload.php';

final class Custom_post {

	const version = '1.0.0';

	private function __construct() {

		$this->define_constants();

		register_activation_hook(__FILE__, array($this, 'activate'));

		add_action('plugins_loaded', array($this, 'init_plugin'));
	}

	public static function init() {

		static $instance = false;

		if (!$instance) {
			$instance = new self();
		}
		return $instance;
	}

	public function define_constants() {

		define('CP_VERSION', self::version);
		define('CP_FILE', __FILE__);
		define('CP_PATH', __DIR__);
		define('CP_URL', plugins_url('', CP_FILE));
		define('CP_ASSETS', CP_URL . '/assets');
	}

	public function init_plugin() {

		if (is_admin()) {
			//for back-end admin dashboard
			new Custom\Post\Admin();

		} else {
			//This portion will work on frontend

			new Custom\Post\Frontend\Shortcode();

		}
	}

	public function activate() {

		$installer = new Custom\Post\Installer();
		$installer->run();
	}

}

function custom_post() {

	return Custom_post::init();
}

custom_post();