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

mix.js("./node_modules/flowbite/dist/flowbite.js", "public/js")
    .postCss("resources/css/styles.css", "public/css", [require("tailwindcss")])
    .postCss("./node_modules/flowbite/dist/flowbite.css", "public/css");
