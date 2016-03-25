'use strict';
// Load plugins
var gulp 			= require('gulp');
var gulpLoadPlugins = require('gulp-load-plugins');
var plugins 		= gulpLoadPlugins();
var sass 			= require('gulp-sass');
var iconfont 		= require('gulp-iconfont');
var iconfontCss 	= require('gulp-iconfont-css');
var plumber = require('gulp-plumber');

// 	plugins = require('gulp-load-plugins')({ camelize: true }),
// 	lr = require('tiny-lr'),
// 	server = lr();

gulp.task('sass', function(){
  return gulp.src('assets/src/scss/**/*.scss')
    //.pipe(plumber())
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest('assets/dist/css'));
});


gulp.task('watch', function(){
  gulp.watch('assets/src/scss/**/*.scss', ['sass']); 
  // autres observations
});


gulp.task('glyphicons', function() {
 return gulp.src('assets/src/glyphicons/**/*')
    .pipe(plumber())
    .pipe(iconfontCss({
      fontName: 'icons', // nom de la fonte, doit être identique au nom du plugin iconfont
      targetPath: '../../dist/css/icons.css', // emplacement de la css finale
      fontPath: '../fonts/' // emplacement des fontes finales
    }))
    .pipe(iconfont({
      	fontName: 'icons', // identique au nom de iconfontCss
    	centerHorizontally: true,
    	normalize: true,
		appendUnicode: true
     }))
    .pipe( gulp.dest('assets/dist/fonts') );
});


// Site Scripts
gulp.task('scripts', function() {
  return gulp.src([
  			'assets/src/js/**/*.js',
  			'assets/src/js/vendor/*.js',
  			'assets/src/js/source/*.js'
  		])
  .pipe(plumber())
	.pipe(plugins.jshint('.jshintrc'))
	.pipe(plugins.jshint.reporter('default'))
	.pipe(plugins.concat('main.js'))
	.pipe(gulp.dest('assets/dist/js'))
	.pipe(plugins.rename({ suffix: '.min' }))
	.pipe(plugins.uglify())
	//.pipe(plugins.livereload(server))
	.pipe(gulp.dest('assets/dist/js'))
	.pipe(plugins.notify({ message: 'Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('assets/src/img/**/*')
  .pipe(plumber())
	.pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
	//.pipe(plugins.livereload(server))
	.pipe(gulp.dest('assets/dist/img'))
	.pipe(plugins.notify({ message: 'Images task complete' }));
});


// // Default task
// gulp.task('default', ['styles', 'plugins', 'scripts', 'images', 'watch']);
