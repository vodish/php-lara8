const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    resolve: {
        extensions: ['.vue', '.ts', '.js'],
        alias: {
            '@': __dirname + '/src-vue3',
        }
    },
    module: {
        rules: [
            {
                test: /\.ts$/,
                loader: 'ts-loader',
                exclude: /node_module/,
                options: { appendTsSuffixTo: [/\.vue$/] }
            },
        ],
    },
});

// mix.js('src-vue3/main.js', 'public/dist-vue3')
mix.ts("src-vue3/main.ts", "public/dist-vue3")
mix.vue({ version: 3 })
mix.version()
mix.browserSync('127.0.0.1:8000')
mix.disableNotifications()
// mix.setPublicPath('dist')
