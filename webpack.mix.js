//
// Webpack
//

const mix = require('laravel-mix');
const path = require('path');

//
// JS
//

mix.js('./resources/js/app.js', 'public/js').vue();

//
// CSS
//

mix.sass('./resources/css/app.scss', 'public/css');

//
// Config
//

mix.webpackConfig({
    resolve: {
        alias: {
            'components': path.resolve('./resources/js/components'),
            'js': path.resolve('./resources/js'),
            'modules': path.resolve('./resources/js/modules'),
            'pages': path.resolve('./resources/js/pages'),
            'routes': path.resolve('./resources/js/routes'),
        },

        extensions: [
            '.js',
            '.vue',
        ],
    },
});
