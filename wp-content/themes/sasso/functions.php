<?php
/**
* Main setup file for the Sasso theme.
*
* This file initializes the theme setup, including theme support, navigation menus,
* SVG image handling, and custom blocks. It requires necessary dependencies and
* instantiates various classes to set up the theme's features.
*
* This file is meant to be used as a table of contents and functions should not
* be added directly to this file.
*
* @package SASSO
*/

// Load dependencies
require_once 'inc/autoload.php';

// Theme
$sasso_setup   = new SASSO\Theme\Setup();
$sasso_cleanup = new SASSO\Theme\Cleanup();
$sasso_login   = new SASSO\Theme\Login();

// Navigation
$sasso_menu = new SASSO\Navigation\Menus();

// Theme Blocks
$sasso_header = new SASSO\Blocks\Theme_Block( 'header' );
$sasso_footer = new SASSO\Blocks\Theme_Block( 'footer' );
$sasso_page   = new SASSO\Blocks\Theme_Block( 'page' );
$sasso_single = new SASSO\Blocks\Theme_Block( 'single' );
