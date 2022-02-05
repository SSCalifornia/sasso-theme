<?php

namespace SASSO;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Setup {
	private $theme_url;
	private $version = '1.0.0';

	public function __construct() {
		$this->theme_url = get_template_directory_uri();

		// scripts & styles
		add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ), 999 );

		// enabling theme supports
		$this->theme_supports();

		// images sizes
		$this->add_image_sizes();

		// admin footer message
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_message' ) );
	}

	public function add_styles() {
		wp_enqueue_style( 'main', $this->theme_url . '/build/index.css', [], $this->version, 'all' );
	}

	public function add_scripts() {
		wp_enqueue_script( 'main', $this->theme_url . '/build/index.js', [ 'jquery' ], $this->version, true );

		$script_vars = array(
			'site_url' => get_option( 'siteurl' ),
		);

		wp_localize_script( 'main', 'PHP_VARS', $script_vars );
	}

	public function theme_supports() {
		// featured images
		add_theme_support( 'post-thumbnails' );

		// default thumbnail size
		set_post_thumbnail_size( 125, 125, true );

		// RSS support
		add_theme_support( 'automatic-feed-links' );

		// HTML5 support
		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );
	}

	public function admin_footer_message() {
		echo 'Sasso Studio was here.';
	}

	public function add_image_sizes() {
		add_image_size( 'large', 700, '', true ); // Large Thumbnail
		add_image_size( 'medium', 500, '', true ); // Medium Thumbnail
		add_image_size( 'small', 250, '', true ); // Small Thumbnail
		add_image_size( 'square', 1000, 1000, true ); // Square
		add_image_size( 'square-small', 500, 500, true ); // Square Small
	}
}
