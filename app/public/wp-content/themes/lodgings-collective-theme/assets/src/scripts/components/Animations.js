import throttle from 'lodash/throttle';
import debounce from 'lodash/debounce';

class Animations {
	constructor() {
		this.itemsToReveal = document.querySelectorAll('.scrolled');
		if (!this.itemsToReveal.length) return;

		this.browserHeight = window.innerHeight;
		this.scrollThrottle = throttle(this.calcCaller, 200).bind(this);

		this.hideInitially();
		this.events();
		this.restoreScrollPosition();
	}

	events() {
		window.addEventListener('scroll', this.scrollThrottle);
		window.addEventListener(
			'resize',
			debounce(() => {
				this.browserHeight = window.innerHeight;
			}, 250)
		);
	}

	calcCaller() {
		this.itemsToReveal.forEach((el) => {
			if (!el.isRevealed) this.calculateIfScrolledTo(el);
		});
	}

	calculateIfScrolledTo(el) {
		const { top } = el.getBoundingClientRect();
		if (window.scrollY + this.browserHeight > el.offsetTop) {
			const scrollPercent = (top / this.browserHeight) * 100;
			if (scrollPercent < 95) {
				el.classList.add('reveal-item--is-visible');
				el.isRevealed = true;
			}
		}
	}

	hideInitially() {
		this.itemsToReveal.forEach((el) => {
			el.classList.add('reveal-item');
			el.isRevealed = false;
		});
	}

	restoreScrollPosition() {
		const currentPage = window.location.href;
		const savedPage = localStorage.getItem('currentPage');
		const currentScrollY = localStorage.getItem('currentScrollY');
		if (currentPage === savedPage && currentScrollY) {
			window.scrollTo(0, currentScrollY);
			localStorage.removeItem('currentScrollY');
		} else {
			window.scrollTo(0, 0);
		}
		localStorage.setItem('currentPage', currentPage);
	}
}

window.addEventListener('beforeunload', () => {
	localStorage.setItem('currentScrollY', window.scrollY);
});

export default Animations;
