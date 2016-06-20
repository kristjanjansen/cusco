var elixir = require('laravel-elixir')

require('laravel-elixir-vueify')
require('./elixir/postcss')
require('./elixir/svg')

elixir(function(mix) {

    mix.browserify('./resources/views/main.js')
    
    mix.postcss([
        './resources/views/utils/**/*.css',
        './resources/views/components/**/*.css'
    ])

    mix.svg([
        './resources/svg/**/*.svg',
    ])

});