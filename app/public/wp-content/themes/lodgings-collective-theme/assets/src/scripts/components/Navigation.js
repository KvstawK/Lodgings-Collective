class Navigation {
	constructor() {
		this.nav = document.getElementById('primary-nav');
		this.navToggle = document.querySelector('.header__container-menu');
		this.currentlyOpenedMenuItem = null;
		this.menuChildrenLinks = document
			.querySelectorAll('.menu-item-has-children > a')
			.forEach((element) => {
				if ('ontouchstart' in window) {
					element.addEventListener('touchstart', (e) => {
						e.preventDefault();
						this.openLinksWithTouch(e);
					}, { passive: false });
				} else {
					element.addEventListener('click', (e) => this.openLinksWithTouch(e), { passive: true });
				}
			});

		// Add click event handler for sub-menu items
		this.subMenuItems = document
			.querySelectorAll('.sub-menu > li > a')
			.forEach((element) => {
				element.addEventListener('click', (e) => {
					e.stopPropagation();
				});
			});

		this.events();
	}

	events() {
		this.navToggle.addEventListener('click', () => this.toggleNav());
		document.body.addEventListener('click', (e) => this.closeMenuIfClickedOutside(e));

		// code to see in the console which element i click
		// document.body.addEventListener('click', function(e) {
		// 	console.log(e.target);
		// });
	}

	toggleNav() {
		const visible = this.nav.getAttribute('data-visible');

		if (visible === 'false') {
			this.nav.setAttribute('data-visible', true);
			this.navToggle.setAttribute('aria-expanded', true);
		} else {
			this.nav.setAttribute('data-visible', false);
			this.navToggle.setAttribute('aria-expanded', false);
		}
	}

	openLinksWithTouch(e) {
		e.stopPropagation();

		const menu_list = e.currentTarget.parentNode;
		const menu_button = e.currentTarget.childNodes[1];
		const button_span_open = menu_button.childNodes[0];
		const button_span_closed = menu_button.childNodes[1];
		const menuItems = document.querySelectorAll('.menu-item-has-children');

		// Close all other menu items
		menuItems.forEach((menuItem) => {
			// Check if the menu item is not the one being clicked and not a parent or grandparent of the one being clicked
			if (menuItem !== menu_list && menuItem !== menu_list.parentElement.offsetParent && menuItem !== menu_list.parentElement.parentElement && menuItem.classList.contains('open')) {
				menuItem.classList.remove('open');
				menuItem.children[0].setAttribute('aria-expanded', 'false');
			}
		});

		// Toggle the clicked menu item
		if (menu_list.classList.contains('open') === false) {
			menu_list.classList.add('open');
			e.currentTarget.setAttribute('aria-expanded', true);
			menu_button.setAttribute('aria-expanded', true);
			button_span_open.setAttribute('aria-hidden', true);
			button_span_closed.setAttribute('aria-hidden', false);
		} else {
			menu_list.classList.remove('open');
			e.currentTarget.setAttribute('aria-expanded', false);
			menu_button.setAttribute('aria-expanded', false);
			button_span_open.setAttribute('aria-hidden', false);
			button_span_closed.setAttribute('aria.hidden', true);
		}
	}


	closeMenuIfClickedOutside(e) {
		if (!e.target.closest('.menu-item-has-children')) {
			const menuItems = document.querySelectorAll('.menu-item-has-children');
			menuItems.forEach((menuItem) => {
				if (menuItem.classList.contains('open')) {
					menuItem.classList.remove('open');
					menuItem.children[0].setAttribute('aria-expanded', 'false');
				}
			});
			this.currentlyOpenedMenuItem = null;
		}
	}
}

export default Navigation;
