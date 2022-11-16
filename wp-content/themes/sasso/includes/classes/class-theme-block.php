<?php

namespace SASSO;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Theme_Block {
	private $theme_stylesheet;
	private $theme_path;

	function __construct( $name ) {
		$this->theme_stylesheet = get_stylesheet_directory_uri();
		$this->theme_path       = get_theme_file_path();
		$this->name             = $name;

		add_action( 'init', array( $this, 'initialize_block' ) );
	}

	public function theme_block_callback( $attributes, $content ) {
		ob_start();
		require $this->theme_path . "/theme-blocks/{$this->name}/{$this->name}.php";
		return ob_get_clean();
	}

	public function initialize_block() {
		wp_register_script( $this->name, $this->theme_stylesheet . "/build/{$this->name}.js", array( 'wp-blocks', 'wp-editor' ) );

		register_block_type("sasso-blocks/{$this->name}", array(
			'editor_script'   => $this->name,
			'render_callback' => [ $this, 'theme_block_callback' ],
		));
	}
}
