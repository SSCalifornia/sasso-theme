<?php

// classes
require_once( get_template_directory() . '/includes/classes/class-setup.php' );
require_once( get_template_directory() . '/includes/classes/class-cleanup.php' );
require_once( get_template_directory() . '/includes/classes/class-login.php' );
require_once( get_template_directory() . '/includes/classes/class-menus.php' );
require_once( get_template_directory() . '/includes/classes/class-theme-block.php' );

new SASSO\Setup();
new SASSO\Cleanup();
new SASSO\Login();
new SASSO\Menus();

// Theme Blocks
new SASSO\Theme_Block( 'header' );
new SASSO\Theme_Block( 'footer' );
