import { registerBlockType } from "@wordpress/blocks"
import { __ } from '@wordpress/i18n';
import { sasso_block_icon } from '../../src/assets/scripts/sasso-block-icon.js';

registerBlockType("sasso-blocks/footer", {
	title: __('Site Footer', 'sasso'),
	description: __( 'Default theme footer', 'sasso' ),
	icon: sasso_block_icon,
	category: 'sasso-theme-category',
	edit: function () {
		return wp.element.createElement("div", { className: "static-theme-block" }, "Footer Placeholder")
	},
	save: function () {
		return null
	}
})
