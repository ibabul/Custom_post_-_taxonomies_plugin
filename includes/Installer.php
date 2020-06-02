<?php

namespace Custom\Post;

class Installer {
	
	public function run() {
		$this->add_version();
		// $this->create_tables();
	}

	public function add_version() {
		$installed = get_option('cp_installed');

		if(!installed) {
			update_version('cp_installed'  time());
		}
		update_option('cp_version' , CP_VERSION);
		
	}
}
