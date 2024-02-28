import { registerBlockType } from "@wordpress/blocks"
import { __ } from '@wordpress/i18n';
import { sasso_block_icon } from '../../src/assets/scripts/sasso-block-icon.js';

registerBlockType("sasso-blocks/header", {
  title: __('Site Header', 'sasso'),
	description: __( 'Default theme header' ),
	icon: sasso_block_icon,
	category: 'sasso-theme-category',
  edit: function () {
    return wp.element.createElement("div", { className: "static-theme-block" }, "Header Placeholder")
  },
  save: function () {
    return null
  }
})
