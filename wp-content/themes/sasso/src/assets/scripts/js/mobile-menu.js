(function($) {

	let mobile_icon = $('.site-header__nav-mobile-icon'),
	close_icon = $('.site-mobile-menu__close'),
	mobile_menu = $('.site-mobile-menu'),
	main_menu = mobile_menu.find('#main-menu'),
	sub_menu = $('.sub-menu'),
	admin_offset = ($('body').hasClass('admin-bar')) ? 'site-mobile-menu--is-admin': '';

	mobile_menu.addClass(admin_offset);

	mobile_icon.click( open_mobile_menu );
	close_icon.click( close_mobile_menu );
	close_icon.click( reset_menu );

	function open_mobile_menu() {
		$('html, body').css('overflow-y', 'hidden');
		mobile_menu.show();
	}

	function close_mobile_menu() {
		$('html, body').css('overflow-y', 'auto');
		mobile_menu.hide();
	}

	if ( $(window).width() < 576 ) {
		slide_sub_nav_in();
	}

	function slide_sub_nav_in() {
		let mobile_menu_items = mobile_menu.find('li');

		mobile_menu_items.each(function(index, element) {

			// add index data attribute to main li
			$(this).attr('data-item', index);

			// check if li has submenu
			if ( $(this).children('.sub-menu').length ) {
				let menu = $(this).children('.sub-menu');

				// add chevron
				$(this).append(`
					<span class="header-nav__extra-stuff">Sub Menu</span>
					`);

				// move sub menu out of #main-menu and give corresponding data attribute
				$(this).parent().after($(this).children('.sub-menu').attr('data-menu', index));
				}

				// slide submenu over
				$(this).children('.header-nav__extra-stuff').click(function() {
					mobile_menu.addClass('header-nav__submenu-open')
					let chosen_menu = $(this).parent().data('item'),
					other_menus = $(this).parents('ul').siblings();
					other_menus.each(function() {

						if ($(this).data('menu') === chosen_menu) {
							$(this).css('transform', 'translateX(0)');
						}
					})
				});
			});

			// add back button to submenus
			sub_menu.prepend(`
				<li class="sub-menu__back-wrap"><span class="sub-menu__back">Back</span></li>
				`);

				// slide submenu back
				sub_menu.each(function() {
					$(this).children('.sub-menu__back-wrap').children('.sub-menu__back').click(function() {
						$(this).parent().parent().css('transform', 'translateX(100vw)');
					});
				});
			}

			// reset menu to default state when closed
			function reset_menu() {
				if ( mobile_menu.hasClass('header-nav__submenu-open') ) {
					sub_menu.css('transform', 'translateX(100vw)');
				}
			}

		})(jQuery);
