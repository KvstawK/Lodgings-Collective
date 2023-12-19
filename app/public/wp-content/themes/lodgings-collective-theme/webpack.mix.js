/*
 * This theme uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel-mix.com/
 */

let mix = require( 'laravel-mix' )

// Disable notifications
mix.disableNotifications()

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery.
// mix.autoload({
// 	jquery: ['$', 'window.jQuery', 'jQuery'],
// });

mix.setPublicPath( './assets/dist' );

// Code to check webpack warnings
// mix.webpackConfig({
// 	stats: {
// 		children: true,
// 	},
// });

// Compile assets.
mix.js( 'assets/src/scripts/app.js', 'assets/dist/js' )
	.js( 'assets/src/scripts/admin.js', 'assets/dist/js' )
	.sass( 'assets/src/sass/styles.scss', 'assets/dist/css' )
	.sass( 'assets/src/sass/admin.scss', 'assets/dist/css' )

// Add and versioning to assets in production environment.
if (mix.inProduction()) {
	mix.version();
}

// Enable only to see the '--stats-children' warning
// mix.webpackConfig({
// 	stats: {
// 		children: true,
// 	},
// });

// Remove source maps if in production mode
// if (!mix.inProduction()) {
// 	mix.sourceMap();
// }

// Browser reload
mix.browserSync({
	proxy: 'lodgings-collective.local',
	files: [
		'./'
		// './*.php',
		// '/assets/dist/css/*.css',
		// '/assets/dist/js/*.js',
	]
});

// Copy directories to dist folder
// mix.copy('assets/src/fonts', 'assets/dist/fonts')
// 	.copy('assets/src/images', 'assets/dist/images')
