<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<header class="site-header">
			<?php get_template_part( 'parts/header', 'nav' ); ?>
		</header>

		<?php
		if ( is_front_page() ) {
			echo '<div class="site-front-page">';
		} elseif ( is_page() ) {
			echo '<div class="site-default-page">';
		} elseif ( is_home() ) {
			echo '<div class="site-blog-home">';
		} elseif ( is_single() ) {
			echo '<div class="site-blog-single">';
		} elseif ( is_archive() ) {
			echo '<div class="site-archive">';
		} elseif ( is_search() ) {
			echo '<div class="site-search">';
		}
		?>
		<!-- opens page identifier div - closes in footer -->
