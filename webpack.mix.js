const mix = require('laravel-mix');
const path = require('path');

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

mix.js('resources/js/app.js', 'public/js')   // основний JS файл
    .vue()                                   // для Vue
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/js'), // Налаштування псевдоніму '@'
            },
            extensions: ['.js', '.vue', '.json'], // Додаємо підтримку для .vue
        }
    })

if (mix.inProduction()) {
    mix.version();  // додати версію для кешування у продакшн середовищі
}
