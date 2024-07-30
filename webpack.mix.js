const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css') // Compile Sass
   .css('resources/css/app.css', 'public/css'); // Optionally compile plain CSS