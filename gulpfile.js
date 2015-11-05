//var elixir = require('laravel-elixir');
var gulp 		= require('gulp'),
	browserSync = require('browser-sync'),
	sass		= require('gulp-sass'),
	prefix		= require('gulp-autoprefixer'),
	minifyCss	= require('gulp-minify-css'),
	rename		= require('gulp-rename')
	cp			= require('child_process');

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

/*elixir(function(mix) {
    mix.sass('app.scss');
});*/

gulp.task('browser-sync', function(){
	browserSync({
		proxy: {
			target: "localhost/us-med/public/"
		},
		notify: false
	});
});

gulp.task('sass', function(){
	return gulp.src('resources/assets/css/app.scss')
		.pipe(sass({
			includePaths: ['css'],
			onError: browserSync.notify
		}))
		.pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
		.pipe(gulp.dest('public/css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifyCss())
		.pipe(gulp.dest('public/css'))
		.pipe(browserSync.reload({stream:true}));
});

gulp.task('watch', function() {
	gulp.watch('resources/assets/css/**', ['sass']);
	gulp.watch('resources/views/**').on('change', browserSync.reload);
	//gulp.watch('public/js/**').on('change', browserSync.reload);
	//gulp.watch(['app/**', 'public/**']).on('change', browserSync.reload);
});

gulp.task('default', ['browser-sync', 'watch']);