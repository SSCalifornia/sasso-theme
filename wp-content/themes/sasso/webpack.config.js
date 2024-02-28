const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );
const SVGSpritemapPlugin = require( 'svg-spritemap-webpack-plugin' );

module.exports = {
	...defaultConfig,
	module: {
		rules: [
			...defaultConfig.module.rules,
			{
				test: /\.svg$/,
				use: [ '@svgr/webpack', 'url-loader' ],
			},
		],
	},
	plugins: [
		...defaultConfig.plugins,

		new SVGSpritemapPlugin(
			'src/assets/images/svgs/*.svg',
			{
				output: {
					filename: 'images/svg-sprite.svg',
					svg: {
						sizes: true,
					},
				},
				sprite: {
					prefix: 'sasso-svg-',
					generate: {
						title: false
					},
				},
				styles: false,
			}
		),
	],
};
