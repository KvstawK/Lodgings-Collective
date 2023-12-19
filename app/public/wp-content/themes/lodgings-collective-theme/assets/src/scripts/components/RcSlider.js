'use strict';

class RcSlider {
	constructor(id) {
		this.sliderId = id;
		if (this.sliderId === null) {
			return;
		}

		if (document.getElementsByClassName('lc-carousel').length !== 0) {
			this.carousel = this.sliderId.querySelector(
				'.lc-carousel__container-sliders'
			);
			this.slides = [...this.carousel.children];

			if (document.getElementsByClassName('dots-slider').length !== 0) {
				this.dotsSlider = this.sliderId.querySelector('.dots-slider');
				this.dotsSliderChildren = [...this.dotsSlider.children];
			}

			if (
				document.getElementsByClassName('dots-slider-btn').length !== 0
			) {
				this.nextButtonDots = this.sliderId.querySelector(
					'.dots-slider-btn-right'
				);
				this.prevButtonDots = this.sliderId.querySelector(
					'.dots-slider-btn-left'
				);
			}

			if (document.getElementsByClassName('lc-carousel__btn').length !== 0) {
				this.nextButton = this.sliderId.querySelector(
					'.lc-carousel__btn-right'
				);
				this.prevButton = this.sliderId.querySelector(
					'.lc-carousel__btn-left'
				);
			}

			this.dotsSLiderButtons =
				this.sliderId.querySelectorAll('.dots-slider-btn');

			if (
				document.getElementsByClassName('lc-carousel__nav-dots')
					.length !== 0
			) {
				this.nav = this.sliderId.querySelector('.lc-carousel__nav');
				this.dots = [...this.nav.children];
			}

			if (document.getElementsByClassName('lc-carousel-gallery').length !== 0) {
                // this.gallerySection = document.querySelector('.lc-carousel-gallery');
                this.galleryEnabled = document.querySelector(
                    '.lc-carousel__container-sliders'
                );
                this.galleryEnabledSlides = [...this.galleryEnabled.children];
            }

			if (document.getElementsByClassName('lc-lightbox').length !== 0) {
				this.lightboxSection = document.querySelector('.lc-lightbox');
				this.lightboxEnabled = document.querySelector(
					'.lc-carousel__container-sliders'
				);
				this.lightboxEnabledSlides = [...this.lightboxEnabled.children];
				this.singleRentalsPage =
					document.querySelector('.single-lc-rentals');
			}

			this.slidesPosition();
			this.events();
		}
	}

	events() {
		// document.addEventListener("click", function(event) {
        //     console.log(event.target);
        // });

		if (document.getElementsByClassName('lc-carousel__btn').length !== 0) {
            this.nextButton.addEventListener('click', () => this.nextSlide());
            this.prevButton.addEventListener('click', () => this.prevSlide());
        }

		if (document.getElementsByClassName('dots-slider-btn').length !== 0) {
			this.nextButtonDots.addEventListener('click', () =>
				this.nextSlideDotHover()
			);

			this.prevButtonDots.addEventListener('click', () =>
				this.prevSlideDotHover()
			);

			this.nextButtonDots.addEventListener('mouseover', () =>
				this.nextSlideDotHover()
			);
			this.nextButtonDots.addEventListener('mouseout', () =>
				this.nextSlideDotExit()
			);
			this.prevButtonDots.addEventListener('mouseover', () =>
				this.prevSlideDotHover()
			);
			this.prevButtonDots.addEventListener('mouseout', () =>
				this.prevSlideDotExit()
			);
		}

		if (
			document.getElementsByClassName('lc-carousel__nav-dots').length !==
			0
		) {
			this.nav.addEventListener('click', () => this.nextSlideDotExit());
			this.nav.addEventListener('click', (e) => this.clickedDot(e));
			this.nav.addEventListener('keydown', (e) =>
				this.clickedDotPressedEnter(e)
			);
		}

		if (document.getElementsByClassName('lc-lightbox').length !== 0) {
			this.lightboxEnabled.addEventListener('click', () =>
				this.enableLightbox()
			);
		}
	}

