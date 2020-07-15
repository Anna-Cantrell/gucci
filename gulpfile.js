// Require packages
var gulp = require('gulp');
    babelMinify = require('gulp-babel-minify');
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    runSequence = require('run-sequence'),
    pump = require('pump'),
    rename = require('gulp-rename'),
    sourcemaps = require('gulp-sourcemaps'),
    include = require('gulp-include'),
    notify = require('gulp-notify'),
    sassGlob = require('gulp-sass-glob');


var config = {
  templates: './*.php',
  styles: {
		src: 'library/src/scss/**/*.scss',
		dest: 'library/dist/css/',
		sourcemapDest: '.',
		options: {
			sass: {
				outputStyle: 'compressed', // nested, expanded, compact, compressed
				precision: 5
			},
		}
	},
  scripts: {
		src: 'library/src/js/*.js',
    blockSrc: 'library/src/editor-functions.js',
		dest: 'library/dist/js/',
		sourcemapDest: '.',
		rename: {
			suffix: '.min'
		}
	}
};

// Start browserSync server stuffs
gulp.task('browserSync', function() {
  browserSync.init({
    proxy: 'http://localhost:8888/'
  })
});

// Do Template things
gulp.task('templates', function() {
  return gulp.src(config.templates)
    .pipe(browserSync.reload({
      stream:true
    }));
});


// Do SCSS things
gulp.task('styles', function(){
  return gulp.src(config.styles.src)
    .pipe(sassGlob())
    .pipe(sourcemaps.init())
    .pipe(sass(config.styles.options.sass).on('error', sass.logError))
    .pipe(sass(config.styles.options.sass).on('error', notify.onError({
      title: 'Sass Compilation Error',
      message: '<%= error.message %>'
    })))
    .pipe(sourcemaps.write(config.styles.sourcemapDest))
    .pipe(gulp.dest(config.styles.dest))
    .pipe(browserSync.reload({
      stream:true
    }));
});

// Do JS things
gulp.task('js', function() {
	return gulp.src(config.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(include()).on('error', console.log)
    .pipe(babelMinify())
    .pipe(rename(config.scripts.rename))
    .pipe(sourcemaps.write(config.scripts.sourcemapDest))
    .pipe(gulp.dest(config.scripts.dest))
    .pipe(browserSync.reload({
        stream:true
    }));
});

// Do Block JS things
gulp.task('blockJs', function() {
	return gulp.src(config.scripts.blockSrc)
    .pipe(sourcemaps.init())
    .pipe(include()).on('error', console.log)
    .pipe(babelMinify())
    .pipe(rename(config.scripts.rename))
    .pipe(sourcemaps.write(config.scripts.sourcemapDest))
    .pipe(gulp.dest(config.scripts.dest))
    .pipe(browserSync.reload({
        stream:true
    }));
});

//Watch things
gulp.task('watch', ['browserSync'], function() {
  gulp.watch(config.templates, ['templates']);
  gulp.watch(config.styles.src, ['styles']);
  gulp.watch(config.scripts.src, ['js']);
  gulp.watch(config.scripts.blockSrc, ['blockJs']);
});

// Starts gulp
gulp.task('default', function (callback) {
  runSequence(['styles', 'templates', 'js', 'blockJs', 'browserSync', 'watch'], callback);
});

