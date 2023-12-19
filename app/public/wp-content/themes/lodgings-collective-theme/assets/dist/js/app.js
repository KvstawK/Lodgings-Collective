/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/scripts/app.js":
/*!***********************************!*\
  !*** ./assets/src/scripts/app.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_Main__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/Main */ "./assets/src/scripts/components/Main.js");
/* harmony import */ var _components_Navigation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/Navigation */ "./assets/src/scripts/components/Navigation.js");
/* harmony import */ var _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/RcSlider */ "./assets/src/scripts/components/RcSlider.js");
/* harmony import */ var _components_RcDatepicker__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/RcDatepicker */ "./assets/src/scripts/components/RcDatepicker.js");
/* harmony import */ var _components_RcSearch__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/RcSearch */ "./assets/src/scripts/components/RcSearch.js");
/* harmony import */ var _components_Faq__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/Faq */ "./assets/src/scripts/components/Faq.js");
/* harmony import */ var _components_EaReviews__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./components/EaReviews */ "./assets/src/scripts/components/EaReviews.js");
/* harmony import */ var _components_Animations__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./components/Animations */ "./assets/src/scripts/components/Animations.js");








new _components_Main__WEBPACK_IMPORTED_MODULE_0__["default"]();
new _components_Navigation__WEBPACK_IMPORTED_MODULE_1__["default"]();
new _components_Faq__WEBPACK_IMPORTED_MODULE_5__["default"]();
new _components_RcSearch__WEBPACK_IMPORTED_MODULE_4__["default"]();
new _components_EaReviews__WEBPACK_IMPORTED_MODULE_6__["default"]();
new _components_Animations__WEBPACK_IMPORTED_MODULE_7__["default"]();
var rcDatepickerCheckIn = new _components_RcDatepicker__WEBPACK_IMPORTED_MODULE_3__["default"](document.querySelector('.lc-datepicker-check-in'));
var rcDatepickerCheckOut = new _components_RcDatepicker__WEBPACK_IMPORTED_MODULE_3__["default"](document.querySelector('.lc-datepicker-check-out'));
var rcMainSlider = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-homepage-slider'));
var rcCarouselOurLocations = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-our-locations'));
var rcNearTheSeaVillas = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-villas-near-the-sea-slider'));
var rcMountainBasedVillas = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-mountain-based-villas-slider'));
var rcRentalsSuitableForEvents = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-rentals-suitable-for-events'));
var rcApartments = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-apartments'));
var rcTestimonialsSlider = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-testimonials-slider'));
var rcVillaKarterosSlider = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-villa-karteros'));
var rcHouseInTheCountrySlider = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-the-house-in-the-country'));
var rcHouseInTheCountrySliderGarden = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-the-house-in-the-country-garden-view-room'));
var rcHouseInTheCountrySliderStream = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-the-house-in-the-country-stream-view-room'));
var rcCarouselVillasApartmentsInGreeceBestDestinations = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-greece-best-destinations'));
var rcCarouselVillasApartmentsInGreeceCreteBestDestinations = new _components_RcSlider__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.lc-carousel-crete-best-destinations'));

/***/ }),

/***/ "./assets/src/scripts/components/Animations.js":
/*!*****************************************************!*\
  !*** ./assets/src/scripts/components/Animations.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var lodash_throttle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash/throttle */ "./node_modules/lodash/throttle.js");
/* harmony import */ var lodash_throttle__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash_throttle__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash_debounce__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash/debounce */ "./node_modules/lodash/debounce.js");
/* harmony import */ var lodash_debounce__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash_debounce__WEBPACK_IMPORTED_MODULE_1__);
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }


var Animations = /*#__PURE__*/function () {
  function Animations() {
    _classCallCheck(this, Animations);
    this.itemsToReveal = document.querySelectorAll('.scrolled');
    if (!this.itemsToReveal.length) return;
    this.browserHeight = window.innerHeight;
    this.scrollThrottle = lodash_throttle__WEBPACK_IMPORTED_MODULE_0___default()(this.calcCaller, 200).bind(this);
    this.hideInitially();
    this.events();
    this.restoreScrollPosition();
  }
  _createClass(Animations, [{
    key: "events",
    value: function events() {
      var _this = this;
      window.addEventListener('scroll', this.scrollThrottle);
      window.addEventListener('resize', lodash_debounce__WEBPACK_IMPORTED_MODULE_1___default()(function () {
        _this.browserHeight = window.innerHeight;
      }, 250));
    }
  }, {
    key: "calcCaller",
    value: function calcCaller() {
      var _this2 = this;
      this.itemsToReveal.forEach(function (el) {
        if (!el.isRevealed) _this2.calculateIfScrolledTo(el);
      });
    }
  }, {
    key: "calculateIfScrolledTo",
    value: function calculateIfScrolledTo(el) {
      var _el$getBoundingClient = el.getBoundingClientRect(),
        top = _el$getBoundingClient.top;
      if (window.scrollY + this.browserHeight > el.offsetTop) {
        var scrollPercent = top / this.browserHeight * 100;
        if (scrollPercent < 95) {
          el.classList.add('reveal-item--is-visible');
          el.isRevealed = true;
        }
      }
    }
  }, {
    key: "hideInitially",
    value: function hideInitially() {
      this.itemsToReveal.forEach(function (el) {
        el.classList.add('reveal-item');
        el.isRevealed = false;
      });
    }
  }, {
    key: "restoreScrollPosition",
    value: function restoreScrollPosition() {
      var currentPage = window.location.href;
      var savedPage = localStorage.getItem('currentPage');
      var currentScrollY = localStorage.getItem('currentScrollY');
      if (currentPage === savedPage && currentScrollY) {
        window.scrollTo(0, currentScrollY);
        localStorage.removeItem('currentScrollY');
      } else {
        window.scrollTo(0, 0);
      }
      localStorage.setItem('currentPage', currentPage);
    }
  }]);
  return Animations;
}();
window.addEventListener('beforeunload', function () {
  localStorage.setItem('currentScrollY', window.scrollY);
});
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Animations);

/***/ }),

/***/ "./assets/src/scripts/components/EaReviews.js":
/*!****************************************************!*\
  !*** ./assets/src/scripts/components/EaReviews.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var EaReviews = /*#__PURE__*/function () {
  function EaReviews() {
    _classCallCheck(this, EaReviews);
    this.stars = document.querySelectorAll('.star');
    this.events();
  }
  _createClass(EaReviews, [{
    key: "events",
    value: function events() {
      var _this = this;
      this.stars.forEach(function (star, i) {
        return star.addEventListener('click', function (star) {
          return _this.starSelection(star, i);
        });
      });
    }
  }, {
    key: "starSelection",
    value: function starSelection(star, i) {
      var current_star_level = i + 1;
      this.stars.forEach(function (star, j) {
        if (current_star_level >= j + 1) {
          star.innerHTML = '&#9733';
        } else {
          star.innerHTML = '&#9734';
        }
      });
    }
  }]);
  return EaReviews;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (EaReviews);

/***/ }),

