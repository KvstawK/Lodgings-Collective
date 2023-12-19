class EaReviews {
	constructor() {
		this.stars = document.querySelectorAll('.star');

		this.events();
	}

	events() {
		this.stars.forEach((star, i) =>
			star.addEventListener('click', (star) =>
				this.starSelection(star, i)
			)
		);
	}

	starSelection(star, i) {
		const current_star_level = i + 1;

		this.stars.forEach((star, j) => {
			if (current_star_level >= j + 1) {
				star.innerHTML = '&#9733';
			} else {
				star.innerHTML = '&#9734';
			}
		});
	}
}

export default EaReviews;
