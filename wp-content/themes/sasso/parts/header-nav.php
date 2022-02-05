<div class="content-wrap">
	<div class="site-header__nav">
		<div class="site-header__nav-left">
			<div class="site-header__nav-logo">
				<a href="<?php echo esc_url( get_site_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
			</div>
		</div>
		<div class="site-header__nav-right">
			<div class="site-header__nav-mobile-icon show-on-mobile"><?php echo esc_html__( 'Menu' ); ?></div>
			<div class="site-header__nav-menu hide-on-mobile">
				<?php
				$header_nav = new SASSO\Menus;
				$header_nav->sasso_header_nav();
				?>
			</div>
		</div>
	</div>
</div>
