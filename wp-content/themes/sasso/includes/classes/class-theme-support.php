<?php

namespace SASSO;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Theme_Support {

	public function __construct() {
		add_action( 'init', array( $this, 'register_theme_support' ) );
	}

	public function register_theme_support() {
		if ( function_exists( 'add_theme_support' ) ) {

			// Title Tag Support
			add_theme_support( 'title-tag' );

			// Add Menu Support
			add_theme_support( 'menus' );

			// Enables post and comment RSS feed links to head
			add_theme_support( 'automatic-feed-links' );

			// Add theme support for WooCommerce
			if ( class_exists( 'WooCommerce' ) ) {
				add_theme_support( 'woocommerce' );
			}
		}
	}
}