	slidesPosition() {
		const slideWidth = this.slides[0].getBoundingClientRect().width;

		this.slides[0].classList.add('active');
		// this.slides[0].setAttribute('aria-selected', true);
		this.slides.forEach((slide) =>
			slide.setAttribute(
				'id',
				`${this.carousel.getAttribute('id')}-${
					this.slides.indexOf(slide) + 1
				}`
			)
		);
		this.slides.forEach((slide) =>
			slide.setAttribute(
				'aria-label',
				`${this.slides.indexOf(slide) + 1} of ${this.slides.length}`
			)
		);

		if (
			document.getElementsByClassName('lc-carousel__nav-dots').length !==
			0
		) {
			this.dots[0].classList.add('active');
			this.dots[0].setAttribute('aria-selected', true);
			this.dots.forEach((dot) =>
				dot.setAttribute(
					'aria-controls',
					`${this.carousel.getAttribute('id')}-${
						this.dots.indexOf(dot) + 1
					}`
				)
			);
			this.dots.forEach((dot) =>
				dot.setAttribute(
					'aria-label',
					`Slide ${this.dots.indexOf(dot) + 1}`
				)
			);
		}

		for (let index = 0; index < this.slides.length; index++) {
            if (this.sliderId.classList.contains('lc-carousel-gallery')) {
                return;
            } else if (this.sliderId.classList.contains('lc-carousel-image-appear-disappear-type')) {
                this.slides[index].style.opacity = 0;
                this.slides[index].style.visibility = 'hidden';
            } else if (this.sliderId.classList.contains('lc-slider-horizontal-scroll-type')) {
                this.slides[index].style.left = slideWidth * index + 'px';
            }
        }

		// Hide Buttons when there are no more than one slides
		if (this.slides.length < 2) {
			this.prevButton.style.display = 'none';
			this.nextButton.style.display = 'none';
		}

		if (
			document.getElementsByClassName('dots-slider-children').length !== 0
		) {
			const dotsSlideWidth =
				this.dotsSliderChildren[0].getBoundingClientRect().width;

			for (
				let index = 0;
				index < this.dotsSliderChildren.length;
				index++
			) {
				this.dotsSliderChildren[index].style.left =
					dotsSlideWidth * index + 'px';
			}
		}
	}

	nextSlide() {
		const currentSlide = this.carousel.querySelector('.active');
		const next = currentSlide.nextElementSibling;

		this.moveSlider(currentSlide, next);
		this.hideButton(next);
		this.moveToDot(next);
	}

	// nextSlidePressedEnter(e) {
	//     if (13 === e.keyCode) {
	//         // console.log(this.nextSlide())
	//         this.nextSlide()
	//     }
	// }

	// nextSlidePressedEnter(e) {
	//     if (13 === e.keyCode) {
	//         // console.log(this.nextSlide())
	//         this.nextSlide()
	//     }
	// }

	nextSlideDotHover() {
		const fullWidth =
			this.dotsSlider.clientWidth - this.carousel.clientWidth;

		if (this.dotsSlider.offsetLeft === -Math.abs(fullWidth)) {
			this.nextButtonDots.classList.add('low-opacity');
		} else {
			this.prevButtonDots.classList.remove('low-opacity');
			if (document.getElementsByClassName('lc-lightbox').length !== 0) {
				const padding = window
					.getComputedStyle(this.sliderId, null)
					.getPropertyValue('padding-left');
				const paddingWithoutPx = parseInt(padding, 10);
				const fullWidthWithoutPadding = fullWidth - paddingWithoutPx;

				this.dotsSlider.style.left =
					`-${fullWidthWithoutPadding}` + 'px';
			} else {
				this.dotsSlider.style.left = `-${fullWidth}` + 'px';
			}
		}
	}

	nextSlideDotExit() {
		if (document.getElementsByClassName('dots-slider').length !== 0) {
			const currentDotsSliderWidth = this.dotsSlider.offsetLeft;

			this.dotsSlider.style.left = `${currentDotsSliderWidth}` + 'px';
		}
	}

	prevSlideDotHover() {
		if (this.dotsSlider.offsetLeft === 0) {
			this.prevButtonDots.classList.add('low-opacity');
		} else {
			this.nextButtonDots.classList.remove('low-opacity');
			this.dotsSlider.style.left = '0px';
		}
	}

	prevSlideDotExit() {
		const currentDotsSliderWidth = this.dotsSlider.offsetLeft;

		this.dotsSlider.style.left = `${currentDotsSliderWidth}` + 'px';
	}

	prevSlide() {
		const currentSlide = this.carousel.querySelector('.active');
		const prev = currentSlide.previousElementSibling;

		this.moveSlider(currentSlide, prev);
		this.hideButton(prev);
		this.moveToDot(prev);
	}

	// prevSlidePressedEnter(e) {
	//     if (13 === e.keyCode) {
	//         this.prevSlide()
	//     }
	// }

	// prevSlidePressedEnter(e) {
	//     if (13 === e.keyCode) {
	//         this.prevSlide()
	//     }
	// }

