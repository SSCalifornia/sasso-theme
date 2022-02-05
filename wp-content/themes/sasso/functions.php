<?php

// classes
require_once( get_template_directory() . '/includes/classes/class-setup.php' );
require_once( get_template_directory() . '/includes/classes/class-theme-support.php' );
require_once( get_template_directory() . '/includes/classes/class-cleanup.php' );
require_once( get_template_directory() . '/includes/classes/class-login.php' );
require_once( get_template_directory() . '/includes/classes/class-menus.php' );

new SASSO\Setup();
new SASSO\Theme_Support();
new SASSO\Cleanup();
new SASSO\Login();
new SASSO\Menus();
