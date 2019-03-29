const {mix} = require('laravel-mix');
const path = require('path');

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

mix.webpackConfig({
    output: {
        publicPath: "/",
        chunkFilename: 'js/[name].[chunkhash].js'
    },
    resolve: {
        alias: {
            'config': 'assets/js/config',
            'lang': 'assets/js/lang',
            'plugins': 'assets/js/plugins',
            'vendor': 'assets/js/vendor',
            'dashboard': 'assets/js/dashboard',
            'home': 'assets/js/home',
            'js': 'assets/js',
            'window.Quill': 'quill',
        },
        modules: [
            'node_modules',
            path.resolve(__dirname, "resources")
        ]
    },
});

let themes = [
    'resources/assets/scss/themes/default-theme.scss',
    'resources/assets/scss/themes/gray-theme.scss',
];

themes.forEach((item) => {
    mix.sass(item, 'public/css/themes').version();
})

mix.autoload({
    quill: ['window.Quill']
})

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/home.js', 'public/js')
    .js('resources/assets/js/dest/author.js', 'public/js')
    .sass('resources/assets/scss/app.scss', 'public/css')
    .sass('resources/assets/scss/home.scss', 'public/css')
    .sass('resources/assets/scss/dest/author.scss', 'public/css')
    .sass('resources/assets/scss/dest/create-article.scss', 'public/css')
    .sass('resources/assets/scss/dest/detail-post.scss', 'public/css')
    .copyDirectory('resources/assets/images', 'public/images')
    .version();
