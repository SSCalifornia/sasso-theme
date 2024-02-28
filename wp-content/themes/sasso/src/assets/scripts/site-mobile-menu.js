import $ from 'jquery';

class SiteMobileMenu {
	constructor() {
		this.hamburger = $('.site-header__hamburger');
		this.site_mobile_menu = $('.site-mobile-menu');

		this.hamburger.click( () => {
			this.toggle_active_class();
			this.site_mobile_menu.slideToggle();
		});
	}

	toggle_active_class() {
		this.hamburger.toggleClass('site-header__hamburger--is-active');
		this.site_mobile_menu.toggleClass('site-mobile-menu--is-open');
	}
}

export default SiteMobileMenu
