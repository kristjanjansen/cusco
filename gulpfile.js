var elixir = require('laravel-elixir')

require('laravel-elixir-vueify')
require('./elixir')

elixir(function(mix) {

    mix.browserify('./resources/views/main.js')
    
    mix.postcss([
        './resources/views/components/**/*.css',
        './resources/views/utils/**/*.css'
    ])

});