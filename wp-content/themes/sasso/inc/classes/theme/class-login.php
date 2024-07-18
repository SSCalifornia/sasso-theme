<?php

namespace SASSO\Theme;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Login {
	private $theme_url;
	private $theme_path;
	private $theme_css_version;

	public function __construct() {
		$this->theme_url         = get_template_directory_uri();
		$this->theme_path        = get_theme_file_path();
		$this->theme_css_version = filemtime( $this->theme_path . '/css/sasso-login.css' );

		add_filter( 'login_headerurl', array( $this, 'header_url' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'login_styles' ) );
		add_filter( 'login_headertext', array( $this, 'login_title' ) );
	}

	public function header_url() {
		return esc_url( site_url( '/' ) );
	}

	public function login_styles() {
		wp_enqueue_style( 'sasso-login-styles', $this->theme_url . '/css/sasso-login.css', [], $this->theme_css_version, 'all' );
	}

	public function login_title() {
		return get_bloginfo( 'name' );
	}
}
