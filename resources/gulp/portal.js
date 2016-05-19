var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var imagemin = require('gulp-imagemin');
var cssmin = require('gulp-cssmin');
var stylus = require('gulp-stylus');
var htmlmin = require('gulp-htmlmin');
var jsonmin = require('gulp-jsonmin');
var fontmin = require('fontmin');
var concat = require('gulp-concat');

var portalpaths = {
	libjs: [
		//jquery
		'bower_components/jquery/dist/jquery.min.js',
		'bower_components/jquery-ui/jquery-ui.min.js',

		//Semantic
		'bower_components/semantic/dist/semantic.min.js',


		// uikit
		'bower_components/uikit/js/uikit.min.js',
		'bower_components/uikit/js/components/parallax.min.js',
		'bower_components/uikit/js/components/slideshow.min.js',
		'bower_components/uikit/js/components/slideshow-fx.min.js',
		'bower_components/uikit/js/components/slider.min.js',
		'bower_components/uikit/js/components/tooltip.min.js',
		'bower_components/uikit/js/core/scrollspy.min.js',
		'bower_components/uikit/js/core/switcher.min.js',
		'bower_components/uikit/js/components/sticky.min.js',

		//typed js

    ],
	js:[
		//Portal js
		'resources/js/portal/portal.min.js'
	],
	css: [
		//UIKit
		'bower_components/semantic/dist/semantic.min.css',
		'bower_components/uikit/css/uikit.almost-flat.min.css',
		'bower_components/uikit/css/components/slidenav.almost-flat.min.css',
		'bower_components/uikit/css/components/slider.almost-flat.min.css',
		'bower_components/uikit/css/components/slideshow.almost-flat.min.css',
		'bower_components/uikit/css/components/dotnav.almost-flat.min.css',
		'bower_components/uikit/css/components/tooltip.almost-flat.min.css',
		'bower_components/uikit/css/components/sticky.min.css',
		
		//custom style
		'resources/css/kisikisi.styl',

		'resources/css/portal.min.css'
	]
};

// back-end
gulp.task('portal-libjsmin', function() {
  return gulp.src(portalpaths.libjs)
    .pipe(uglify())
    .pipe(concat('lib.portal.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('portal-jsmin', function() {
  return gulp.src(portalpaths.js)
    .pipe(uglify())
    .pipe(concat('portal.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('portal-cssmin', function () {
	return gulp.src(portalpaths.css)
		.pipe(stylus())
		.pipe(cssmin({processImport: false}))
		.pipe(concat('portal.min.css'))
		.pipe(gulp.dest('public/css'));
});
gulp.task('portal-watch', function() {
  gulp.watch(portalpaths.js, ['portal-jsmin']);
  gulp.watch(portalpaths.css, ['portal-cssmin']);
});
/*
gulp.task('dir-htmlmin', function(cb) {
	return gulp.src(dirpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views'))
});*/