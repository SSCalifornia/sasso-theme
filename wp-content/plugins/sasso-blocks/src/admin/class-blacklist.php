<?php
/**
* Options sub page for blacklisting core Gutenberg Blocks
*/

namespace SASSO_BLOCKS\Admin;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Blacklist {

	public $blacklisted_blocks;

	public function __construct() {
		add_action( 'acf/settings/load_json', array( $this, 'blacklist_acf_json_load_point' ) );
		add_action( 'acf/init', array( $this, 'add_blacklist_page' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'blacklist_blocks' ) );
	}

	// add new load path for acf json
	public function blacklist_acf_json_load_point( $paths ) {
		$paths[] = plugin_dir_path( __FILE__ ) . 'acf-json';
		return $paths;
	}

	// load acf option page
	public function add_blacklist_page() {
		if ( function_exists( 'acf_add_options_sub_page' ) ) {
			acf_add_options_sub_page(array(
				'page_title'  => __( 'Gutenberg Blacklist' ),
				'menu_title'  => __( 'Gutenberg Blacklist' ),
				'parent_slug' => 'options-general.php',
			));
		}
	}

	// blacklist js
	public function blacklist_blocks() {
		wp_register_script(
			'gutenberg-blacklist-blocks',
			plugins_url( 'js/blacklist.js', __FILE__ ),
			array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
		);

		if ( get_field( 'blocks_to_blacklist', 'option' ) ) {
			$blacklisted_blocks = get_field( 'blocks_to_blacklist', 'option' );
			wp_localize_script( 'gutenberg-blacklist-blocks', 'blacklisted_blocks_vars', $blacklisted_blocks );
			wp_enqueue_script(
				'gutenberg-blacklist-blocks'
			);
		}
	}
}