/***/ "./assets/src/scripts/components/Faq.js":
/*!**********************************************!*\
  !*** ./assets/src/scripts/components/Faq.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Faq = /*#__PURE__*/function () {
  function Faq() {
    _classCallCheck(this, Faq);
    if (document.getElementsByClassName('faq').length !== 0) {
      this.faqItemsHeader = document.querySelectorAll('.faq-container-content-item-text-header');
      this.item = document.querySelector('.faq-container-content-item');
      this.setArrowImageAndBorder();
      this.events();
    }
  }
  _createClass(Faq, [{
    key: "events",
    value: function events() {
      var _this = this;
      this.faqItemsHeader.forEach(function (item) {
        return item.addEventListener('click', function (e) {
          return _this.toggleActive(e);
        });
      });
      // this.faqItemsHeader.forEach((item, i, arr) => {
      //     item.addEventListener('click', e => this.toggleActive(e))
      //     console.log(arr)
      // })
    }
  }, {
    key: "toggleActive",
    value: function toggleActive(e) {
      var expanded = e.currentTarget.parentElement.parentElement.getAttribute('aria-expanded');
      if (expanded !== 'true') {
        this.removeCurrentActiveItem();
        e.currentTarget.nextElementSibling.classList.add('active');
        e.currentTarget.parentElement.parentElement.setAttribute('aria-expanded', 'true');
        e.currentTarget.lastElementChild.style.transform = 'rotate(90deg)';
        e.currentTarget.style.borderBottom = '1px solid rgba(211, 211, 211, 0.4)';
      } else {
        e.currentTarget.nextElementSibling.classList.remove('active');
        e.currentTarget.parentElement.parentElement.setAttribute('aria-expanded', 'false');
        e.currentTarget.lastElementChild.style.transform = 'rotate(0)';
        e.currentTarget.style.borderBottom = '0';
      }
    }
  }, {
    key: "removeCurrentActiveItem",
    value: function removeCurrentActiveItem() {
      var activeItem = document.querySelectorAll('.faq-container-content-item-text-info.active');
      activeItem.forEach(function (a) {
        return a.classList.remove('active');
      });
      activeItem.forEach(function (e) {
        return e.parentNode.parentElement.setAttribute('aria-expanded', 'false');
      });
      activeItem.forEach(function (i) {
        return i.previousElementSibling.children[1].style.transform = 'rotate(0)';
      });
    }
  }, {
    key: "setArrowImageAndBorder",
    value: function setArrowImageAndBorder() {
      if (document.getElementsByClassName('faq-container-content-item').length !== 0) {
        if (this.item.getAttribute('aria-expanded') === 'true') {
          document.querySelector('.faq-container-content-item-text-header img').style.transform = 'rotate(90deg)';
        }
        if (this.item.getAttribute('aria-expanded') === 'true') {
          this.item.children[0].firstElementChild.style.borderBottom = '1px solid rgba(211, 211, 211, 0.4)';
        }
      }
    }
  }]);
  return Faq;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Faq);

/***/ }),