	moveSlider(currentSlide, targetSlide) {
		if (targetSlide != null) {
			const position = targetSlide.style.left;

			this.carousel.style.transform = `translateX(-${position})`;
			this.toggleActive(currentSlide, targetSlide);
			this.toggleActiveAria(currentSlide, targetSlide);
		}
	}

	toggleActive(current, slide) {
		if (slide != null) {
			current.classList.remove('active');
			current.setAttribute('aria-selected', 'false');

			slide.classList.add('active');
			slide.setAttribute('aria-selected', 'true');
		}
	}

	toggleActiveAria(currentSlide, targetSlide) {
		if (
			document.getElementsByClassName('lc-carousel__nav-dots').length !==
			0
		) {
			if (
				this.sliderId.getElementsByClassName(
					'lc-carousel__container-sliders-slide-content'
				).length !== 0
			) {
				const currentSlideContent = currentSlide.lastElementChild;
				const currentSlideContentDescription =
					currentSlide.querySelector(
						'.lc-carousel__container-sliders-slide-content-description'
					);
				// const currentSlideContentButtonLink = currentSlide.querySelector('button a')
				const targetSlideContent = targetSlide.lastElementChild;
				const targetSlideContentDescription = targetSlide.querySelector(
					'.lc-carousel__container-sliders-slide-content-description'
				);
				// const targetSlideContentButtonLink = targetSlide.querySelector('button a')

				currentSlideContent.setAttribute('tabindex', '-1');
				currentSlideContentDescription.setAttribute('tabindex', '-1');
				// currentSlideContentButtonLink.setAttribute('tabindex', '-1')

				targetSlideContent.setAttribute('tabindex', '0');
				targetSlideContentDescription.setAttribute('tabindex', '0');
				// targetSlideContentButtonLink.setAttribute('tabindex', '0')
			}
		}
	}

	hideButton(targetSlide) {
		if (targetSlide === this.slides[0]) {
			this.prevButton.classList.add('hide');
			this.prevButton.setAttribute('tabindex', '1');
			this.nextButton.classList.remove('hide');
			this.nextButton.setAttribute('tabindex', '0');
		} else if (targetSlide === this.slides[this.slides.length - 1]) {
			this.nextButton.classList.add('hide');
			this.nextButton.setAttribute('tabindex', '1');
			this.prevButton.classList.remove('hide');
			this.prevButton.setAttribute('tabindex', '0');
		} else {
			this.nextButton.classList.remove('hide');
			this.nextButton.setAttribute('tabindex', '0');
			this.prevButton.classList.remove('hide');
			this.prevButton.setAttribute('tabindex', '0');
		}
	}

	clickedDot(e) {
		if (e.target === this.nav) {
			return;
		}

		const targetDot = e.target;
		const currentDot = this.nav.querySelector('.active');
		const currentSlide = this.carousel.querySelector('.active');

		const targetDotIndex = this.findIndex(targetDot, this.dots);

		const targetSlide = this.slides[targetDotIndex];

		this.moveSlider(currentSlide, targetSlide);
		this.toggleActive(currentDot, targetDot);
		this.hideButton(targetSlide);
	}

	clickedDotPressedEnter(e) {
		if (13 === e.keyCode) {
			this.clickedDot(e);
		}
	}

	findIndex(item, items) {
		for (let index = 0; index < items.length; index++) {
			if (item === items[index]) {
				return index;
			}
		}
	}

	moveToDot(targetSlide) {
		if (
			document.getElementsByClassName('lc-carousel__nav-dots').length !==
			0
		) {
			const slideIndex = this.findIndex(targetSlide, this.slides);
			const currentDot = this.nav.querySelector('.active');
			const targetDot = this.dots[slideIndex];
			this.toggleActive(currentDot, targetDot);
		}
	}

	enableLightbox() {
		const lightboxSectionActive = document.getElementsByClassName(
			'lc-carousel lc-lightbox active'
		);

		this.lightboxSection.classList.toggle('active');

		if (
			document.getElementsByClassName('lc-carousel lc-lightbox active')
				.length !== 0
		) {
			const wrapper = document.createElement('div');
			wrapper.classList.add('white-background');
			wrapper.setAttribute('id', 'white-background');

			this.lightboxSection.parentNode.insertBefore(
				wrapper,
				this.lightboxSection
			);

			for (const i in this.lightboxSection) {
				wrapper.appendChild(this.lightboxSection);
			}
		} else {
			const node = document.getElementById('white-background');
			node.replaceWith(...node.childNodes);
		}
	}
}

export default RcSlider;
