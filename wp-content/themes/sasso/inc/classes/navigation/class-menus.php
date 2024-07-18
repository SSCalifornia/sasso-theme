<?php

namespace SASSO\Navigation;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Menus {

	public function __construct() {
		add_action( 'init', array( $this, 'register_menus' ) );
	}

	// register menu locations
	public function register_menus() {
		register_nav_menus(array(
			'header-menu'  => __( 'Header Menu', 'sasso' ),
			'footer-menu'  => __( 'Footer Menu', 'sasso' ),
		));
	}

	// register header navigation
	public function header_nav( $depth = 1 ) {
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
	public function footer_nav( $depth = 1 ) {
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

	public function mobile_menu( $depth = 1, $class = 'header', $close_button = false ) {
		$menu_class = "site-mobile-menu--is-{$class}";
		?>
		<div class="site-mobile-menu <?php echo esc_attr( $menu_class ); ?>">
			<?php if ( $close_button ) : ?>
				<button class="site-mobile-menu__close"></button>
			<?php endif; ?>
			<?php $this->header_nav( $depth ); ?>
		</div>
		<?php
	}
}
