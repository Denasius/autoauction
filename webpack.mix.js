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
	'resources/assets/admin/css/font-awesome.min.css',
	'resources/assets/admin/css/style.css',
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

mix.styles([
	'resources/front/assets/css/simple-line-icons.css',
	'resources/front/assets/css/font-awesome.min.css',
	'resources/front/assets/css/icon-font.css',
	'resources/front/assets/css/bootstrap.css',
	'resources/front/assets/css/animate.css',
	'resources/front/assets/css/jquery-ui.css',
	'resources/front/assets/css/auction.css',
	'resources/front/assets/rs-plugin/css/settings.css',
	'resources/front/assets/css/auction-custom.css',
], 'public/css/styles.css');

mix.sass('resources/assets/admin/style-custom.scss', 'public/css/custom-admin.css');

mix.scripts([
	'resources/assets/admin/js/bootstrap.min.js',
	'resources/assets/admin/js/custom.js',
	'resources/assets/admin/js/custom-dropzone.js',
], 'public/js/admin.js');

mix.scripts([
	'resources/front/assets/js/jquery-1.11.1.min.js',
	'resources/front/assets/js/bootstrap.min.js',
	'resources/front/assets/rs-plugin/js/jquery.themepunch.tools.min.js',
	'resources/front/assets/rs-plugin/js/jquery.themepunch.revolution.min.js',
	'resources/front/assets/js/custom.js',
	'resources/front/assets/js/plugins.js',
], 'public/js/scripts.js');


mix.copy('resources/assets/admin/fonts', 'public/fonts');
mix.copy('resources/assets/admin/img', 'public/img');
mix.copy('resources/front/assets/images', 'public/assets/images');
mix.copy('resources/front/assets/fonts', 'public/fonts');
mix.copy('resources/front/assets/rs-plugin/font', 'public/fonts');
mix.copy('resources/front/assets/rs-plugin/font', 'public/assets/fonts');
mix.browserSync('autoauction');