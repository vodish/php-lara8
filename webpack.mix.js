const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('src-vue3/main.js', 'public/dist-vue3')
mix.vue()
mix.version()
mix.browserSync('127.0.0.1:8000')
mix.disableNotifications()
// mix.setPublicPath('dist')