/***/ "./assets/src/scripts/components/Main.js":
/*!***********************************************!*\
  !*** ./assets/src/scripts/components/Main.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Main = /*#__PURE__*/function () {
  function Main() {
    _classCallCheck(this, Main);
    if (document.getElementsByClassName('read-more').length !== 0) {
      this.readMoreContent = document.querySelector('.read-more--space');
      this.readMoreContentLink = document.querySelector('.read-more--space a');
      this.mainContentShown = document.querySelector('.rentals__single-content-main-content');
      this.hiddenContent = document.querySelectorAll('.content--hidden');
      this.readMoreReview = document.querySelectorAll('.read-more-review-button');
      this.readMoreFacilitiesLink = document.querySelectorAll('.read-more--facilities a');
      this.hiddenFacilities = document.querySelectorAll('.lc-rentals__facilities-container :nth-child(n+7)');
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
  _createClass(Main, [{
    key: "events",
    value: function events() {
      var _this = this;
      this.readMoreContent.addEventListener('click', function () {
        return _this.showContent();
      });
      this.readMoreReview.forEach(function (r) {
        return r.addEventListener('click', function (r) {
          return _this.showReview(r);
        });
      });
      this.readMoreFacilitiesLink.forEach(function (f) {
        return f.addEventListener('click', function () {
          return _this.showFacilities();
        });
      });
    }
  }, {
    key: "setAria",
    value: function setAria() {
      this.readMoreContentLink.setAttribute('role', 'tabpanel');
      this.readMoreContentLink.setAttribute('aria-expanded', 'false');
      this.readMoreContentLink.setAttribute('aria-controls', 'content1');
      this.readMoreContentLink.appendChild(document.createElement('span'));
      this.readMoreContentLink.firstElementChild.classList.add('screen-reader-text');
      if (window.location.hostname === 'lodgingscollective.com') {
        this.readMoreContentLink.firstElementChild.insertAdjacentHTML('afterbegin', 'Description');
      } else {
        this.readMoreContentLink.firstElementChild.insertAdjacentHTML('afterbegin', 'Από την περιγραφή');
      }
      this.hiddenContent.forEach(function (c) {
        return c.setAttribute('id', 'content1');
      });
      this.hiddenContent.forEach(function (c) {
        return c.setAttribute('role', 'region');
      });
      this.hiddenContent.forEach(function (c) {
        return c.setAttribute('aria-labelledby', 'content1');
      });
      this.readMoreFacilitiesLink.forEach(function (fl) {
        return fl.setAttribute('role', 'tabpanel');
      });
      this.readMoreFacilitiesLink.forEach(function (fl) {
        return fl.setAttribute('aria-expanded', 'false');
      });
      this.readMoreFacilitiesLink.forEach(function (fl) {
        return fl.setAttribute('aria-controls', 'facilities-hidden');
      });
    }
  }, {
    key: "showContent",
    value: function showContent() {
      if (this.readMoreContentLink.getAttribute('aria-expanded') === 'false') {
        this.hiddenContent.forEach(function (c) {
          return c.classList.add('active');
        });
        this.readMoreContentLink.setAttribute('aria-expanded', 'true');
        if (window.location.hostname === 'lodgingscollective.com') {
          this.readMoreContentLink.innerHTML = 'Read Less<span class="screen-reader-text">Description</span>';
        } else {
          this.readMoreContentLink.innerHTML = 'Λιγότερα<span class="screen-reader-text">Από την περιγραφή</span>';
        }
      } else {
        this.hiddenContent.forEach(function (c) {
          return c.classList.remove('active');
        });
        this.readMoreContentLink.setAttribute('aria-expanded', 'false');
        if (window.location.hostname === 'lodgingscollective.com') {
          this.readMoreContentLink.innerHTML = 'Read More<span class="screen-reader-text">Description</span>';
        } else {
          this.readMoreContentLink.innerHTML = 'Περισσότερα<span class="screen-reader-text">Από την περιγραφή</span>';
        }
      }
    }
  }, {
    key: "showReview",
    value: function showReview(r) {
      if (this.hiddenContent.length !== 0 && r.currentTarget.getAttribute('aria-expanded') === 'false') {
        r.currentTarget.previousElementSibling.classList.add('active');
        r.currentTarget.parentElement.firstElementChild.style.display = 'none';
        r.currentTarget.parentElement.firstElementChild.setAttribute('aria-expanded', 'false');
        r.currentTarget.setAttribute('aria-expanded', 'true');
        if (window.location.hostname === 'lodgingscollective.com') {
          r.currentTarget.setAttribute('value', 'Read Less');
        } else {
          r.currentTarget.setAttribute('value', 'Λιγότερα');
        }
      } else {
        r.currentTarget.previousElementSibling.classList.remove('active');
        r.currentTarget.parentElement.firstElementChild.style.display = 'block';
        r.currentTarget.parentElement.firstElementChild.setAttribute('aria-expanded', 'true');
        r.currentTarget.setAttribute('aria-expanded', 'false');
        if (window.location.hostname === 'lodgingscollective.com') {
          r.currentTarget.setAttribute('value', 'Read More');
        } else {
          r.currentTarget.setAttribute('value', 'Περισσότερα');
        }
      }
    }
  }, {
    key: "wrapFacilities",
    value: function wrapFacilities() {
      if (document.getElementsByClassName('lc-rentals__facilities-container-item').length !== 0) {
        var wrapper = document.createElement('div');
        wrapper.classList.add('facilities-hidden');
        wrapper.setAttribute('id', 'facilities-hidden');
        wrapper.setAttribute('aria-labelledby', 'facilities-hidden');
        wrapper.setAttribute('role', 'region');
        this.facilitiesArray[0].parentNode.insertBefore(wrapper, this.facilitiesArray[0]);
        for (var i in this.facilitiesArray) {
          wrapper.appendChild(this.facilitiesArray[i]);
        }
      }
    }
  }, {
    key: "showFacilities",
    value: function showFacilities() {
      var hiddenFac = document.getElementById('facilities-hidden');
      if (document.querySelector('.read-more--facilities a').getAttribute('aria-expanded') === 'false') {
        hiddenFac.classList.add('active');
        this.readMoreFacilitiesLink.forEach(function (fl) {
          return fl.setAttribute('aria-expanded', 'true');
        });
        if (window.location.hostname === 'lodgingscollective.com') {
          this.readMoreFacilitiesLink.forEach(function (f) {
            return f.innerHTML = 'See Less Facilities';
          });
        } else {
          this.readMoreFacilitiesLink.forEach(function (f) {
            return f.innerHTML = 'Λιγότερα';
          });
        }
      } else {
        hiddenFac.classList.remove('active');
        this.readMoreFacilitiesLink.forEach(function (fl) {
          return fl.setAttribute('aria-expanded', 'false');
        });
        if (window.location.hostname === 'lodgingscollective.com') {
          this.readMoreFacilitiesLink.forEach(function (f) {
            return f.innerHTML = 'See All Facilities';
          });
        } else {
          this.readMoreFacilitiesLink.forEach(function (f) {
            return f.innerHTML = 'Περισσότερα';
          });
        }
      }
    }
  }, {
    key: "dontLazyloadSpecificImages",
    value: function dontLazyloadSpecificImages() {
      document.addEventListener('DOMContentLoaded', function () {
        // Code to remove loading attribute from specific images
        var imageElement = document.querySelector('img[src="https://lodgingscollective.com/wp-content/uploads/2023/02/main-slider-image1-685x1024.jpg"], img[src="//localhost:3000/wp-content/uploads/2023/02/main-slider-image1-685x1024.jpg"]');
        if (imageElement) {
          if (imageElement.src.includes('https://lodgingscollective.com')) {
            imageElement.removeAttribute('loading');
          } else if (imageElement.src.includes('localhost:3000/wp-content/uploads/2023/02/main-slider-image1-685x1024.jpg')) {
            imageElement.removeAttribute('loading');
          }
        }
      });
    }
  }, {
    key: "checkLinksInSinglePost",
    value: function checkLinksInSinglePost() {
      if (document.body.classList.contains('single-post')) {
        var links = document.querySelectorAll('.blog__single-content a');
        links.forEach(function (link) {
          link.setAttribute('target', '_blank');
          link.setAttribute('rel', 'noopener');
        });
      }
    }
  }, {
    key: "addSmoothScrollingToLinks",
    value: function addSmoothScrollingToLinks() {
      // Select all links that have a hash in their href attribute
      var links = document.querySelectorAll('a[href^="#"]');

      // For each link
      links.forEach(function (link) {
        // Listen for the click event
        link.addEventListener('click', function (event) {
          // Prevent the default action
          event.preventDefault();

          // Get the target element by its id
          var targetElement = document.getElementById(this.hash.slice(1));
          // If the target element exists
          if (targetElement) {
            // Get the top position of the target element
            var targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
            // Scroll the window to the target position minus 200px
            window.scrollTo({
              top: targetPosition - 150,
              behavior: 'smooth'
            });
          }
        });
      });
    }
  }, {
    key: "addGoToTopArrowInBlogPost",
    value: function addGoToTopArrowInBlogPost() {
      // Select the div with the class 'blog__single-content-arrow'
      var div = document.querySelector('.blog__single-content-arrow');
      // If the div exists
      if (div) {
        // Set the initial opacity of the div to 0
        div.style.opacity = '0';
        // Select the image inside the div
        var image = div.querySelector('img');
        // If the image exists
        if (image) {
          // Add the class to the image
          image.classList.add('blog__single-content-arrow');
        }

        // Listen for the scroll event
        window.addEventListener('scroll', function () {
          // Calculate the scroll position as a percentage of the viewport height
          var scrollPosition = window.scrollY / window.innerHeight;

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
  }]);
  return Main;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Main);

/***/ }),

/***/ "./assets/src/scripts/components/Navigation.js":
/*!*****************************************************!*\
  !*** ./assets/src/scripts/components/Navigation.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Navigation = /*#__PURE__*/function () {
  function Navigation() {
    var _this = this;
    _classCallCheck(this, Navigation);
    this.nav = document.getElementById('primary-nav');
    this.navToggle = document.querySelector('.header__container-menu');
    this.currentlyOpenedMenuItem = null;
    this.menuChildrenLinks = document.querySelectorAll('.menu-item-has-children > a').forEach(function (element) {
      if ('ontouchstart' in window) {
        element.addEventListener('touchstart', function (e) {
          e.preventDefault();
          _this.openLinksWithTouch(e);
        }, {
          passive: false
        });
      } else {
        element.addEventListener('click', function (e) {
          return _this.openLinksWithTouch(e);
        }, {
          passive: true
        });
      }
    });

    // Add click event handler for sub-menu items
    this.subMenuItems = document.querySelectorAll('.sub-menu > li > a').forEach(function (element) {
      element.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    });
    this.events();
  }
  _createClass(Navigation, [{
    key: "events",
    value: function events() {
      var _this2 = this;
      this.navToggle.addEventListener('click', function () {
        return _this2.toggleNav();
      });
      document.body.addEventListener('click', function (e) {
        return _this2.closeMenuIfClickedOutside(e);
      });

      // code to see in the console which element i click
      // document.body.addEventListener('click', function(e) {
      // 	console.log(e.target);
      // });
    }
  }, {
    key: "toggleNav",
    value: function toggleNav() {
      var visible = this.nav.getAttribute('data-visible');
      if (visible === 'false') {
        this.nav.setAttribute('data-visible', true);
        this.navToggle.setAttribute('aria-expanded', true);
      } else {
        this.nav.setAttribute('data-visible', false);
        this.navToggle.setAttribute('aria-expanded', false);
      }
    }
  }, {
    key: "openLinksWithTouch",
    value: function openLinksWithTouch(e) {
      e.stopPropagation();
      var menu_list = e.currentTarget.parentNode;
      var menu_button = e.currentTarget.childNodes[1];
      var button_span_open = menu_button.childNodes[0];
      var button_span_closed = menu_button.childNodes[1];
      var menuItems = document.querySelectorAll('.menu-item-has-children');

      // Close all other menu items
      menuItems.forEach(function (menuItem) {
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
  }, {
    key: "closeMenuIfClickedOutside",
    value: function closeMenuIfClickedOutside(e) {
      if (!e.target.closest('.menu-item-has-children')) {
        var menuItems = document.querySelectorAll('.menu-item-has-children');
        menuItems.forEach(function (menuItem) {
          if (menuItem.classList.contains('open')) {
            menuItem.classList.remove('open');
            menuItem.children[0].setAttribute('aria-expanded', 'false');
          }
        });
        this.currentlyOpenedMenuItem = null;
      }
    }
  }]);
  return Navigation;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Navigation);

/***/ }),

/***/ "./assets/src/scripts/components/RcDatepicker.js":
/*!*******************************************************!*\
  !*** ./assets/src/scripts/components/RcDatepicker.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var RcDatepicker = /*#__PURE__*/function () {
  function RcDatepicker(id) {
    _classCallCheck(this, RcDatepicker);
    this.datepickerId = id;
    if (this.datepickerId === null) {
      return;
    }
    this.monthLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    this.comboboxNode = this.datepickerId.querySelector('input[type="text"]');
    this.dialogNode = this.datepickerId.querySelector('[role="dialog"]');
    this.monthYearNode = this.dialogNode.querySelector('.month-year');
    this.prevMonthNode = this.dialogNode.querySelector('.prev-month');
    this.nextMonthNode = this.dialogNode.querySelector('.next-month');
    this.tbodyNode = this.dialogNode.querySelector('table.lc-datepicker-table-dates tbody');
    this.lastRowNode = null;
    this.days = [];
    this.focusDay = new Date();
    this.selectedDay = new Date(0, 0, 1);
    this.createGridOfDays();
    this.events();
  }
  _createClass(RcDatepicker, [{
    key: "events",
    value: function events() {
      var _this = this;
      this.comboboxNode.addEventListener('click', function () {
        return _this.onComboboxClick();
      });
      this.comboboxNode.addEventListener('keydown', function () {
        return _this.onComboboxKeyDown();
      });
      this.prevMonthNode.addEventListener('click', function () {
        return _this.onPreviousMonthButton();
      });
      this.prevMonthNode.addEventListener('keydown', function () {
        return _this.onPreviousMonthButton();
      });
      this.nextMonthNode.addEventListener('click', function () {
        return _this.onNextMonthButton();
      });
      this.nextMonthNode.addEventListener('keydown', function () {
        return _this.onNextMonthButton();
      });
      document.body.addEventListener('click', function (e) {
        return _this.clickOnBackground(e);
      });
    }
  }, {
    key: "createGridOfDays",
    value: function createGridOfDays() {
      this.tbodyNode.innerHTML = '';
      for (var i = 0; i < 6; i++) {
        var row = this.tbodyNode.insertRow(i);
        this.lastRowNode = row;
        for (var j = 0; j < 7; j++) {
          var cell = document.createElement('td');
          cell.addEventListener('click', this.onDayClick.bind(this));
          cell.addEventListener('keydown', this.onDayKeyDown.bind(this));
          row.appendChild(cell);
          this.days.push(cell);
        }
      }
      this.updateGrid();
      this.close(false);
    }
  }, {
    key: "isSameDay",
    value: function isSameDay(day1, day2) {
      return day1.getFullYear() == day2.getFullYear() && day1.getMonth() == day2.getMonth() && day1.getDate() == day2.getDate();
    }
  }, {
    key: "isNotSameMonth",
    value: function isNotSameMonth(day1, day2) {
      return day1.getFullYear() != day2.getFullYear() || day1.getMonth() != day2.getMonth();
    }
  }, {
    key: "updateGrid",
    value: function updateGrid() {
      var i, flag;
      var fd = this.focusDay;
      this.monthYearNode.textContent = this.monthLabels[fd.getMonth()] + ' ' + [fd.getFullYear()];
      var firstDayOfMonth = new Date(fd.getFullYear(), fd.getMonth(), 1);
      var dayOfWeek = firstDayOfMonth.getDay();
      firstDayOfMonth.setDate(firstDayOfMonth.getDate() - dayOfWeek);
      var d = new Date(firstDayOfMonth);
      for (i = 0; i < this.days.length; i++) {
        flag = d.getMonth() != fd.getMonth();
        this.updateDate(this.days[i], flag, d, this.isSameDay(d, this.selectedDay));
        d.setDate(d.getDate() + 1);

        // Hide last row if all disabled dates
        if (i === 35) {
          if (flag) {
            this.lastRowNode.style.visibility = 'hidden';
            this.tbodyNode.style.height = 260 + 'px';
          } else {
            this.lastRowNode.style.visibility = 'visible';
            this.tbodyNode.style.height = 215 + 'px';
          }
        }
      }
    }
  }, {
    key: "setFocusDay",
    value: function setFocusDay(flag) {
      if (typeof flag !== 'boolean') {
        flag = true;
      }
      var fd = this.focusDay;
      var getDayFromDataDateAttribute = this.getDayFromDataDateAttribute;
      function checkDay(domNode) {
        var d = getDayFromDataDateAttribute(domNode);
        if (this.isSameDay(d, fd)) {
          if (flag) {
            domNode.focus();
          }
        }
      }
      this.days.forEach(checkDay.bind(this));
    }
  }, {
    key: "open",
    value: function open() {
      this.dialogNode.style.display = 'block';
      this.dialogNode.style.zIndex = 2;
      this.comboboxNode.setAttribute('aria-expanded', 'true');
      this.getDateFromCombobox();
      this.updateGrid();
    }
  }, {
    key: "isOpen",
    value: function isOpen() {
      return window.getComputedStyle(this.dialogNode).display !== 'none';
    }
  }, {
    key: "close",
    value: function close(flag) {
      if (typeof flag !== 'boolean') {
        // Default is to move focus to combobox
        flag = true;
      }
      this.dialogNode.style.display = 'none';
      this.comboboxNode.setAttribute('aria-expanded', 'false');
      if (flag) {
        this.comboboxNode.focus();
      }
    }
  }, {
    key: "onNextMonthButton",
    value: function onNextMonthButton() {
      var flag = false;
      switch (event.type) {
        case 'keydown':
          switch (event.key) {
            case 'Esc':
            case 'Escape':
              this.close();
              flag = true;
              break;
            case 'Enter':
              this.moveToNextMonth();
              this.setFocusDay(false);
              flag = true;
              break;
          }
          break;
        case 'click':
          this.moveToNextMonth();
          this.setFocusDay(false);
          break;
        default:
          break;
      }
      if (flag) {
        event.stopPropagation();
        event.preventDefault();
      }
    }
  }, {
    key: "onPreviousMonthButton",
    value: function onPreviousMonthButton() {
      var flag = false;
      switch (event.type) {
        case 'keydown':
          switch (event.key) {
            case 'Esc':
            case 'Escape':
              this.close();
              flag = true;
              break;
            case 'Enter':
              this.moveToPreviousMonth();
              this.setFocusDay(false);
              flag = true;
              break;
          }
          break;
        case 'click':
          this.moveToPreviousMonth();
          this.setFocusDay(false);
          flag = true;
          break;
        default:
          break;
      }
      if (flag) {
        event.stopPropagation();
        event.preventDefault();
      }
    }
  }, {
    key: "moveFocusToDay",
    value: function moveFocusToDay(day) {
      var d = this.focusDay;
      this.focusDay = day;
      if (d.getMonth() != this.focusDay.getMonth()) {
        this.updateGrid();
      }
      this.setFocusDay();
    }
  }, {
    key: "moveToNextMonth",
    value: function moveToNextMonth() {
      this.focusDay.setMonth(this.focusDay.getMonth() + 1);
      this.updateGrid();
    }
  }, {
    key: "moveToPreviousMonth",
    value: function moveToPreviousMonth() {
      this.focusDay.setMonth(this.focusDay.getMonth() - 1);
      this.updateGrid();
    }
  }, {
    key: "moveFocusToNextDay",
    value: function moveFocusToNextDay() {
      var d = new Date(this.focusDay);
      d.setDate(d.getDate() + 1);
      this.moveFocusToDay(d);
    }
  }, {
    key: "moveFocusToNextWeek",
    value: function moveFocusToNextWeek() {
      var d = new Date(this.focusDay);
      d.setDate(d.getDate() + 7);
      this.moveFocusToDay(d);
    }
  }, {
    key: "moveFocusToPreviousDay",
    value: function moveFocusToPreviousDay() {
      var d = new Date(this.focusDay);
      d.setDate(d.getDate() - 1);
      this.moveFocusToDay(d);
    }
  }, {
    key: "moveFocusToPreviousWeek",
    value: function moveFocusToPreviousWeek() {
      var d = new Date(this.focusDay);
      d.setDate(d.getDate() - 7);
      this.moveFocusToDay(d);
    }
  }, {
    key: "moveFocusToFirstDayOfWeek",
    value: function moveFocusToFirstDayOfWeek() {
      var d = new Date(this.focusDay);
      d.setDate(d.getDate() - d.getDay());
      this.moveFocusToDay(d);
    }
  }, {
    key: "moveFocusToLastDayOfWeek",
    value: function moveFocusToLastDayOfWeek() {
      var d = new Date(this.focusDay);
      d.setDate(d.getDate() + (6 - d.getDay()));
      this.moveFocusToDay(d);
    }
  }, {
    key: "isDayDisabled",
    value: function isDayDisabled(domNode) {
      return domNode.classList.contains('disabled');
    }
  }, {
    key: "getDayFromDataDateAttribute",
    value: function getDayFromDataDateAttribute(domNode) {
      var parts = domNode.getAttribute('data-date').split('-');
      return new Date(parts[0], parseInt(parts[1]) - 1, parts[2]);
    }
  }, {
    key: "updateDate",
    value: function updateDate(domNode, disable, day, selected) {
      var d = day.getDate().toString();
      if (day.getDate() <= 9) {
        d = '0' + d;
      }
      var m = day.getMonth() + 1;
      if (day.getMonth() < 9) {
        m = '0' + m;
      }
      domNode.setAttribute('tabindex', '0');
      domNode.removeAttribute('aria-selected');
      domNode.setAttribute('data-date', day.getFullYear() + '-' + m + '-' + d);
      if (disable) {
        domNode.classList.add('disabled');
        domNode.setAttribute('tabindex', '-1');
        domNode.textContent = '';
      } else {
        domNode.classList.remove('disabled');
        domNode.textContent = day.getDate();
        if (selected) {
          domNode.setAttribute('aria-selected', 'true');
          domNode.classList.add('active');
          // domNode.setAttribute('tabindex', '0');
        } else {
          domNode.classList.remove('active');
        }
      }
    }
  }, {
    key: "updateSelected",
    value: function updateSelected(domNode) {
      for (var i = 0; i < this.days.length; i++) {
        var day = this.days[i];
        if (day === domNode) {
          // day.classList.add('active')
          day.setAttribute('aria-selected', 'true');
        } else {
          // day.classList.remove('active')
          day.removeAttribute('aria-selected');
        }
      }
    }
  }, {
    key: "onDayKeyDown",
    value: function onDayKeyDown(event) {
      var flag = false;
      switch (event.key) {
        case 'Esc':
        case 'Escape':
          this.close();
          break;
        case ' ':
          this.updateSelected(event.currentTarget);
          this.setComboboxDate(event.currentTarget);
          flag = true;
          break;
        case 'Enter':
          this.setComboboxDate(event.currentTarget);
          this.close();
          break;
        case 'Right':
        case 'ArrowRight':
          this.moveFocusToNextDay();
          flag = true;
          break;
        case 'Left':
        case 'ArrowLeft':
          this.moveFocusToPreviousDay();
          flag = true;
          break;
        case 'Down':
        case 'ArrowDown':
          this.moveFocusToNextWeek();
          flag = true;
          break;
        case 'Up':
        case 'ArrowUp':
          this.moveFocusToPreviousWeek();
          flag = true;
          break;
        case 'Home':
          this.moveFocusToFirstDayOfWeek();
          flag = true;
          break;
        case 'End':
          this.moveFocusToLastDayOfWeek();
          flag = true;
          break;
      }
      if (flag) {
        event.stopPropagation();
        event.preventDefault();
      }
    }
  }, {
    key: "onDayClick",
    value: function onDayClick(event) {
      if (!this.isDayDisabled(event.currentTarget)) {
        this.setComboboxDate(event.currentTarget);
        this.close();
      }
      event.stopPropagation();
      event.preventDefault();
    }
  }, {
    key: "onDayFocus",
    value: function onDayFocus() {
      this.setMessage(this.messageCursorKeys);
    }
  }, {
    key: "setComboboxDate",
    value: function setComboboxDate(domNode) {
      var d = this.focusDay;
      if (domNode) {
        d = this.getDayFromDataDateAttribute(domNode);
      }
      this.comboboxNode.value = d.getMonth() + 1 + '/' + d.getDate() + '/' + d.getFullYear();
    }
  }, {
    key: "getDateFromCombobox",
    value: function getDateFromCombobox() {
      var parts = this.comboboxNode.value.split('/');
      if (parts.length === 3 && Number.isInteger(parseInt(parts[0])) && Number.isInteger(parseInt(parts[1])) && Number.isInteger(parseInt(parts[2]))) {
        this.focusDay = new Date(parseInt(parts[2]), parseInt(parts[0]) - 1, parseInt(parts[1]));
        this.selectedDay = new Date(this.focusDay);
      } else {
        // If not a valid date (MM/DD/YY) initialize with todays date
        this.focusDay = new Date();
        this.selectedDay = new Date(0, 0, 1);
      }
    }
  }, {
    key: "onComboboxKeyDown",
    value: function onComboboxKeyDown() {
      var flag = false;
      switch (event.key) {
        case 'Enter':
          // case 'ArrowDown':
          this.open();
          this.setFocusDay();
          flag = true;
          break;

        // case 'Esc':
        case 'Escape':
          if (this.isOpen()) {
            this.close(false);
          } else {
            this.comboboxNode.value = '';
          }
          this.option = null;
          flag = true;
          break;
        default:
          break;
      }
      if (flag) {
        event.stopPropagation();
        event.preventDefault();
      }
    }
  }, {
    key: "onComboboxClick",
    value: function onComboboxClick() {
      if (this.isOpen()) {
        this.close(false);
      } else {
        this.open();
      }
      event.stopPropagation();
      event.preventDefault();
    }
  }, {
    key: "clickOnBackground",
    value: function clickOnBackground(e) {
      if (!this.comboboxNode.contains(e.target) && !this.dialogNode.contains(e.target)) {
        if (this.isOpen()) {
          this.close(false);
          e.stopPropagation();
          e.preventDefault();
        }
      }
    }
  }]);
  return RcDatepicker;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (RcDatepicker);

/***/ }),

/***/ "./assets/src/scripts/components/RcSearch.js":
/*!***************************************************!*\
  !*** ./assets/src/scripts/components/RcSearch.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var RcSearch = /*#__PURE__*/function () {
  function RcSearch() {
    _classCallCheck(this, RcSearch);
    this.events();
  }
  _createClass(RcSearch, [{
    key: "events",
    value: function events() {}
  }]);
  return RcSearch;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (RcSearch);

/***/ }),

/***/ "./assets/src/scripts/components/RcSlider.js":
/*!***************************************************!*\
  !*** ./assets/src/scripts/components/RcSlider.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });


function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var RcSlider = /*#__PURE__*/function () {
  function RcSlider(id) {
    _classCallCheck(this, RcSlider);
    this.sliderId = id;
    if (this.sliderId === null) {
      return;
    }
    if (document.getElementsByClassName('lc-carousel').length !== 0) {
      this.carousel = this.sliderId.querySelector('.lc-carousel__container-sliders');
      this.slides = _toConsumableArray(this.carousel.children);
      if (document.getElementsByClassName('dots-slider').length !== 0) {
        this.dotsSlider = this.sliderId.querySelector('.dots-slider');
        this.dotsSliderChildren = _toConsumableArray(this.dotsSlider.children);
      }
      if (document.getElementsByClassName('dots-slider-btn').length !== 0) {
        this.nextButtonDots = this.sliderId.querySelector('.dots-slider-btn-right');
        this.prevButtonDots = this.sliderId.querySelector('.dots-slider-btn-left');
      }
      if (document.getElementsByClassName('lc-carousel__btn').length !== 0) {
        this.nextButton = this.sliderId.querySelector('.lc-carousel__btn-right');
        this.prevButton = this.sliderId.querySelector('.lc-carousel__btn-left');
      }
      this.dotsSLiderButtons = this.sliderId.querySelectorAll('.dots-slider-btn');
      if (document.getElementsByClassName('lc-carousel__nav-dots').length !== 0) {
        this.nav = this.sliderId.querySelector('.lc-carousel__nav');
        this.dots = _toConsumableArray(this.nav.children);
      }
      if (document.getElementsByClassName('lc-carousel-gallery').length !== 0) {
        // this.gallerySection = document.querySelector('.lc-carousel-gallery');
        this.galleryEnabled = document.querySelector('.lc-carousel__container-sliders');
        this.galleryEnabledSlides = _toConsumableArray(this.galleryEnabled.children);
      }
      if (document.getElementsByClassName('lc-lightbox').length !== 0) {
        this.lightboxSection = document.querySelector('.lc-lightbox');
        this.lightboxEnabled = document.querySelector('.lc-carousel__container-sliders');
        this.lightboxEnabledSlides = _toConsumableArray(this.lightboxEnabled.children);
        this.singleRentalsPage = document.querySelector('.single-lc-rentals');
      }
      this.slidesPosition();
      this.events();
    }
  }
  _createClass(RcSlider, [{
    key: "events",
    value: function events() {
      var _this = this;
      // document.addEventListener("click", function(event) {
      //     console.log(event.target);
      // });

      if (document.getElementsByClassName('lc-carousel__btn').length !== 0) {
        this.nextButton.addEventListener('click', function () {
          return _this.nextSlide();
        });
        this.prevButton.addEventListener('click', function () {
          return _this.prevSlide();
        });
      }
      if (document.getElementsByClassName('dots-slider-btn').length !== 0) {
        this.nextButtonDots.addEventListener('click', function () {
          return _this.nextSlideDotHover();
        });
        this.prevButtonDots.addEventListener('click', function () {
          return _this.prevSlideDotHover();
        });
        this.nextButtonDots.addEventListener('mouseover', function () {
          return _this.nextSlideDotHover();
        });
        this.nextButtonDots.addEventListener('mouseout', function () {
          return _this.nextSlideDotExit();
        });
        this.prevButtonDots.addEventListener('mouseover', function () {
          return _this.prevSlideDotHover();
        });
        this.prevButtonDots.addEventListener('mouseout', function () {
          return _this.prevSlideDotExit();
        });
      }
      if (document.getElementsByClassName('lc-carousel__nav-dots').length !== 0) {
        this.nav.addEventListener('click', function () {
          return _this.nextSlideDotExit();
        });
        this.nav.addEventListener('click', function (e) {
          return _this.clickedDot(e);
        });
        this.nav.addEventListener('keydown', function (e) {
          return _this.clickedDotPressedEnter(e);
        });
      }
      if (document.getElementsByClassName('lc-lightbox').length !== 0) {
        this.lightboxEnabled.addEventListener('click', function () {
          return _this.enableLightbox();
        });
      }
    }
  }, {
    key: "slidesPosition",
    value: function slidesPosition() {
      var _this2 = this;
      var slideWidth = this.slides[0].getBoundingClientRect().width;
      this.slides[0].classList.add('active');
      // this.slides[0].setAttribute('aria-selected', true);
      this.slides.forEach(function (slide) {
        return slide.setAttribute('id', "".concat(_this2.carousel.getAttribute('id'), "-").concat(_this2.slides.indexOf(slide) + 1));
      });
      this.slides.forEach(function (slide) {
        return slide.setAttribute('aria-label', "".concat(_this2.slides.indexOf(slide) + 1, " of ").concat(_this2.slides.length));
      });
      if (document.getElementsByClassName('lc-carousel__nav-dots').length !== 0) {
        this.dots[0].classList.add('active');
        this.dots[0].setAttribute('aria-selected', true);
        this.dots.forEach(function (dot) {
          return dot.setAttribute('aria-controls', "".concat(_this2.carousel.getAttribute('id'), "-").concat(_this2.dots.indexOf(dot) + 1));
        });
        this.dots.forEach(function (dot) {
          return dot.setAttribute('aria-label', "Slide ".concat(_this2.dots.indexOf(dot) + 1));
        });
      }
      for (var index = 0; index < this.slides.length; index++) {
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
      if (document.getElementsByClassName('dots-slider-children').length !== 0) {
        var dotsSlideWidth = this.dotsSliderChildren[0].getBoundingClientRect().width;
        for (var _index = 0; _index < this.dotsSliderChildren.length; _index++) {
          this.dotsSliderChildren[_index].style.left = dotsSlideWidth * _index + 'px';
        }
      }
    }
  }, {
    key: "nextSlide",
    value: function nextSlide() {
      var currentSlide = this.carousel.querySelector('.active');
      var next = currentSlide.nextElementSibling;
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
  }, {
    key: "nextSlideDotHover",
    value: function nextSlideDotHover() {
      var fullWidth = this.dotsSlider.clientWidth - this.carousel.clientWidth;
      if (this.dotsSlider.offsetLeft === -Math.abs(fullWidth)) {
        this.nextButtonDots.classList.add('low-opacity');
      } else {
        this.prevButtonDots.classList.remove('low-opacity');
        if (document.getElementsByClassName('lc-lightbox').length !== 0) {
          var padding = window.getComputedStyle(this.sliderId, null).getPropertyValue('padding-left');
          var paddingWithoutPx = parseInt(padding, 10);
          var fullWidthWithoutPadding = fullWidth - paddingWithoutPx;
          this.dotsSlider.style.left = "-".concat(fullWidthWithoutPadding) + 'px';
        } else {
          this.dotsSlider.style.left = "-".concat(fullWidth) + 'px';
        }
      }
    }
  }, {
    key: "nextSlideDotExit",
    value: function nextSlideDotExit() {
      if (document.getElementsByClassName('dots-slider').length !== 0) {
        var currentDotsSliderWidth = this.dotsSlider.offsetLeft;
        this.dotsSlider.style.left = "".concat(currentDotsSliderWidth) + 'px';
      }
    }
  }, {
    key: "prevSlideDotHover",
    value: function prevSlideDotHover() {
      if (this.dotsSlider.offsetLeft === 0) {
        this.prevButtonDots.classList.add('low-opacity');
      } else {
        this.nextButtonDots.classList.remove('low-opacity');
        this.dotsSlider.style.left = '0px';
      }
    }
  }, {
    key: "prevSlideDotExit",
    value: function prevSlideDotExit() {
      var currentDotsSliderWidth = this.dotsSlider.offsetLeft;
      this.dotsSlider.style.left = "".concat(currentDotsSliderWidth) + 'px';
    }
  }, {
    key: "prevSlide",
    value: function prevSlide() {
      var currentSlide = this.carousel.querySelector('.active');
      var prev = currentSlide.previousElementSibling;
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
  }, {
    key: "moveSlider",
    value: function moveSlider(currentSlide, targetSlide) {
      if (targetSlide != null) {
        var position = targetSlide.style.left;
        this.carousel.style.transform = "translateX(-".concat(position, ")");
        this.toggleActive(currentSlide, targetSlide);
        this.toggleActiveAria(currentSlide, targetSlide);
      }
    }
  }, {
    key: "toggleActive",
    value: function toggleActive(current, slide) {
      if (slide != null) {
        current.classList.remove('active');
        current.setAttribute('aria-selected', 'false');
        slide.classList.add('active');
        slide.setAttribute('aria-selected', 'true');
      }
    }
  }, {
    key: "toggleActiveAria",
    value: function toggleActiveAria(currentSlide, targetSlide) {
      if (document.getElementsByClassName('lc-carousel__nav-dots').length !== 0) {
        if (this.sliderId.getElementsByClassName('lc-carousel__container-sliders-slide-content').length !== 0) {
          var currentSlideContent = currentSlide.lastElementChild;
          var currentSlideContentDescription = currentSlide.querySelector('.lc-carousel__container-sliders-slide-content-description');
          // const currentSlideContentButtonLink = currentSlide.querySelector('button a')
          var targetSlideContent = targetSlide.lastElementChild;
          var targetSlideContentDescription = targetSlide.querySelector('.lc-carousel__container-sliders-slide-content-description');
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
  }, {
    key: "hideButton",
    value: function hideButton(targetSlide) {
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
  }, {
    key: "clickedDot",
    value: function clickedDot(e) {
      if (e.target === this.nav) {
        return;
      }
      var targetDot = e.target;
      var currentDot = this.nav.querySelector('.active');
      var currentSlide = this.carousel.querySelector('.active');
      var targetDotIndex = this.findIndex(targetDot, this.dots);
      var targetSlide = this.slides[targetDotIndex];
      this.moveSlider(currentSlide, targetSlide);
      this.toggleActive(currentDot, targetDot);
      this.hideButton(targetSlide);
    }
  }, {
    key: "clickedDotPressedEnter",
    value: function clickedDotPressedEnter(e) {
      if (13 === e.keyCode) {
        this.clickedDot(e);
      }
    }
  }, {
    key: "findIndex",
    value: function findIndex(item, items) {
      for (var index = 0; index < items.length; index++) {
        if (item === items[index]) {
          return index;
        }
      }
    }
  }, {
    key: "moveToDot",
    value: function moveToDot(targetSlide) {
      if (document.getElementsByClassName('lc-carousel__nav-dots').length !== 0) {
        var slideIndex = this.findIndex(targetSlide, this.slides);
        var currentDot = this.nav.querySelector('.active');
        var targetDot = this.dots[slideIndex];
        this.toggleActive(currentDot, targetDot);
      }
    }
  }, {
    key: "enableLightbox",
    value: function enableLightbox() {
      var lightboxSectionActive = document.getElementsByClassName('lc-carousel lc-lightbox active');
      this.lightboxSection.classList.toggle('active');
      if (document.getElementsByClassName('lc-carousel lc-lightbox active').length !== 0) {
        var wrapper = document.createElement('div');
        wrapper.classList.add('white-background');
        wrapper.setAttribute('id', 'white-background');
        this.lightboxSection.parentNode.insertBefore(wrapper, this.lightboxSection);
        for (var i in this.lightboxSection) {
          wrapper.appendChild(this.lightboxSection);
        }
      } else {
        var node = document.getElementById('white-background');
        node.replaceWith.apply(node, _toConsumableArray(node.childNodes));
      }
    }
  }]);
  return RcSlider;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (RcSlider);

/***/ }),

/***/ "./node_modules/lodash/_Symbol.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_Symbol.js ***!
  \****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Symbol = root.Symbol;

module.exports = Symbol;


/***/ }),

/***/ "./node_modules/lodash/_baseGetTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseGetTag.js ***!
  \********************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    getRawTag = __webpack_require__(/*! ./_getRawTag */ "./node_modules/lodash/_getRawTag.js"),
    objectToString = __webpack_require__(/*! ./_objectToString */ "./node_modules/lodash/_objectToString.js");

/** `Object#toString` result references. */
var nullTag = '[object Null]',
    undefinedTag = '[object Undefined]';

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * The base implementation of `getTag` without fallbacks for buggy environments.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
function baseGetTag(value) {
  if (value == null) {
    return value === undefined ? undefinedTag : nullTag;
  }
  return (symToStringTag && symToStringTag in Object(value))
    ? getRawTag(value)
    : objectToString(value);
}

module.exports = baseGetTag;


/***/ }),

/***/ "./node_modules/lodash/_baseTrim.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseTrim.js ***!
  \******************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var trimmedEndIndex = __webpack_require__(/*! ./_trimmedEndIndex */ "./node_modules/lodash/_trimmedEndIndex.js");

/** Used to match leading whitespace. */
var reTrimStart = /^\s+/;

/**
 * The base implementation of `_.trim`.
 *
 * @private
 * @param {string} string The string to trim.
 * @returns {string} Returns the trimmed string.
 */
function baseTrim(string) {
  return string
    ? string.slice(0, trimmedEndIndex(string) + 1).replace(reTrimStart, '')
    : string;
}

module.exports = baseTrim;


/***/ }),

/***/ "./node_modules/lodash/_freeGlobal.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_freeGlobal.js ***!
  \********************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof __webpack_require__.g == 'object' && __webpack_require__.g && __webpack_require__.g.Object === Object && __webpack_require__.g;

module.exports = freeGlobal;


/***/ }),

/***/ "./node_modules/lodash/_getRawTag.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getRawTag.js ***!
  \*******************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * A specialized version of `baseGetTag` which ignores `Symbol.toStringTag` values.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the raw `toStringTag`.
 */
function getRawTag(value) {
  var isOwn = hasOwnProperty.call(value, symToStringTag),
      tag = value[symToStringTag];

  try {
    value[symToStringTag] = undefined;
    var unmasked = true;
  } catch (e) {}

  var result = nativeObjectToString.call(value);
  if (unmasked) {
    if (isOwn) {
      value[symToStringTag] = tag;
    } else {
      delete value[symToStringTag];
    }
  }
  return result;
}

module.exports = getRawTag;


/***/ }),

