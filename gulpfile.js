var elixir = require('laravel-elixir')

require('laravel-elixir-vueify')
require('./elixir')

elixir(function(mix) {

    mix.browserify('./resources/views/main.js')

    mix.postcss([
        './node_modules/vue-animate/dist/vue-animate.css',
        './resources/views/variables/**/*.css',
        './resources/views/utils/**/*.css',
        './resources/views/components/**/*.*css'
    ])

});