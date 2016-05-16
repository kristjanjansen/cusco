var elixir = require('laravel-elixir')

require('laravel-elixir-vueify')
require('./elixir')

elixir(function(mix) {

    mix.browserify('./resources/views/main.js')

    mix.postcss([
        './resources/views/styles/**/*.css',
        './resources/views/components/**/*.*css'
    ])

});