var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.scripts([
        '../../../bower_components/jquery/dist/jquery.js',
        '../../../bower_components/Materialize/bin/materialize.js'
    ]);
    mix.copy('bower_components/Materialize/fonts','public/fonts');
});