/***/ "./node_modules/lodash/_objectToString.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_objectToString.js ***!
  \************************************************/
/***/ ((module) => {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/**
 * Converts `value` to a string using `Object.prototype.toString`.
 *
 * @private
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 */
function objectToString(value) {
  return nativeObjectToString.call(value);
}

module.exports = objectToString;


/***/ }),

/***/ "./node_modules/lodash/_root.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_root.js ***!
  \**************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `self`. */
var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

/** Used as a reference to the global object. */
var root = freeGlobal || freeSelf || Function('return this')();

module.exports = root;


/***/ }),

/***/ "./node_modules/lodash/_trimmedEndIndex.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_trimmedEndIndex.js ***!
  \*************************************************/
/***/ ((module) => {

/** Used to match a single whitespace character. */
var reWhitespace = /\s/;

/**
 * Used by `_.trim` and `_.trimEnd` to get the index of the last non-whitespace
 * character of `string`.
 *
 * @private
 * @param {string} string The string to inspect.
 * @returns {number} Returns the index of the last non-whitespace character.
 */
function trimmedEndIndex(string) {
  var index = string.length;

  while (index-- && reWhitespace.test(string.charAt(index))) {}
  return index;
}

module.exports = trimmedEndIndex;


/***/ }),

/***/ "./node_modules/lodash/debounce.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/debounce.js ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    now = __webpack_require__(/*! ./now */ "./node_modules/lodash/now.js"),
    toNumber = __webpack_require__(/*! ./toNumber */ "./node_modules/lodash/toNumber.js");

