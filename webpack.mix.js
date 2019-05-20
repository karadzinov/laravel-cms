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

mix.styles([
   		'public/assets/css/bootstrap.min.css',
   		'public/assets/css/font-awesome.min.css',
   		'public/assets/css/weather-icons.min.css',
   		'public/assets/css/beyond.min.css',
   		'public/assets/css/demo.min.css',
   		'public/assets/css/typicons.min.css',
   		'public/assets/css/animate.min.css',
   		'public/assets/css/custom.css',
   		'public/assets/css/dataTables.bootstrap.css'
   		], 'public/css/mix.css')
   .babel([
	   	'public/assets/js/jquery.min.js',
	   	'public/assets/js/slimscroll/jquery.slimscroll.js',
         'public/assets/js/bootstrap.js',
	   	'public/assets/js/ckeditor/ckeditor.js',
	   	'public/assets/js/ckconf.js',
	   	'public/assets/js/beyond.js',
	   	'public/assets/js/bootbox/bootbox.js'
			], 'public/js/mix.js')
   .version();
