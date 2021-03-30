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


    .copy('resources/asset/admin/plugins/fontawesome-free/css/all.min.css', 'public/asset/admin/plugins/fontawesome-free/css/all.min.css')
    .copy('resources/asset/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'public/asset/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')
    .copy('resources/asset/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'public/asset/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')
    .copy('resources/asset/admin/plugins/jqvmap/jqvmap.min.css', 'public/asset/admin/plugins/jqvmap/jqvmap.min.css')
    .copy('resources/asset/admin/dist/css/adminlte.min.css', 'public/asset/admin/dist/css/adminlte.min.css')
    .copy('resources/asset/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css', 'public/asset/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')
    .copy('resources/asset/admin/plugins/daterangepicker/daterangepicker.css', 'public/asset/admin/plugins/daterangepicker/daterangepicker.css')
    .copy('resources/asset/admin/plugins/summernote/summernote-bs4.css', 'public/asset/admin/plugins/summernote/summernote-bs4.css')



    

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
    .copy('resources/asset/client/js/main.js', 'public/asset/client/js/main.js')
    
    .copy('resources/asset/admin/plugins/jquery/jquery.min.js', 'public/asset/admin/plugins/jquery/jquery.min.js')
    .copy('resources/asset/admin/plugins/jquery-ui/jquery-ui.min.js', 'public/asset/admin/plugins/jquery-ui/jquery-ui.min.js')
    .copy('resources/asset/admin/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/asset/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')
    .copy('resources/asset/admin/plugins/chart.js/Chart.min.js', 'public/asset/admin/plugins/chart.js/Chart.min.js')
    .copy('resources/asset/admin/plugins/sparklines/sparkline.js', 'public/asset/admin/plugins/sparklines/sparkline.js')
    .copy('resources/asset/admin/plugins/jqvmap/jquery.vmap.min.js', 'public/asset/admin/plugins/jqvmap/jquery.vmap.min.js')
    .copy('resources/asset/admin/plugins/jqvmap/maps/jquery.vmap.usa.js', 'public/asset/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')
    .copy('resources/asset/admin/plugins/jquery-knob/jquery.knob.min.js', 'public/asset/admin/plugins/jquery-knob/jquery.knob.min.js')
    .copy('resources/asset/admin/plugins/moment/moment.min.js', 'public/asset/admin/plugins/moment/moment.min.js')
    .copy('resources/asset/admin/plugins/daterangepicker/daterangepicker.js', 'public/asset/admin/plugins/daterangepicker/daterangepicker.js')    
    .copy('resources/asset/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'public/asset/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')
    .copy('resources/asset/admin/plugins/summernote/summernote-bs4.min.js', 'public/asset/admin/plugins/summernote/summernote-bs4.min.js')
    .copy('resources/asset/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', 'public/asset/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')
    .copy('resources/asset/admin/dist/js/adminlte.js', 'public/asset/admin/dist/js/adminlte.js')
    .copy('resources/asset/admin/dist/js/pages/dashboard.js', 'public/asset/admin/dist/js/pages/dashboard.js')
    .copy('resources/asset/admin/dist/js/demo.js', 'public/asset/admin/dist/js/demo.js')
    
    .copy('resources/asset/admin/dist/js/adminlte.min.js', 'public/asset/admin/dist/js/adminlte.min.js');


mix.copyDirectory('resources/asset/client/img', 'public/asset/client/img');
mix.copyDirectory('resources/asset/client/fonts', 'public/asset/client/fonts');

mix.copyDirectory('resources/asset/admin/dist/img', 'public/asset/admin/dist/img');
mix.copyDirectory('resources/asset/admin/plugins/fontawesome-free', 'public/asset/admin/plugins/fontawesome-free');

