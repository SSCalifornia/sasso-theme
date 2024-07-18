// scss
import './assets/styles/style.scss'

// js
//import './assets/scripts/sliding-mobile-menu.js'
import Variables from './assets/scripts/variables.js';
import SiteMobileMenu from './assets/scripts/site-mobile-menu.js';

document.addEventListener('DOMContentLoaded', () => {
	new Variables();
	new SiteMobileMenu();
});
