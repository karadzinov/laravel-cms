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
// first style and babel are made for admin panel, other 2 for user
mix.styles([
   		'public/assets/css/bootstrap.min.css',
         'public/assets/fonts/font-awesome/css/font-awesome.css',
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
	   	'public/assets/js/beyond.js',
	   	'public/assets/js/bootbox/bootbox.js',
	   	'public/assets/js/ckeditor/ckeditor.js',
	   	'public/assets/js/ckconf.js',
         'public/assets/js/Socket.IO-master/socket.io.min.js',
         // 'public/assets/js/select2/select2.js',
         // 'public/assets/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js',
         // 'public/assets/js/chat.js',
         // 'public/assets/js/admin-custom.js',
			], 'public/js/mix.js')
   .styles([ //theme-1
         'public/assets/bootstrap/css/bootstrap.css',
         'public/assets/fonts/font-awesome/css/font-awesome.css',
         'public/assets/fonts/fontello/css/fontello.css',
         'public/assets/plugins/magnific-popup/magnific-popup.css',
         'public/assets/plugins/rs-plugin/css/settings.css',
         'public/assets/css/animations.css',
         'public/assets/plugins/owl-carousel/owl.carousel.css',
         'public/assets/plugins/owl-carousel/owl.transitions.css',
         'public/assets/plugins/hover/hover-min.css',
         'public/assets/css/style.css',
         'css/public/assets/typography-default.css',
         'public/assets/css/custom.css',
         ], 'public/css/user-mix.css')
   .babel([
         'public/assets/plugins/jquery.min.js',
         'public/assets/bootstrap/js/bootstrap.min.js',
         'public/assets/plugins/modernizr.js',
         'public/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
         'public/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
         'public/assets/plugins/isotope/isotope.pkgd.min.js',
         'public/assets/plugins/magnific-popup/jquery.magnific-popup.min.js',
         'public/assets/plugins/waypoints/jquery.waypoints.min.js',
         'public/assets/plugins/jquery.countTo.js',
         'public/assets/plugins/jquery.parallax-1.1.3.js',
         'public/assets/plugins/jquery.validate.js',
         'public/assets/plugins/vide/jquery.vide.js',
         'public/assets/plugins/owl-carousel/owl.carousel.js',
         'public/assets/plugins/jquery.browser.js',
         // 'public/assets/plugins/SmoothScroll.js',
         'public/assets/js/template.js',
         'public/assets/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js',
         'public/assets/js/custom.js',
         ], 'public/js/user-mix.js')
   .styles([ //theme-2
         //CORE CSS 
         "public/assets/theme-2/plugins/bootstrap/css/bootstrap.min.css",

         // REVOLUTION SLIDER
         "public/assets/theme-2/plugins/slider.revolution/css/extralayers.css",
         "public/assets/theme-2/plugins/slider.revolution/css/settings.css",

         // THEME CSS
         "public/assets/theme-2/css/essentials.css",
         "public/assets/theme-2/css/layout.css",

         // PAGE LEVEL SCRIPTS
         "public/assets/theme-2/css/header-1.css",
         "public/assets/theme-2/css/color_scheme/green.css",
         ], 'public/css/theme-2-mix.css')
   .babel([
         "public/assets/theme-2/plugins/jquery/jquery-3.3.1.min.js",

         // search helper package
         "public/assets/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js",

         // REVOLUTION SLIDER
         "public/assets/theme-2/plugins/slider.revolution/js/jquery.themepunch.tools.min.js",
         "public/assets/theme-2/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js",
         "public/assets/theme-2/js/view/demo.revolution_slider.js",

         // SCRIPTS
         "public/assets/theme-2/js/scripts.js",

         // custom
         // "public/assets/theme-2/js/custom.js",
         ], 'public/js/theme-2-mix.js')
   .js('resources/assets/js/app.js', 'public/js')
   .version();


