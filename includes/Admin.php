<?php

namespace Custom\Post;

class Admin {
	function __construct() {
		$posts = new Post_type();

		$this->dispatch_actions($posts);
		new Admin\Menu();

	}

	public function dispatch_actions($posts) {
		add_action('init', [$posts, 'create_tutorials_cpt'], 0);
		add_action('init', [$posts, 'tuts_custom_taxonomies'], 0);
		register_activation_hook(__FILE__, 'rewrite_tuts_flush');
	}
}
