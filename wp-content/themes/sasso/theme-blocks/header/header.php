<?php
$header_menu = new SASSO\Menus;
?>
<a href="#site-content" class="site-header__skip-link">Skip to Content</a>
<header class="site-header">
	<div class="content-container">
		<div class="site-header__grid">
			<div class="site-header__logo">
				<a href="<?php echo esc_url( get_site_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><?php echo inline_svg( 'sasso-logo', '295.625', '164.063' ) ?></a>
			</div>
			<button class="site-header__hamburger show-on-mobile"><span class="site-header__hamburger-patty"></span></button>
			<nav class="site-header__navigation hide-on-mobile">
				<?php $header_menu->sasso_header_nav(); ?>
			</nav>
		</div>
	</div>
</header>
<?php
$header_menu->sasso_mobile_menu( 1 );
?>
