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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.copy('resources/asset/client/style.css', 'public/asset/client/style.css')
    .copy('resources/asset/client/css/normalize.css', 'public/asset/client/css/normalize.css')
    .copy('resources/asset/client/css/main.css', 'public/asset/client/css/main.css')
    .copy('resources/asset/client/css/bootstrap.min.css', 'public/asset/client/css/bootstrap.min.css')
    .copy('resources/asset/client/css/animate.min.css', 'public/asset/client/css/animate.min.css')
    .copy('resources/asset/client/css/font-awesome.min.css', 'public/asset/client/css/font-awesome.min.css')
    .copy('resources/asset/client/vendor/OwlCarousel/owl.carousel.min.css', 'public/asset/client/vendor/OwlCarousel/owl.carousel.min.css')
    .copy('resources/asset/client/vendor/OwlCarousel/owl.theme.default.min.css', 'public/asset/client/vendor/OwlCarousel/owl.theme.default.min.css')
    .copy('resources/asset/client/css/meanmenu.min.css', 'public/asset/client/css/meanmenu.min.css')
    .copy('resources/asset/client/css/magnific-popup.css', 'public/asset/client/css/magnific-popup.css')
    .copy('resources/asset/client/css/hover-min.css', 'public/asset/client/css/hover-min.css')
    .copy('resources/asset/client/css/ie-only.css', 'public/asset/client/css/ie-only.css')


    .copy('resources/asset/client/js/jquery-2.2.4.min.js', 'public/asset/client/js/jquery-2.2.4.min.js')
    .copy('resources/asset/client/js/plugins.js', 'public/asset/client/js/plugins.js')
    .copy('resources/asset/client/js/popper.js', 'public/asset/client/js/popper.js')
    .copy('resources/asset/client/js/bootstrap.min.js', 'public/asset/client/js/bootstrap.min.js')
    .copy('resources/asset/client/js/wow.min.js', 'public/asset/client/js/wow.min.js')
    .copy('resources/asset/client/vendor/OwlCarousel/owl.carousel.min.js', 'public/asset/client/vendor/OwlCarousel/owl.carousel.min.js')
    .copy('resources/asset/client/js/jquery.meanmenu.min.js', 'public/asset/client/js/jquery.meanmenu.min.js')
    .copy('resources/asset/client/js/jquery.scrollUp.min.js', 'public/asset/client/js/jquery.scrollUp.min.js')
    .copy('resources/asset/client/js/jquery.counterup.min.js', 'public/asset/client/js/jquery.counterup.min.js')
    .copy('resources/asset/client/js/waypoints.min.js', 'public/asset/client/js/waypoints.min.js')
    .copy('resources/asset/client/js/isotope.pkgd.min.js', 'public/asset/client/js/isotope.pkgd.min.js')
    .copy('resources/asset/client/js/jquery.magnific-popup.min.js', 'public/asset/client/js/jquery.magnific-popup.min.js')
    .copy('resources/asset/client/js/ticker.js', 'public/asset/client/js/ticker.js')

    .copy('resources/asset/client/js/main.js', 'public/asset/client/js/main.js');


mix.copyDirectory('resources/asset/client/img', 'public/asset/client/img');
mix.copyDirectory('resources/asset/client/fonts', 'public/asset/client/fonts');