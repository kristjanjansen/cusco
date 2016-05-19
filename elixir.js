var gulp = require('gulp');
var concat = require('gulp-concat');
var postcss = require('gulp-postcss');

var Elixir = require('laravel-elixir');

var $ = Elixir.Plugins;
var config = Elixir.config;

Elixir.extend('postcss', function (src, output) {

    Elixir.onWatch(function() {

        gulp.start('postcss');
    
    });

    return new Elixir.Task('postcss', function () {
        
        this.log(src, output);

        return gulp.src(src)
            .pipe($.if(config.sourcemaps, $.sourcemaps.init()))
            .pipe(postcss([
                require('postcss-import')({ path: './resources/views/utils'}),
                require('postcss-simple-vars')(),
                require('postcss-responsive-type')(),
                require('postcss-font-magician')(),
                require('postcss-if-media')(),
                require('postcss-autoreset')({
                    reset: {
                        margin: 0,
                        padding: 0,
                        borderRadius: 0,
                        boxSizing: 'border-box'
                    },
                    rulesMatcher: 'bem'}),
            ]).on('error', function(err) {
                new Elixir.Notification('PostCSS Failed!');
                console.log(err)
                this.emit('end');
            }))
            .pipe($.concat('main.css'))
            .pipe($.if(config.sourcemaps, $.sourcemaps.write('.')))
            .pipe(gulp.dest(output || './public/css'))
            .pipe(new Elixir.Notification('PostCSS Compiled!'));
    
    })
    .watch(src);

});