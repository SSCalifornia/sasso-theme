class Variables {
	
	constructor() {
		this.set_height_var('vw', '--vw', false);
		this.set_height_var('.site-header', '--site-header-height');

		addEventListener('resize', () => {
			this.set_height_var('vw', '--vw', false);
			this.set_height_var('.site-header', '--site-header-height');
		});
	}

	set_height_var(element, var_name, is_selector = true) {

		var height = ( is_selector ) ? document.querySelector(element).getBoundingClientRect().height : document.documentElement.clientWidth / 100;

		document.documentElement.style.setProperty(var_name, `${height}px`);
	}
}

export default Variables
