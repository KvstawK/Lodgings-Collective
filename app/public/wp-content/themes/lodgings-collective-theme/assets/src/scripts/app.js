import Main from './components/Main';
import Navigation from './components/Navigation';
import RcSlider from './components/RcSlider';
import RcDatepicker from './components/RcDatepicker';
import RcSearch from './components/RcSearch';
import Faq from './components/Faq';
import EaReviews from './components/EaReviews';
import Animations from './components/Animations';

new Main();
new Navigation();
new Faq();
new RcSearch();
new EaReviews();
new Animations();

const rcDatepickerCheckIn = new RcDatepicker(
	document.querySelector('.lc-datepicker-check-in')
);
const rcDatepickerCheckOut = new RcDatepicker(
	document.querySelector('.lc-datepicker-check-out')
);

const rcMainSlider = new RcSlider(
	document.querySelector('.lc-carousel-homepage-slider')
);
const rcCarouselOurLocations = new RcSlider(
	document.querySelector('.lc-carousel-our-locations')
);
const rcNearTheSeaVillas = new RcSlider(
	document.querySelector('.lc-carousel-villas-near-the-sea-slider')
);
const rcMountainBasedVillas = new RcSlider(
	document.querySelector('.lc-carousel-mountain-based-villas-slider')
);
const rcRentalsSuitableForEvents = new RcSlider(
	document.querySelector('.lc-carousel-rentals-suitable-for-events')
);
const rcApartments = new RcSlider(
	document.querySelector('.lc-carousel-apartments')
);
const rcTestimonialsSlider = new RcSlider(
	document.querySelector('.lc-carousel-testimonials-slider')
);
const rcVillaKarterosSlider = new RcSlider(
	document.querySelector('.lc-carousel-villa-karteros')
);
const rcHouseInTheCountrySlider = new RcSlider(
	document.querySelector('.lc-carousel-the-house-in-the-country')
);
const rcHouseInTheCountrySliderGarden = new RcSlider(
	document.querySelector('.lc-carousel-the-house-in-the-country-garden-view-room')
);
const rcHouseInTheCountrySliderStream = new RcSlider(
	document.querySelector('.lc-carousel-the-house-in-the-country-stream-view-room')
);
const rcCarouselVillasApartmentsInGreeceBestDestinations = new RcSlider(
	document.querySelector('.lc-carousel-greece-best-destinations')
);
const rcCarouselVillasApartmentsInGreeceCreteBestDestinations = new RcSlider(
	document.querySelector('.lc-carousel-crete-best-destinations')
);
