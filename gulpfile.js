'use strict';
// Load plugins
var gulp = require('gulp');

var gulp = require('gulp');
var gulpLoadPlugins = require('gulp-load-plugins');
var plugins = gulpLoadPlugins();

// 	plugins = require('gulp-load-plugins')({ camelize: true }),
// 	lr = require('tiny-lr'),
// 	server = lr();

// // Styles
// gulp.task('styles', function() {
//   return gulp.src('assets/styles/*.scss')
// 	.pipe(plugins.rubySass({ style: 'expanded', sourcemap: true }))
// 	.pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
// 	.pipe(gulp.dest('assets/styles/build'))
// 	.pipe(plugins.minifyCss({ keepSpecialComments: 1 }))
// 	.pipe(plugins.livereload(server))
// 	.pipe(gulp.dest('./'))
// 	.pipe(plugins.notify({ message: 'Styles task complete' }));
// });

var sass = require('gulp-sass');

gulp.task('sass', function(){
  return gulp.src('assets/src/scss/**/*.scss')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest('assets/dist/css'));
});


gulp.task('watch', function(){
  gulp.watch('assets/src/scss/**/*.scss', ['sass']); 
  // autres observations
});

// // Vendor Plugin Scripts
// gulp.task('plugins', function() {
//   return gulp.src(['assets/js/source/plugins.js', 'assets/js/vendor/*.js'])
// 	.pipe(plugins.concat('plugins.js'))
// 	.pipe(gulp.dest('assets/js/build'))
// 	.pipe(plugins.rename({ suffix: '.min' }))
// 	.pipe(plugins.uglify())
// 	.pipe(plugins.livereload(server))
// 	.pipe(gulp.dest('assets/js'))
// 	.pipe(plugins.notify({ message: 'Scripts task complete' }));
// });

// // Site Scripts
gulp.task('scripts', function() {
  return gulp.src(['assets/src/js/**/*.js', '!assets/src/js/plugins.js'])
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

// // Images
// gulp.task('images', function() {
//   return gulp.src('assets/images/**/*')
// 	.pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
// 	.pipe(plugins.livereload(server))
// 	.pipe(gulp.dest('assets/images'))
// 	.pipe(plugins.notify({ message: 'Images task complete' }));
// });

// // Watch
// gulp.task('watch', function() {

//   // Listen on port 35729
//   server.listen(35729, function (err) {
// 	if (err) {
// 	  return console.log(err);
// 	}

// 	// Watch .scss files
// 	gulp.watch('assets/styles/**/*.scss', ['styles']);

// 	// Watch .js files
// 	gulp.watch('assets/js/**/*.js', ['plugins', 'scripts']);

// 	// Watch image files
// 	gulp.watch('assets/images/**/*', ['images']);

//   });

// });

// // Default task
// gulp.task('default', ['styles', 'plugins', 'scripts', 'images', 'watch']);