/** Error message constants. */
var FUNC_ERROR_TEXT = 'Expected a function';

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeMax = Math.max,
    nativeMin = Math.min;

/**
 * Creates a debounced function that delays invoking `func` until after `wait`
 * milliseconds have elapsed since the last time the debounced function was
 * invoked. The debounced function comes with a `cancel` method to cancel
 * delayed `func` invocations and a `flush` method to immediately invoke them.
 * Provide `options` to indicate whether `func` should be invoked on the
 * leading and/or trailing edge of the `wait` timeout. The `func` is invoked
 * with the last arguments provided to the debounced function. Subsequent
 * calls to the debounced function return the result of the last `func`
 * invocation.
 *
 * **Note:** If `leading` and `trailing` options are `true`, `func` is
 * invoked on the trailing edge of the timeout only if the debounced function
 * is invoked more than once during the `wait` timeout.
 *
 * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
 * until to the next tick, similar to `setTimeout` with a timeout of `0`.
 *
 * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
 * for details over the differences between `_.debounce` and `_.throttle`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to debounce.
 * @param {number} [wait=0] The number of milliseconds to delay.
 * @param {Object} [options={}] The options object.
 * @param {boolean} [options.leading=false]
 *  Specify invoking on the leading edge of the timeout.
 * @param {number} [options.maxWait]
 *  The maximum time `func` is allowed to be delayed before it's invoked.
 * @param {boolean} [options.trailing=true]
 *  Specify invoking on the trailing edge of the timeout.
 * @returns {Function} Returns the new debounced function.
 * @example
 *
 * // Avoid costly calculations while the window size is in flux.
 * jQuery(window).on('resize', _.debounce(calculateLayout, 150));
 *
 * // Invoke `sendMail` when clicked, debouncing subsequent calls.
 * jQuery(element).on('click', _.debounce(sendMail, 300, {
 *   'leading': true,
 *   'trailing': false
 * }));
 *
 * // Ensure `batchLog` is invoked once after 1 second of debounced calls.
 * var debounced = _.debounce(batchLog, 250, { 'maxWait': 1000 });
 * var source = new EventSource('/stream');
 * jQuery(source).on('message', debounced);
 *
 * // Cancel the trailing debounced invocation.
 * jQuery(window).on('popstate', debounced.cancel);
 */
