# ![Lodgings Collective Theme](https://www.lodgingscollective.com/wp-content/uploads/2023/01/lodgings-collective-black-color-logo-200.png)
> A WordPress Theme for Lodgings Collective website


## Prerequisites

This theme relies on **NPM** and **Composer** in order to load dependencies and packages.
**Webpack** should always be running and watching during the development process, in order to properly compile and update files.

* Install [Composer](https://getcomposer.org/)
* Install [Node](https://nodejs.org/)


## Installation

* Open a Terminal window on the location of the theme folder
* Execute `composer install`
* Execute `npm install`


## Webpack

Lodgings Collective theme uses [Laravel Mix](https://laravel.com/docs/5.6/mix) for assets management. Check the official documentation for advanced options

* `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
* `npm run dev` to quickly compile and bundle all the assets without watching
* `npm run prod` to compile the assets for production


## Features

* Bult-in `webpack.mix.js` for fast development and compiling.
* `ES6 Javascript` syntax ready.



