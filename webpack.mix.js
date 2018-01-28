let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// mix.scripts([
// 	'node_modules/semantic-ui-css/semantic.min.js',
//     'public/js/app.js',
// ], 'public/js/all.js');

// mix.styles([
// 	'node_modules/semantic-ui-css/semantic.min.css',
//     'public/css/app.css',
// ], 'public/css/all.css');

// mix.scripts([
//     'node_modules/semantic-ui-css/semantic.min.js',
// ], 'public/js/guest.js');

// mix.styles([
//     'node_modules/semantic-ui-css/semantic.min.css',
//     'node_modules/semantic-ui-css/semantic.min.css',
// ], 'public/css/guest.css');

mix.copy('resources/assets/css/clean-blog.min.css','public/css')
mix.copy('resources/assets/js/clean-blog.min.js','public/js')
mix.copy('resources/assets/images/home-bg.jpg','public/images')

if (mix.inProduction()) {
    mix.version();
}