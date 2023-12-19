// class Lightbox {
//     constructor()
//     {
//         if (document.getElementsByClassName('lc-lightbox').length !== 0) {
//             this.lightboxSection = document.querySelector('.lc-lightbox');
//             this.lightboxEnabled = document.querySelector(
//                 '.lc-carousel__container-sliders'
//             );
//             this.lightboxEnabledSlides = [...this.lightboxEnabled.children];
//             this.singleRentalsPage =
//             document.querySelector('.single-lc-rentals');
//
//             this.events();
//         }
//     }
//
//     events()
//     {
//         this.lightboxEnabled.addEventListener(
//             'click', () =>
//             this.enableLightbox()
//         );
//     }
//
//     enableLightbox()
//     {
//         const lightboxSectionActive = document.getElementsByClassName(
//             'lc-carousel lc-lightbox active'
//         );
//
//         this.lightboxSection.classList.toggle('active');
//
//         if (document.getElementsByClassName('lc-carousel lc-lightbox active')       .length !== 0
//         ) {
//             const wrapper = document.createElement('div');
//             wrapper.classList.add('white-background');
//             wrapper.setAttribute('id', 'white-background');
//
//             this.lightboxSection.parentNode.insertBefore(
//                 wrapper,
//                 this.lightboxSection
//             );
//
//             for (const i in this.lightboxSection) {
//                 wrapper.appendChild(this.lightboxSection);
//             }
//         } else {
//             const node = document.getElementById('white-background');
//             node.replaceWith(...node.childNodes);
//         }
//
//         if (lightboxSectionActive.length !== 0) {
//             this.singleRentalsPage.style.overflowY = 'hidden';
//         } else {
//             this.singleRentalsPage.style.overflowY = 'scroll';
//         }
//     }
// }
//
// export default Lightbox;
//
