<?php

namespace SASSO;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Menus {

	public function __construct() {
		add_action( 'init', array( $this, 'register_sasso_menus' ) );
	}

	// register menu locations
	public function register_sasso_menus() {
		register_nav_menus(array(
			'header-menu'  => __( 'Header Menu', 'sasso' ),
			'footer-menu'  => __( 'Footer Menu', 'sasso' ),
		));
	}

	// register header navigation
	public function sasso_header_nav( $depth = 1 ) {
		wp_nav_menu(
			array(
				'theme_location'  => 'header-menu',
				'depth'           => $depth,
				'container'       => 'ul',
				'container_class' => '',
				'container_id'    => 'main-nav',
				'menu_id'         => 'main-menu',
				'menu_class'      => 'header-nav',
			)
		);
	}

	// register footer navigation
	public function sasso_footer_nav( $depth = 1 ) {
		wp_nav_menu(
			array(
				'theme_location'  => 'footer-menu',
				'depth'           => $depth,
				'container'       => 'div',
				'container_class' => '',
				'container_id'    => 'footer-nav',
				'menu_id'         => 'footer-menu',
				'menu_class'      => 'footer-nav',
			)
		);
	}

	public function sasso_mobile_menu( $depth = 1 ) {
		?>
		<div class="site-mobile-menu">
			<div class="site-mobile-menu__close"><?php echo esc_html__( 'Close Menu', 'sasso' ); ?></div>
			<?php $this->sasso_header_nav( $depth ); ?>
		</div>
		<?php
	}
}
