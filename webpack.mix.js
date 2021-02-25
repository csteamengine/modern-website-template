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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    .vue()
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js('resources/js/backend/projects/projects.js', 'js/backend/projects/projects.js')
    .js('resources/js/backend/positions/positions.js', 'js/backend/positions/positions.js')
    .js('resources/js/backend/themes/themes.js', 'js/backend/themes/themes.js')
    .js('resources/js/backend/includes/media.js', 'js/backend/includes/media.js')
    .js('resources/js/backend/includes/reorder.js', 'js/backend/includes/reorder.js')
    .js('resources/js/backend/links/links.js', 'js/backend/links/links.js')
    .js('resources/js/backend/links/link.js', 'js/backend/links/link.js')
    .js('resources/js/backend/links/show.js', 'js/backend/links/show.js')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js('resources/js/backend/app.js', 'js/backend.js')
    .extract([
        'alpinejs',
        'jquery',
        'chart.js',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'summernote',
        'lodash',
    ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
