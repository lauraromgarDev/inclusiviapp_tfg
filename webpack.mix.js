const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/createTeam.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.autoload({
    jquery: ['$', 'window.jQuery']
});

mix.browserSync('localhost:8000');
