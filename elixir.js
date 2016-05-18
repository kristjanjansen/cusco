var gulp = require('gulp');
var concat = require('gulp-concat');
var postcss = require('gulp-postcss');

var Elixir = require('laravel-elixir');

var $ = Elixir.Plugins;
var config = Elixir.config;

Elixir.extend('postcss', function (src, output) {

    return new Elixir.Task('postcss', function () {
        
        this.log(src, output);

        return gulp.src(src)
            .pipe($.concat('main.css'))
            .pipe(postcss([
                require('postcss-advanced-variables'),
                require('postcss-responsive-type'),
                require('postcss-font-magician'),
                require('postcss-if-media'),
            ]).on('error', function(err) {
                new Elixir.Notification('PostCSS Failed!');
                console.log(err)
                this.emit('end');
            }))
            .pipe(gulp.dest(output || './public/css'))
            .pipe(new Elixir.Notification('PostCSS Compiled!'));
    
    })
    .watch(src);

});