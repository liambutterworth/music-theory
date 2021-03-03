//
// Webpack
//

const mix = require('laravel-mix');
const path = require('path');

//
// Config
//

mix.webpackConfig({
    resolve: {
        alias: {
            'js': path.resolve(__dirname, 'resources/js'),
            'components': path.resolve(__dirname, 'resources/js/components'),
            'pages': path.resolve(__dirname, 'resources/js/pages'),
        },

        extensions: [
            '.vue',
            '.js',
        ],
    },
});

//
// JS
//

mix.js('./resources/js/app.js', 'public/js').vue();

//
// CSS
//

mix.sass('./resources/css/app.scss', 'public/css');