function debounce(func, wait, options) {
  var lastArgs,
      lastThis,
      maxWait,
      result,
      timerId,
      lastCallTime,
      lastInvokeTime = 0,
      leading = false,
      maxing = false,
      trailing = true;

  if (typeof func != 'function') {
    throw new TypeError(FUNC_ERROR_TEXT);
  }
  wait = toNumber(wait) || 0;
  if (isObject(options)) {
    leading = !!options.leading;
    maxing = 'maxWait' in options;
    maxWait = maxing ? nativeMax(toNumber(options.maxWait) || 0, wait) : maxWait;
    trailing = 'trailing' in options ? !!options.trailing : trailing;
  }

  function invokeFunc(time) {
    var args = lastArgs,
        thisArg = lastThis;

    lastArgs = lastThis = undefined;
    lastInvokeTime = time;
    result = func.apply(thisArg, args);
    return result;
  }

  function leadingEdge(time) {
    // Reset any `maxWait` timer.
    lastInvokeTime = time;
    // Start the timer for the trailing edge.
    timerId = setTimeout(timerExpired, wait);
    // Invoke the leading edge.
    return leading ? invokeFunc(time) : result;
  }

  function remainingWait(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime,
        timeWaiting = wait - timeSinceLastCall;

    return maxing
      ? nativeMin(timeWaiting, maxWait - timeSinceLastInvoke)
      : timeWaiting;
  }

  function shouldInvoke(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime;

    // Either this is the first call, activity has stopped and we're at the
    // trailing edge, the system time has gone backwards and we're treating
    // it as the trailing edge, or we've hit the `maxWait` limit.
    return (lastCallTime === undefined || (timeSinceLastCall >= wait) ||
      (timeSinceLastCall < 0) || (maxing && timeSinceLastInvoke >= maxWait));
  }

  function timerExpired() {
    var time = now();
    if (shouldInvoke(time)) {
      return trailingEdge(time);
    }
    // Restart the timer.
    timerId = setTimeout(timerExpired, remainingWait(time));
  }

  function trailingEdge(time) {
    timerId = undefined;

    // Only invoke if we have `lastArgs` which means `func` has been
    // debounced at least once.
    if (trailing && lastArgs) {
      return invokeFunc(time);
    }
    lastArgs = lastThis = undefined;
    return result;
  }

  function cancel() {
    if (timerId !== undefined) {
      clearTimeout(timerId);
    }
    lastInvokeTime = 0;
    lastArgs = lastCallTime = lastThis = timerId = undefined;
  }

  function flush() {
    return timerId === undefined ? result : trailingEdge(now());
  }

  function debounced() {
    var time = now(),
        isInvoking = shouldInvoke(time);

    lastArgs = arguments;
    lastThis = this;
    lastCallTime = time;

    if (isInvoking) {
      if (timerId === undefined) {
        return leadingEdge(lastCallTime);
      }
      if (maxing) {
        // Handle invocations in a tight loop.
        clearTimeout(timerId);
        timerId = setTimeout(timerExpired, wait);
        return invokeFunc(lastCallTime);
      }
    }
    if (timerId === undefined) {
      timerId = setTimeout(timerExpired, wait);
    }
    return result;
  }
  debounced.cancel = cancel;
  debounced.flush = flush;
  return debounced;
}

