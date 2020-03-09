const mix = require("laravel-mix");

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

/**
 * Compilacion de archivos stylos a css
 */
mix.stylus(
    "resources/stylus/admin/admin.styl", // admin/admin.css
    "public/css/admin/admin.css"
)
.stylus(
    "resources/stylus/login/login.styl", // home/connect.css
    "public/css/login/login.css"
);

/**
 * Compilacion de archivos css a css
 */
mix.styles(["resources/css/bootstrap.min.css"], "public/css/app.css");

mix.scripts(
    [
        "resources/js/jquery-3.4.1.slim.min.js",
        "resources/js/popper.min.js",
        "resources/js/bootstrap.min.js"
    ],
    "public/js/app.js"
);
