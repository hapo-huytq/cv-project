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
mix.js([
    'public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'public/backend/dist/js/adminlte.min.js',
], 'public/js/admin_lib.js');
mix.styles([
    'public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css',
    'public/backend/bower_components/font-awesome/css/font-awesome.min.css',
    'public/backend/bower_components/Ionicons/css/ionicons.min.css',
    'public/backend/dist/css/AdminLTE.min.css',
    'public/backend/dist/css/skins/_all-skins.min.css',
    'public/backend/bower_components/morris.js/morris.css',
    'public/backend/bower_components/jvectormap/jquery-jvectormap.css',
    'public/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    'public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css',
    'public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
], 'public/css/admin_lib.css');
mix.sass('resources/sass/custom.scss', 'public/css');
