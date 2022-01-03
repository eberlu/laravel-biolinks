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

mix.js('resources/js/app.js', 'public/js').vue()
    .js('resources/js/profile.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/profile.css', 'public/css')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({
    proxy: "127.0.0.1:8000", 
    open: false
})

mix.options({
    postCss: [
        require('postcss-import'),
        require('tailwindcss'),
    ]
})