module.exports = debounce;


/***/ }),

/***/ "./node_modules/lodash/isObject.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isObject.js ***!
  \*****************************************/
/***/ ((module) => {

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return value != null && (type == 'object' || type == 'function');
}

module.exports = isObject;


/***/ }),

/***/ "./node_modules/lodash/isObjectLike.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isObjectLike.js ***!
  \*********************************************/
/***/ ((module) => {

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return value != null && typeof value == 'object';
}

module.exports = isObjectLike;


/***/ }),

/***/ "./node_modules/lodash/isSymbol.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isSymbol.js ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var symbolTag = '[object Symbol]';

/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */
function isSymbol(value) {
  return typeof value == 'symbol' ||
    (isObjectLike(value) && baseGetTag(value) == symbolTag);
}

module.exports = isSymbol;


/***/ }),

/***/ "./node_modules/lodash/now.js":
/*!************************************!*\
  !*** ./node_modules/lodash/now.js ***!
  \************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/**
 * Gets the timestamp of the number of milliseconds that have elapsed since
 * the Unix epoch (1 January 1970 00:00:00 UTC).
 *
 * @static
 * @memberOf _
 * @since 2.4.0
 * @category Date
 * @returns {number} Returns the timestamp.
 * @example
 *
 * _.defer(function(stamp) {
 *   console.log(_.now() - stamp);
 * }, _.now());
 * // => Logs the number of milliseconds it took for the deferred invocation.
 */
