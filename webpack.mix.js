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
//admin panel, some of the assets integrated in theme-1, they are the same
mix.styles([
   		'public/assets/common/css/bootstrap.min.css',
         'public/assets/common/fonts/font-awesome/css/font-awesome.css',
   		'public/assets/admin/css/weather-icons.min.css', 
   		'public/assets/admin/css/beyond.min.css',
   		'public/assets/admin/css/demo.min.css',
   		'public/assets/admin/css/typicons.min.css',
   		'public/assets/admin/css/animate.min.css',
   		'public/assets/admin/css/dataTables.bootstrap.css',
   		'public/assets/theme-1/css/custom.css',
   		], 'public/css/admin-mix.css')
   .babel([
	   	'public/assets/common/js/jquery.min.js',
	   	'public/assets/admin/js/slimscroll/jquery.slimscroll.js',
         'public/assets/common/js/bootstrap.js',
	   	'public/assets/admin/js/beyond.js',
	   	'public/assets/admin/js/bootbox/bootbox.js',
	   	'public/assets/admin/js/ckeditor/ckeditor.js',
	   	'public/assets/admin/js/ckconf.js',
         'public/assets/admin/js/Socket.IO-master/socket.io.min.js',//
         // 'public/assets/admin/js/select2/select2.js',//
         // 'public/assets/common/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js',
         // 'public/assets/admin/js/chat.js',//
         // 'public/assets/admin/js/admin-custom.js',//
			], 'public/js/admin-mix.js')
   //theme-1
   .styles([
         'public/assets/common/bootstrap/css/bootstrap.css',
         'public/assets/common/fonts/font-awesome/css/font-awesome.css',
         'public/assets/theme-1/fonts/fontello/css/fontello.css',
         'public/assets/theme-1/plugins/magnific-popup/magnific-popup.css',
         'public/assets/theme-1/plugins/rs-plugin/css/settings.css',
         'public/assets/theme-1/css/animations.css',
         'public/assets/theme-1/plugins/owl-carousel/owl.carousel.css',
         'public/assets/theme-1/plugins/owl-carousel/owl.transitions.css',
         'public/assets/theme-1/plugins/hover/hover-min.css',
         'public/assets/theme-1/css/style.css',
         'public/assets/theme-1/css/custom.css',
         ], 'public/css/theme-1-mix.css')
   .babel([
         'public/assets/common/js/jquery.min.js',
         'public/assets/common/bootstrap/js/bootstrap.min.js',
         'public/assets/theme-1/plugins/modernizr.js',
         'public/assets/theme-1/plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
         'public/assets/theme-1/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
         'public/assets/theme-1/plugins/isotope/isotope.pkgd.min.js',
         'public/assets/theme-1/plugins/magnific-popup/jquery.magnific-popup.min.js',
         'public/assets/theme-1/plugins/waypoints/jquery.waypoints.min.js',
         'public/assets/theme-1/plugins/jquery.countTo.js',
         'public/assets/theme-1/plugins/jquery.parallax-1.1.3.js',
         'public/assets/theme-1/plugins/jquery.validate.js',
         'public/assets/theme-1/plugins/vide/jquery.vide.js',
         'public/assets/theme-1/plugins/owl-carousel/owl.carousel.js',
         'public/assets/theme-1/plugins/jquery.browser.js',
         // 'public/assets/plugins/SmoothScroll.js',
         'public/assets/theme-1/js/template.js',
         'public/assets/common/js/lazyload/dist/lazyload.min.js',
         'public/assets/common/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js',
         'public/assets/theme-1/js/custom.js',
         ], 'public/js/theme-1-mix.js')
   //theme-2
   .styles([
         //core css
         "public/assets/theme-2/plugins/bootstrap/css/bootstrap.min.css",
         // revolution slider
         "public/assets/theme-2/plugins/slider.revolution/css/extralayers.css",
         "public/assets/theme-2/plugins/slider.revolution/css/settings.css",
         // theme css
         "public/assets/theme-2/css/essentials.css",
         "public/assets/theme-2/css/layout.css",
         // page level scripts
         "public/assets/theme-2/css/header-1.css",
         "public/assets/theme-2/css/color_scheme/green.css",
         "public/assets/theme-2/css/custom.css"
         ], 'public/css/theme-2-mix.css')
   .babel([
         "public/assets/theme-2/plugins/jquery/jquery-3.3.1.min.js",
         // search helper package
         "public/assets/common/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js",
         // revolution slider
         "public/assets/theme-2/plugins/slider.revolution/js/jquery.themepunch.tools.min.js",
         "public/assets/theme-2/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js",
         "public/assets/theme-2/js/view/demo.revolution_slider.js",
         "public/assets/common/js/lazyload/dist/lazyload.min.js",
         // scripts
         "public/assets/theme-2/js/scripts.js",
         // custom
         // "public/assets/theme-2/js/custom.js",
         ], 'public/js/theme-2-mix.js')
   //vue.js
   .js('resources/assets/js/app.js', 'public/js')
   .version();


