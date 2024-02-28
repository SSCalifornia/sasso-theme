<?php

function inline_svg( $id, $w = 'auto', $h = 'auto' ) {
	$sprite_path = '/build/images/svg-sprite.svg#sasso-svg-';
	$svg_path    = $sprite_path . $id;
	$view_box    = '0 0 ' . $w . ' ' . $h;
	$svg         = '<svg viewBox="' . $view_box . '"><use xlink:href="' . get_stylesheet_directory_uri() . $svg_path . '"></use></svg>';

	return $svg;
}
