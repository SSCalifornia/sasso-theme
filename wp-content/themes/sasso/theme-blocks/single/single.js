import { registerBlockType } from "@wordpress/blocks"
import { __ } from '@wordpress/i18n';
import { sasso_block_icon } from '../../src/assets/scripts/sasso-block-icon.js';

registerBlockType("sasso-blocks/single", {
  title: __('Site Single', 'sasso'),
	description: __( 'Default theme single' ),
	icon: sasso_block_icon,
	category: 'sasso-theme-category',
  edit: function () {
    return wp.element.createElement("div", { className: "static-theme-block" }, "Single Placeholder")
  },
  save: function () {
    return null
  }
})
