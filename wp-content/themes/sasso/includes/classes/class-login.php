<?php

namespace SASSO;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Login {
	private $theme_url;
	private $version = '1.0.0';

	public function __construct() {
		$this->theme_url = get_template_directory_uri();
		add_filter( 'login_headerurl', array( $this, 'sasso_header_url' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'sasso_login_styles' ) );
		add_filter( 'login_headertext', array( $this, 'sasso_login_title' ) );
	}

	public function sasso_header_url() {
		return esc_url( site_url( '/' ) );
	}

	public function sasso_login_styles() {
		wp_enqueue_style( 'sasso-login-styles', $this->theme_url . '/css/sasso-login.css', [], $this->version, 'all' );
	}

	public function sasso_login_title() {
		return get_bloginfo( 'name' );
	}
}
