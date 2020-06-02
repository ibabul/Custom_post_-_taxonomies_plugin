<?php
namespace Custom\Post\Frontend;

class Shortcode {
	function __construct() {
		add_shortcode('cs2', [$this, 'render_shortcode']);
	}

	public function render_shortcode() {

		return 'Hello everyone i am shortcode full form';
	}
}