var now = function() {
  return root.Date.now();
};

module.exports = now;


/***/ }),

/***/ "./node_modules/lodash/throttle.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/throttle.js ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var debounce = __webpack_require__(/*! ./debounce */ "./node_modules/lodash/debounce.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js");

/** Error message constants. */
var FUNC_ERROR_TEXT = 'Expected a function';

/**
 * Creates a throttled function that only invokes `func` at most once per
 * every `wait` milliseconds. The throttled function comes with a `cancel`
 * method to cancel delayed `func` invocations and a `flush` method to
 * immediately invoke them. Provide `options` to indicate whether `func`
 * should be invoked on the leading and/or trailing edge of the `wait`
 * timeout. The `func` is invoked with the last arguments provided to the
 * throttled function. Subsequent calls to the throttled function return the
 * result of the last `func` invocation.
 *
 * **Note:** If `leading` and `trailing` options are `true`, `func` is
 * invoked on the trailing edge of the timeout only if the throttled function
 * is invoked more than once during the `wait` timeout.
 *
 * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
 * until to the next tick, similar to `setTimeout` with a timeout of `0`.
 *
 * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
 * for details over the differences between `_.throttle` and `_.debounce`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to throttle.
 * @param {number} [wait=0] The number of milliseconds to throttle invocations to.
 * @param {Object} [options={}] The options object.
 * @param {boolean} [options.leading=true]
 *  Specify invoking on the leading edge of the timeout.
 * @param {boolean} [options.trailing=true]
 *  Specify invoking on the trailing edge of the timeout.
 * @returns {Function} Returns the new throttled function.
 * @example
 *
 * // Avoid excessively updating the position while scrolling.
 * jQuery(window).on('scroll', _.throttle(updatePosition, 100));
 *
 * // Invoke `renewToken` when the click event is fired, but not more than once every 5 minutes.
 * var throttled = _.throttle(renewToken, 300000, { 'trailing': false });
 * jQuery(element).on('click', throttled);
 *
 * // Cancel the trailing throttled invocation.
 * jQuery(window).on('popstate', throttled.cancel);
 */
function throttle(func, wait, options) {
  var leading = true,
      trailing = true;

  if (typeof func != 'function') {
    throw new TypeError(FUNC_ERROR_TEXT);
  }
  if (isObject(options)) {
    leading = 'leading' in options ? !!options.leading : leading;
    trailing = 'trailing' in options ? !!options.trailing : trailing;
  }
  return debounce(func, wait, {
    'leading': leading,
    'maxWait': wait,
    'trailing': trailing
  });
}

module.exports = throttle;


/***/ }),

/***/ "./node_modules/lodash/toNumber.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toNumber.js ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var baseTrim = __webpack_require__(/*! ./_baseTrim */ "./node_modules/lodash/_baseTrim.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var NAN = 0 / 0;

/** Used to detect bad signed hexadecimal string values. */
var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;

/** Used to detect binary string values. */
var reIsBinary = /^0b[01]+$/i;

/** Used to detect octal string values. */
var reIsOctal = /^0o[0-7]+$/i;

/** Built-in method references without a dependency on `root`. */
var freeParseInt = parseInt;

/**
 * Converts `value` to a number.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to process.
 * @returns {number} Returns the number.
 * @example
 *
 * _.toNumber(3.2);
 * // => 3.2
 *
 * _.toNumber(Number.MIN_VALUE);
 * // => 5e-324
 *
 * _.toNumber(Infinity);
 * // => Infinity
 *
 * _.toNumber('3.2');
 * // => 3.2
 */
function toNumber(value) {
  if (typeof value == 'number') {
    return value;
  }
  if (isSymbol(value)) {
    return NAN;
  }
  if (isObject(value)) {
    var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
    value = isObject(other) ? (other + '') : other;
  }
  if (typeof value != 'string') {
    return value === 0 ? value : +value;
  }
  value = baseTrim(value);
  var isBinary = reIsBinary.test(value);
  return (isBinary || reIsOctal.test(value))
    ? freeParseInt(value.slice(2), isBinary ? 2 : 8)
    : (reIsBadHex.test(value) ? NAN : +value);
}

module.exports = toNumber;


/***/ }),

/***/ "./assets/src/sass/styles.scss":
/*!*************************************!*\
  !*** ./assets/src/sass/styles.scss ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/src/sass/admin.scss":
/*!************************************!*\
  !*** ./assets/src/sass/admin.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/global */
/******/ 	(() => {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/admin": 0,
/******/ 			"css/styles": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunklodgings_collective_theme"] = self["webpackChunklodgings_collective_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/admin","css/styles"], () => (__webpack_require__("./assets/src/scripts/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/admin","css/styles"], () => (__webpack_require__("./assets/src/sass/styles.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/admin","css/styles"], () => (__webpack_require__("./assets/src/sass/admin.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;