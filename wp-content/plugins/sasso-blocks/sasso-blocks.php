<?php
/*
Plugin Name: Sasso Gutenberg Blocks
Description: Custom Gutenberg Blocks
Version: 1.0
Author: Sam Sasso
Author URI: https://sassostudio.com
*/

namespace SASSO_BLOCKS;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

define( 'SASSO_BLOCKS_MAIN_PLUGIN_FILE', __FILE__ );

/* Autoloader will let us call classes directly rather than requiring the files first*/
require_once 'autoload.php';

if ( is_admin() ) {
	new Admin\Settings;

	if ( class_exists( 'ACF' ) ) {
		new Admin\Blacklist;
	}
}

new Content\Setup;

// blocks
