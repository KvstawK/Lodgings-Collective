class Faq {
	constructor() {
		if (document.getElementsByClassName('faq').length !== 0) {
			this.faqItemsHeader = document.querySelectorAll(
				'.faq-container-content-item-text-header'
			);
			this.item = document.querySelector('.faq-container-content-item');

			this.setArrowImageAndBorder();
			this.events();
		}
	}

	events() {
		this.faqItemsHeader.forEach((item) =>
			item.addEventListener('click', (e) => this.toggleActive(e))
		);
		// this.faqItemsHeader.forEach((item, i, arr) => {
		//     item.addEventListener('click', e => this.toggleActive(e))
		//     console.log(arr)
		// })
	}

	toggleActive(e) {
		const expanded =
			e.currentTarget.parentElement.parentElement.getAttribute(
				'aria-expanded'
			);

		if (expanded !== 'true') {
			this.removeCurrentActiveItem();
			e.currentTarget.nextElementSibling.classList.add('active');
			e.currentTarget.parentElement.parentElement.setAttribute(
				'aria-expanded',
				'true'
			);
			e.currentTarget.lastElementChild.style.transform = 'rotate(90deg)';
			e.currentTarget.style.borderBottom =
				'1px solid rgba(211, 211, 211, 0.4)';
		} else {
			e.currentTarget.nextElementSibling.classList.remove('active');
			e.currentTarget.parentElement.parentElement.setAttribute(
				'aria-expanded',
				'false'
			);
			e.currentTarget.lastElementChild.style.transform = 'rotate(0)';
			e.currentTarget.style.borderBottom = '0';
		}
	}

	removeCurrentActiveItem() {
		const activeItem = document.querySelectorAll(
			'.faq-container-content-item-text-info.active'
		);

		activeItem.forEach((a) => a.classList.remove('active'));
		activeItem.forEach((e) =>
			e.parentNode.parentElement.setAttribute('aria-expanded', 'false')
		);
		activeItem.forEach(
			(i) =>
				(i.previousElementSibling.children[1].style.transform =
					'rotate(0)')
		);
	}

	setArrowImageAndBorder() {
		if (
			document.getElementsByClassName('faq-container-content-item')
				.length !== 0
		) {
			if (this.item.getAttribute('aria-expanded') === 'true') {
				document.querySelector(
					'.faq-container-content-item-text-header img'
				).style.transform = 'rotate(90deg)';
			}

			if (this.item.getAttribute('aria-expanded') === 'true') {
				this.item.children[0].firstElementChild.style.borderBottom =
					'1px solid rgba(211, 211, 211, 0.4)';
			}
		}
	}
}

export default Faq;
