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
// Для админки
mix.styles([
	'resources/assets/admin/css/bootstrap.min.css',
	'resources/assets/admin/css/bootstrap-theme.css',
	'resources/assets/admin/css/font-awesome.min.css',
	'resources/assets/admin/css/jquery-ui.min.css',
	'resources/assets/admin/datetime/jquery.datetimepicker.css',
	'resources/assets/admin/css/style.css',
	'resources/assets/admin/css/custom.css',
], 'public/css/admin.css');

// Для страницы логина
mix.styles([
	'resources/assets/admin/css/bootstrap.min.css',
	'resources/assets/admin/css/bootstrap-theme.css',
	'resources/assets/admin/css/elegant-icons-style.css',
	'resources/assets/admin/css/font-awesome.min.css',
	'resources/assets/admin/css/style.css',
	'resources/assets/admin/css/style-responsive.css',
], 'public/css/login.css');

// Для фронта
mix.styles([
	'resources/front/assets/css/simple-line-icons.css',
	'resources/front/assets/css/font-awesome.min.css',
	'resources/front/assets/css/icon-font.css',
	'resources/front/assets/css/bootstrap.css',
	'resources/front/assets/css/animate.css',
	'resources/front/assets/css/jquery-ui.css',
	'resources/front/assets/css/flexslider.css',
	'resources/front/assets/css/auction.css',
	'resources/front/assets/rs-plugin/css/settings.css',
	'resources/front/assets/fancybox/jquery.fancybox.css',
	'resources/front/assets/css/auction-custom.css',
	'resources/front/assets/css/custom.scss',
], 'public/css/styles.css');

// Наши стили для админки
mix.sass('resources/assets/admin/style-custom.scss', 'public/css/custom-admin.css');
// Наши стили для фронта
mix.sass('resources/front/assets/css/custom.scss', 'public/css/custom-style.css');
mix.sass('resources/sass/app.scss', 'public/css/styles.css');

// Скрипты для админки
mix.scripts([
	'resources/assets/admin/js/bootstrap.min.js',
	'resources/assets/admin/js/jquery.nicescroll.js',
	'resources/assets/admin/js/jquery-ui.min.js',
	'resources/assets/admin/js/datepicker-ru.js',
	'resources/assets/admin/datetime/jquery.datetimepicker.full.js',
	'resources/assets/admin/js/scripts.js',
	'resources/assets/admin/js/custom.js',
	'resources/assets/admin/js/custom-dropzone.js',
], 'public/js/admin.js');

// Скрипты для фронта
mix.scripts([
	// 'resources/front/assets/js/jquery-1.11.1.min.js',
	'resources/front/assets/js/bootstrap.min.js',
	'resources/front/assets/rs-plugin/js/jquery.themepunch.tools.min.js',
	'resources/front/assets/rs-plugin/js/jquery.themepunch.revolution.min.js',
	'resources/front/assets/js/custom.js',
	'resources/front/assets/js/plugins.js',
	'resources/front/assets/js/lazy-load/lazyload.min.js',
	'resources/front/assets/js/timer/jquery.downCount.js',
	'resources/front/assets/fancybox/jquery.fancybox.js',
	'resources/front/assets/js/autoauction.js',
], 'public/js/scripts.js');


mix.copy('resources/assets/admin/fonts', 'public/fonts');
mix.copy('resources/assets/admin/img', 'public/img');
mix.copy('resources/assets/admin/img/img-jq-ui', 'public/img');
mix.copy('resources/front/assets/images', 'public/assets/images');
mix.copy('resources/front/assets/fonts', 'public/fonts');
mix.copy('resources/front/assets/rs-plugin/font', 'public/fonts');
mix.copy('resources/front/assets/rs-plugin/font', 'public/assets/fonts');
mix.browserSync('autoauction');