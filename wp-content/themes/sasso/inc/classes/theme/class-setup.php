<?php

namespace SASSO\Theme;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Setup {
	private $theme_url;
	private $theme_path;
	private $theme_css_version;
	private $theme_js_version;

	public function __construct() {
		$this->theme_url         = get_template_directory_uri();
		$this->theme_path        = get_theme_file_path();
		$this->theme_css_version = filemtime( $this->theme_path . '/build/style-index.css' );
		$this->theme_js_version  = filemtime( $this->theme_path . '/build/index.js' );

		// scripts & styles
		add_action( 'wp_enqueue_scripts', array( $this, 'add_theme_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_theme_scripts' ) );
		add_action( 'admin_init', array( $this, 'add_theme_styles_to_admin' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'theme_block_editor' ) );

		// add custom block category
		add_filter( 'block_categories_all', array( $this, 'add_block_cat' ), 10, 2 );

		// enabling theme supports
		$this->theme_supports();

		// images sizes
		$this->add_image_sizes();

		// admin footer message
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_message' ) );

		// add head stuff
		add_action( 'wp_head', array( $this, 'add_head_stuff' ), 1 );

		// add admin head stuff
		add_action( 'admin_head', array( $this, 'add_admin_head_stuff' ) );

		// add body classes
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
	}

	public function add_theme_styles() {
		wp_enqueue_style( 'sasso', $this->theme_url . '/build/style-index.css', [], $this->theme_css_version, 'all' );
	}

	public function add_theme_scripts() {
		wp_enqueue_script( 'sasso', $this->theme_url . '/build/index.js', [ 'jquery' ], $this->theme_js_version, true );

		$script_vars = array(
			'site_url' => get_option( 'siteurl' ),
		);

		wp_localize_script( 'main', 'PHP_VARS', $script_vars );
	}

	public function add_theme_styles_to_admin() {
		add_editor_style( array(
			'build/style-index.css',
			'build/index.css',
		) );
	}

	// js to edit core blocks
	public function theme_block_editor() {
		wp_enqueue_script( 'theme-block-editor', $this->theme_url . '/src/assets/scripts/js/theme-block-editor.js', array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '', true );
	}

	public function add_block_cat( $categories ) {
		return array_merge(
			array(
				array(
					'slug'  => 'sasso-blocks-category',
					'title' => 'Sasso Blocks',
				),
				array(
					'slug'  => 'sasso-theme-category',
					'title' => 'Sasso Theme Blocks',
				),
			),
			$categories
		);
	}

	public function theme_supports() {

		add_theme_support( 'title-tag' );

		// default thumbnail size
		set_post_thumbnail_size( 125, 125, true );

	}

	public function admin_footer_message() {
		echo 'Sasso Studio was here.';
	}

	public function add_image_sizes() {
		add_image_size( 'large', 700, '', true ); // Large Thumbnail
		add_image_size( 'medium', 500, '', true ); // Medium Thumbnail
		add_image_size( 'small', 250, '', true ); // Small Thumbnail
		add_image_size( 'square', 1000, 1000, true ); // Square
		add_image_size( 'square-small', 500, 500, true ); // Square Small
	}

	public function add_head_stuff() {
		do_action( 'sasso_top_head' );
		$this->add_favicon();
	}

	public function add_admin_head_stuff() {
		$this->add_favicon();
		echo
		'<style>
		@media (min-width: 960px) {
			.interface-complementary-area {
				width: 440px !important;
			}
		}
		</style>';
	}

	public function add_body_classes( $classes ) {
		global $post;
		$body_class = '';
		$post_name  = ( is_singular() ) ? $post->post_name : '';

		if ( is_front_page() ) {
			$body_class = 'is-front-page';
		} elseif ( is_home() ) {
			$body_class = 'is-posts-page';
		}

		return array_merge( $classes, array(
			$body_class,
			$post_name,
		) );
	}

	public function add_favicon() {
	$customizer_icon = get_option( 'site_icon', false );
	if ( '0' === $customizer_icon ) {
		?>
		<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-touch-icon.png">
		<?php
	}
}
}
