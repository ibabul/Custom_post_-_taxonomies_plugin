<?php

namespace Custom\Post;

class Post_type {

	function create_tutorials_cpt() {
// public function __construct() {
		// 	add_action('init', 'create_tutorials_cpt', 0);
		// 	add_action('init', 'tuts_custom_taxonomies', 0);

// }

		$labels = array(
			'name' => __('Tutorials', 'Post Type General Name', 'tutorials'),
			'singular_name' => __('Tutorial', 'Post Type singular Name', 'tutorials'),
			'menu_name' => __('Tutorials', 'tutorials'),
			'name_admin_bar' => __('Tutorials', 'tutorials'),
			'archives' => __('Tutorial Archives', 'tutorials'),
			'attributes' => __('Tutorial Attributes', 'tutorials'),
			'parent_item_clone' => __('Parent Item', 'tutorials'),

			'all_items' => __('All Tutorial', 'tutorials'),
			'add_new_item' => __('Add new tutorial', 'tutorials'),
			'add_new' => __('Add New', 'tutorials'),
			'new_item' => __('New Tutorial', 'tutorials'),
			'edit_item' => __('edit Tutorial', 'tutorials'),
			'update_item' => __('Update Tutorial', 'tutorials'),
			'view_item' => __('View Tutorial', 'tutorials'),
			'view_items' => __('View Tutorial', 'tutorials'),
			'search_items' => __('Search Tutorial', 'tutorials'),
			'not_found' => __('Not Found', 'tutorials'),
			'not_found_in_trash' => __('Not Found In Trash', 'tutorials'),
			'featured_image' => __('Featured Image', 'tutorials'),
			'set_featured_image' => __('Set Featured Image', 'tutorials'),
			'remove_featured_image' => __('Remove Featured Image', 'tutorials'),
			'use_featured_image' => __('Use as featured Image', 'tutorials'),
			'insert_into_item' => __('Insert Into Tutorials', 'tutorials'),
			'uploaded_to_this_item' => __('Upload To This item', 'tutorials'),
			'item_list' => __('tutorials list', 'tutorials'),
			'item_list_navigation' => __('tutorials list navigation', 'tutorials'),
			'filter_items_list' => __('Filter Tutorial List', 'tutorials'),

		);

		$args = array(
			'label' => __('Tutorial', 'tutorials'),
			'description' => __('Fullstack Web Dev Tutorials', 'tutorials'),
			'labels' => $labels,
			'menu_icon' => 'dashicons-image-filter',
			'supports' => array('title', 'editor', 'thumbnail', 'revision', 'author'),
			'taxonomies' => array('category', 'post_tag'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'hierachical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'public_queryable' => true,
			'capability_type' => 'post',
			'rewrite' => array('slug' => 'tutorials'),

		);
		register_post_type('tutorials', $args);
	}

	function rewrite_tuts_flush() {
		create_tutorials_cpt();
		flush_rewrite_rules();

	}

//custom taxonomies

	function tuts_custom_taxonomies() {
		$labels = array(
			'name' => _x('Developers', 'taxonomy general name', 'tutorials'),
			'singular_name' => _x('Developer', 'taxonomy singular name', 'tutorials'),
			'search_items' => __('Search Developers', 'tutorials'),
			'all_items' => __('All Developer', 'tutorials'),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __('Edit Developer', 'tutorials'),
			'update_item' => __('Update Developer', 'tutorials'),
			'add_new_item' => __('Add new Developer', 'tutorials'),
			'new_item_name' => __('New Developer Name', 'tutorials'),
			'separate_items_with_commas' => __('Separate Developer with commas', 'tutorials'),
			'add_or_remove_items' => __('Add or Remove Developer', 'tutorials'),
			'choose_from_most_used' => __('Choose from most use Developer', 'tutorials'),
			'not_found' => __('Not Found Developer', 'tutorials'),
			'menu_name' => __('Developer', 'tutorials'),

		);

		$args = array(
			'hierachical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array('slug' => 'developer'),
		);

		register_taxonomy('developer', ['tutorials'], $args);

	}
}
