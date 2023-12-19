class Main {
	constructor() {
		if (document.getElementsByClassName('read-more').length !== 0) {
			this.readMoreContent = document.querySelector('.read-more--space');
			this.readMoreContentLink = document.querySelector(
				'.read-more--space a'
			);
			this.mainContentShown = document.querySelector(
				'.rentals__single-content-main-content'
			);
			this.hiddenContent = document.querySelectorAll('.content--hidden');

			this.readMoreReview = document.querySelectorAll(
				'.read-more-review-button'
			);

			this.readMoreFacilitiesLink = document.querySelectorAll(
				'.read-more--facilities a'
			);
			this.hiddenFacilities = document.querySelectorAll(
				'.lc-rentals__facilities-container :nth-child(n+7)'
			);
			this.facilitiesArray = Array.from(this.hiddenFacilities);

			this.setAria();
			this.wrapFacilities();
			this.events();
		}

		this.dontLazyloadSpecificImages();
		this.checkLinksInSinglePost();
		this.addSmoothScrollingToLinks();
		this.addGoToTopArrowInBlogPost();
	}

	events() {
		this.readMoreContent.addEventListener('click', () =>
			this.showContent()
		);
		this.readMoreReview.forEach((r) =>
			r.addEventListener('click', (r) => this.showReview(r))
		);
		this.readMoreFacilitiesLink.forEach((f) =>
			f.addEventListener('click', () => this.showFacilities())
		);
	}

	setAria() {
		this.readMoreContentLink.setAttribute('role', 'tabpanel');
		this.readMoreContentLink.setAttribute('aria-expanded', 'false');
		this.readMoreContentLink.setAttribute('aria-controls', 'content1');
		this.readMoreContentLink.appendChild(document.createElement('span'));
		this.readMoreContentLink.firstElementChild.classList.add(
			'screen-reader-text'
		);
		if (window.location.hostname === 'lodgingscollective.com') {
			this.readMoreContentLink.firstElementChild.insertAdjacentHTML(
				'afterbegin',
				'Description'
			);
		} else {
			this.readMoreContentLink.firstElementChild.insertAdjacentHTML(
				'afterbegin',
				'Από την περιγραφή'
			);
		}
		this.hiddenContent.forEach((c) => c.setAttribute('id', 'content1'));
		this.hiddenContent.forEach((c) => c.setAttribute('role', 'region'));
		this.hiddenContent.forEach((c) =>
			c.setAttribute('aria-labelledby', 'content1')
		);

		this.readMoreFacilitiesLink.forEach((fl) =>
			fl.setAttribute('role', 'tabpanel')
		);
		this.readMoreFacilitiesLink.forEach((fl) =>
			fl.setAttribute('aria-expanded', 'false')
		);
		this.readMoreFacilitiesLink.forEach((fl) =>
			fl.setAttribute('aria-controls', 'facilities-hidden')
		);
	}

	showContent() {
		if (
			this.readMoreContentLink.getAttribute('aria-expanded') === 'false'
		) {
			this.hiddenContent.forEach((c) => c.classList.add('active'));
			this.readMoreContentLink.setAttribute('aria-expanded', 'true');
			if (window.location.hostname === 'lodgingscollective.com') {
				this.readMoreContentLink.innerHTML =
					'Read Less<span class="screen-reader-text">Description</span>';
			} else {
				this.readMoreContentLink.innerHTML =
					'Λιγότερα<span class="screen-reader-text">Από την περιγραφή</span>';
			}
		} else {
			this.hiddenContent.forEach((c) => c.classList.remove('active'));
			this.readMoreContentLink.setAttribute('aria-expanded', 'false');
			if (window.location.hostname === 'lodgingscollective.com') {
				this.readMoreContentLink.innerHTML =
					'Read More<span class="screen-reader-text">Description</span>';
			} else {
				this.readMoreContentLink.innerHTML =
					'Περισσότερα<span class="screen-reader-text">Από την περιγραφή</span>';
			}
		}
	}

	showReview(r) {
		if (
			this.hiddenContent.length !== 0 &&
			r.currentTarget.getAttribute('aria-expanded') === 'false'
		) {
			r.currentTarget.previousElementSibling.classList.add('active');
			r.currentTarget.parentElement.firstElementChild.style.display =
				'none';
			r.currentTarget.parentElement.firstElementChild.setAttribute(
				'aria-expanded',
				'false'
			);
			r.currentTarget.setAttribute('aria-expanded', 'true');
			if (window.location.hostname === 'lodgingscollective.com') {
				r.currentTarget.setAttribute('value', 'Read Less');
			} else {
				r.currentTarget.setAttribute('value', 'Λιγότερα');
			}
		} else {
			r.currentTarget.previousElementSibling.classList.remove('active');
			r.currentTarget.parentElement.firstElementChild.style.display =
				'block';
			r.currentTarget.parentElement.firstElementChild.setAttribute(
				'aria-expanded',
				'true'
			);
			r.currentTarget.setAttribute('aria-expanded', 'false');
			if (window.location.hostname === 'lodgingscollective.com') {
				r.currentTarget.setAttribute('value', 'Read More');
			} else {
				r.currentTarget.setAttribute('value', 'Περισσότερα');
			}
		}
	}

	wrapFacilities() {
		if (
			document.getElementsByClassName(
				'lc-rentals__facilities-container-item'
			).length !== 0
		) {
			const wrapper = document.createElement('div');
			wrapper.classList.add('facilities-hidden');
			wrapper.setAttribute('id', 'facilities-hidden');
			wrapper.setAttribute('aria-labelledby', 'facilities-hidden');
			wrapper.setAttribute('role', 'region');

			this.facilitiesArray[0].parentNode.insertBefore(
				wrapper,
				this.facilitiesArray[0]
			);

			for (const i in this.facilitiesArray) {
				wrapper.appendChild(this.facilitiesArray[i]);
			}
		}
	}

	showFacilities() {
		const hiddenFac = document.getElementById('facilities-hidden');

		if (
			document
				.querySelector('.read-more--facilities a')
				.getAttribute('aria-expanded') === 'false'
		) {
			hiddenFac.classList.add('active');
			this.readMoreFacilitiesLink.forEach((fl) =>
				fl.setAttribute('aria-expanded', 'true')
			);
			if (window.location.hostname === 'lodgingscollective.com') {
				this.readMoreFacilitiesLink.forEach(
					(f) => (f.innerHTML = 'See Less Facilities')
				);
			} else {
				this.readMoreFacilitiesLink.forEach(
					(f) => (f.innerHTML = 'Λιγότερα')
				);
			}
		} else {
			hiddenFac.classList.remove('active');
			this.readMoreFacilitiesLink.forEach((fl) =>
				fl.setAttribute('aria-expanded', 'false')
			);
			if (window.location.hostname === 'lodgingscollective.com') {
				this.readMoreFacilitiesLink.forEach(
					(f) => (f.innerHTML = 'See All Facilities')
				);
			} else {
				this.readMoreFacilitiesLink.forEach(
					(f) => (f.innerHTML = 'Περισσότερα')
				);
			}
		}
	}

	dontLazyloadSpecificImages() {
		document.addEventListener('DOMContentLoaded', function() {
			// Code to remove loading attribute from specific images
			const imageElement = document.querySelector(
				'img[src="https://lodgingscollective.com/wp-content/uploads/2023/02/main-slider-image1-685x1024.jpg"], img[src="//localhost:3000/wp-content/uploads/2023/02/main-slider-image1-685x1024.jpg"]'
			);

			if (imageElement) {
				if (imageElement.src.includes('https://lodgingscollective.com')) {
					imageElement.removeAttribute('loading');
				} else if (
					imageElement.src.includes(
						'localhost:3000/wp-content/uploads/2023/02/main-slider-image1-685x1024.jpg'
					)
				) {
					imageElement.removeAttribute('loading');
				}
			}
		});
	}

	checkLinksInSinglePost() {
		if (document.body.classList.contains('single-post')) {
			const links = document.querySelectorAll('.blog__single-content a');

			links.forEach(link => {
				link.setAttribute('target', '_blank');
				link.setAttribute('rel', 'noopener');
			});
		}
	}

	addSmoothScrollingToLinks() {
		// Select all links that have a hash in their href attribute
		const links = document.querySelectorAll('a[href^="#"]');

		// For each link
		links.forEach(link => {
			// Listen for the click event
			link.addEventListener('click', function(event) {
				// Prevent the default action
				event.preventDefault();

				// Get the target element by its id
				const targetElement = document.getElementById(this.hash.slice(1));
				// If the target element exists
				if (targetElement) {
					// Get the top position of the target element
					const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
					// Scroll the window to the target position minus 200px
					window.scrollTo({ top: targetPosition - 150, behavior: 'smooth' });
				}
			});
		});
	}

	addGoToTopArrowInBlogPost() {
		// Select the div with the class 'blog__single-content-arrow'
		const div = document.querySelector('.blog__single-content-arrow');
		// If the div exists
		if (div) {
			// Set the initial opacity of the div to 0
			div.style.opacity = '0';
			// Select the image inside the div
			const image = div.querySelector('img');
			// If the image exists
			if (image) {
				// Add the class to the image
				image.classList.add('blog__single-content-arrow');
			}

			// Listen for the scroll event
			window.addEventListener('scroll', function() {
				// Calculate the scroll position as a percentage of the viewport height
				const scrollPosition = window.scrollY / window.innerHeight;

				// If the scroll position is greater than 1 (i.e., 100vh), set the opacity to 1
				if (scrollPosition > 1) {
					div.style.opacity = '1';
				} else {
					// Otherwise, set the opacity to 0
					div.style.opacity = '0';
				}
			});
		}
	}
}

export default Main;
