const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/back/user.js', 'public/js')
    .js('resources/js/back/currency.js', 'public/js')
    .js('resources/js/back/category.js', 'public/js')
    .js('resources/js/back/product.js', 'public/js')
    .js('resources/js/back/images.js', 'public/js')
    .js('resources/js/back/orders.js', 'public/js')
    .sass('resources/sass/orders.scss', 'public/css');