<?php

namespace Custom\Post\Admin;

/**
 * The Menu handler class
 */
class Menu {

	/**
	 * Initialize the class
	 */
	function __construct() {
		add_action('admin_menu', [$this, 'admin_menu']);
	}

	/**
	 * Register admin menu
	 *
	 * @return void
	 */
	public function admin_menu() {
		$parent_slug = 'custom_post';
		$capability = 'manage_options';

		add_menu_page(__('Custom Post', 'custom_post'), __('Custom Post', 'custom_post'), $capability, $parent_slug, [$this, 'customs'], 'dashicons-welcome-learn-more');

		add_submenu_page($parent_slug, __('Custom Posts', 'custom_post'), __('Custom Post', 'custom_post'), $capability, $parent_slug, [$this, 'customs']);

		add_submenu_page($parent_slug, __('Settings', 'custom_post'), __('Settings', 'custom_post'), $capability, 'custom-post-settings', [$this, 'settings_page']);
	}

	/**
	 *
	 * Submenu -settings callback function
	 *
	 * @return string
	 */
	public function settings_page() {
		// $settings = new Settings();
		// $settings->setting_page();

		echo "Setting page";
	}
	public function customs() {
		// $settings = new Settings();
		// $settings->setting_page();

		echo "Hello Custom world";
	}

}
