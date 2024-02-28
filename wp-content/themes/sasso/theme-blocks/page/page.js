import { registerBlockType } from "@wordpress/blocks"
import { __ } from '@wordpress/i18n';
import { sasso_block_icon } from '../../src/assets/scripts/sasso-block-icon.js';

registerBlockType("sasso-blocks/page", {
  title: __('Site Page', 'sasso'),
	description: __( 'Default theme page' ),
	icon: sasso_block_icon,
	category: 'sasso-theme-category',
  edit: function () {
    return wp.element.createElement("div", { className: "static-theme-block" }, "Page Placeholder")
  },
  save: function () {
    return null
  }
})
