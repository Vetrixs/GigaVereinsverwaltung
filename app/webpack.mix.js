const mix = require('laravel-mix');
const path = require('path')
require('dotenv').config();
require('vuetifyjs-mix-extension')
require('laravel-mix-eslint-config');

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
const proxy_url = process.env.APP_URL;

const options = {
    extract: 'css/vuetify-components.css'
}
mix.js('resources/js/app.js', 'public/js')
.vuetify('vuetify-loader', options)
.vue()
.alias({
    vue$: path.join(__dirname, 'node_modules/vue/dist/vue.runtime.esm.js'),
    '@': path.join(__dirname, 'resources/js')
})
.eslint({
    enforce: 'pre',
    test: /\.(js|vue)$/,
    loader: 'eslint-loader',
    exclude: /(node_modules)/,
    options: {
      configFile: 'quality/.eslintrc.js',
      emitError: true,
      emitWarning: true,
      failOnError: true,
      failOnWarning: true,
      fix: true,
    }
  })
.extract()
.sourceMaps();

// mix.js('resources/js/app.js', 'public/js').vue()
//     .postCss('resources/css/app.css', 'public/css', [
//         require('postcss-import'),
//         require('tailwindcss'),
//     ])
//     .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
} else {
    mix.browserSync({
        // url for WebpackDevServer
        proxy: {
            target: proxy_url
        },
        injectChanges: true,
    });
}

