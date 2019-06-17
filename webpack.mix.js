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
mix.styles([
	'resources/assets/admin/css/bootstrap.min.css',
	'resources/assets/admin/css/bootstrap-theme.css',
	// 'resources/assets/admin/css/elegant-icons-style.css',
	'resources/assets/admin/css/font-awesome.min.css',
	// 'resources/assets/admin/fullcalendar/fullcalendar/bootstrap-fullcalendar.css',
	// 'resources/assets/admin/fullcalendar/fullcalendar/fullcalendar.css',
	// 'resources/assets/admin/jquery-easy-pie-chart/jquery.easy-pie-chart.css',
	// 'resources/assets/admin/css/owl.carousel.css',
	// 'resources/assets/admin/css/fullcalendar.css',
	// 'resources/assets/admin/css/widgets.css',
	// 'resources/assets/admin/css/xcharts.min.css',
	// 'resources/assets/admin/css/jquery-ui-1.10.4.min.css',
	// 'resources/assets/admin/css/line-icons.css',
	// 'resources/assets/admin/css/daterangepicker.css',
	// 'resources/assets/admin/css/bootstrap-datepicker.css',
	// 'resources/assets/admin/css/bootstrap-colorpicker.css',
	'resources/assets/admin/css/style.css',
	// 'resources/assets/admin/css/style-responsive.css',
	'resources/assets/admin/css/custom.css',
], 'public/css/admin.css');

mix.styles([
	'resources/assets/admin/css/bootstrap.min.css',
	'resources/assets/admin/css/bootstrap-theme.css',
	'resources/assets/admin/css/elegant-icons-style.css',
	'resources/assets/admin/css/font-awesome.min.css',
	'resources/assets/admin/css/style.css',
	'resources/assets/admin/css/style-responsive.css',
], 'public/css/login.css');

mix.sass('resources/assets/admin/style-custom.scss', 'public/css/custom-admin.css');

mix.scripts([
	// 'resources/assets/admin/js/jquery.js',
	// 'resources/assets/admin/js/jquery-ui-1.10.4.min.js',
	// 'resources/assets/admin/js/jquery-1.8.3.min.js',
	// 'resources/assets/admin/js/jquery-ui-1.9.2.custom.min.js',
	'resources/assets/admin/js/bootstrap.min.js',
	// 'resources/assets/admin/js/jquery.scrollTo.min.js',
	// 'resources/assets/admin/js/jquery.nicescroll.js',
	// 'resources/assets/admin/jquery-knob/js/jquery.knob.js',
	// 'resources/assets/admin/js/jquery.sparkline.js',
	// 'resources/assets/admin/jquery-easy-pie-chart/jquery.easy-pie-chart.js',
	// 'resources/assets/admin/js/owl.carousel.js',
	// 'resources/assets/admin/js/fullcalendar.min.js',
	// 'resources/assets/admin/fullcalendar/fullcalendar/fullcalendar.js',
	// 'resources/assets/admin/js/calendar-custom.js',
	// 'resources/assets/admin/js/jquery.rateit.min.js',
	// 'resources/assets/admin/chart-master/Chart.js',
	// 'resources/assets/admin/js/sparkline-chart.js',
	// 'resources/assets/admin/js/easy-pie-chart.js',
	// 'resources/assets/admin/js/xcharts.min.js',
	// 'resources/assets/admin/js/jquery.autosize.min.js',
	// 'resources/assets/admin/js/jquery.placeholder.min.js',
	// 'resources/assets/admin/js/gdp-data.js',
	// 'resources/assets/admin/js/morris.min.js',
	// 'resources/assets/admin/js/sparklines.js',
	// 'resources/assets/admin/js/charts.js',
	// 'resources/assets/admin/js/jquery.slimscroll.min.js',
	// 'resources/assets/admin/js/jquery.customSelect.min.js',
	// 'resources/assets/admin/js/jquery.customSelect.min.js',
	// 'resources/assets/admin/ckeditor-dev/ckeditor.js',
	// 'resources/assets/admin/js/scripts.js',
	'resources/assets/admin/js/custom.js',
	'resources/assets/admin/js/custom-dropzone.js',
], 'public/js/admin.js');


mix.copy('resources/assets/admin/fonts', 'public/fonts');
mix.copy('resources/assets/admin/img', 'public/img');
mix.browserSync('autoauction');