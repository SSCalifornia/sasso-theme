<?php
/**
 * Setup class
 */

namespace SASSO_BLOCKS\Content;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Setup {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_sasso_assets' ) );
		add_action( 'admin_head', array( $this, 'enqueue_sasso_assets' ) ); // requires loading on Admin side for WYSIWYG
	}

	public function enqueue_sasso_assets() {
		wp_enqueue_style( 'sasso-blocks', plugins_url( '../../build/style-index.css', __FILE__ ), null, null, 'all' );
		wp_enqueue_script( 'sasso-blocks', plugins_url( '../../build/index.js', __FILE__ ), [ 'jquery' ], null, true );
	}

}
