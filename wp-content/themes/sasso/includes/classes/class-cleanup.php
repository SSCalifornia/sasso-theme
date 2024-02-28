<?php

namespace SASSO;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Cleanup {

	public function __construct() {
		// lower yoast priority
		add_filter( 'wpseo_metabox_prio', array( $this, 'yoast_dont_boast' ) );

		// theme head cleanups
		add_action( 'init', array( $this, 'head_cleanup' ), 1 );
		
		// remove defualt skip link
		remove_action( 'wp_footer', 'the_block_template_skip_link' );
	}

	// move yoast to bottom of edit screen
	public function yoast_dont_boast() {
		return 'low';
	}

	public function head_cleanup() {
		// remove category feeds
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// remove post and comment feeds
		remove_action( 'wp_head', 'feed_links', 2 );

		// remove EditURI link
		remove_action( 'wp_head', 'rsd_link' );

		// remove Windows live writer
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// remove WP version
		remove_action( 'wp_head', 'wp_generator' );
	}
}
