const mix = require('laravel-mix');

const glob = require('glob');
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

mix.js('resources/js/app.js', 'public/js').vue({
        extractStyles: true,
        globalStyles: './resources/sass/_config.scss',
    })
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));

glob.sync('resources/sass/*.scss').map(function(file)  {

    mix.sass(file, 'public/css')

})

if (mix.inProduction()) {
    mix.version();
}
