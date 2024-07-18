<?php

namespace SASSO\Functions;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Image {

	public function inline_svg( $id, $w = 'auto', $h = 'auto' ) {
		$sprite_path   = '/build/images/svg-sprite.svg#sasso-svg-';
		$svg_path      = $sprite_path . $id;
		$view_box      = '0 0 ' . $w . ' ' . $h;
		$svg           = '<svg style="width: 100%;" viewBox="' . $view_box . '"><use xlink:href="' . get_stylesheet_directory_uri() . $svg_path . '"></use></svg>';
		$kses_defaults = wp_kses_allowed_html( 'post' );

		$svg_args = array(
			'svg'   => array(
				'class'           => true,
				'aria-hidden'     => true,
				'aria-labelledby' => true,
				'role'            => true,
				'xmlns'           => true,
				'width'           => true,
				'height'          => true,
				'viewbox'         => true, // <= Must be lower case!
				'style'           => true,
			),
			'use'   => array( 'xlink:href' => true ),
			'g'     => array( 'fill' => true ),
			'title' => array( 'title' => true ),
			'path'  => array(
				'd'    => true,
				'fill' => true,
			),
		);

		$allowed_tags = array_merge( $kses_defaults, $svg_args );

		echo wp_kses( $svg, $allowed_tags );
	}
}
