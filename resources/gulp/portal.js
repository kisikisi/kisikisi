var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var imagemin = require('gulp-imagemin');
var cssmin = require('gulp-cssmin');
var stylus = require('gulp-stylus');
var less = require('gulp-less');
var htmlmin = require('gulp-htmlmin');
var jsonmin = require('gulp-jsonmin');
var fontmin = require('fontmin');
var concat = require('gulp-concat');

var paths = {
	libjs: [
		//jquery
		'bower_components/jquery/dist/jquery.min.js',

		//Semantic
		'bower_components/semantic/dist/semantic.min.js',

		// uikit
		'bower_components/uikit/js/uikit.min.js',
		/*'bower_components/uikit/js/components/slideshow.min.js',*/
		'bower_components/uikit/js/core/scrollspy.min.js',
		/*'bower_components/uikit/js/core/switcher.min.js',*/
		'bower_components/uikit/js/components/sticky.min.js',

		//typed js

    ],
	js:[
		//Portal js
		'resources/js/portal/portal.min.js'
	],
	less: [
		'resources/assets/semantic.less'
	],
	css: [

		//fonts
		'public/fonts/anagram.css',
		/*'public/fonts/Folks-Bold.css',
		'public/fonts/Folks-Normal.css',
		'public/fonts/GlacialIndifference-Regular.css',*/
		'resources/css/portal.less.css',
		'bower_components/uikit/css/uikit.almost-flat.min.css',
		'bower_components/uikit/css/components/sticky.min.css',
		'bower_components/hint.css/hint.min.css',
		'bower_components/hint.css/hint.base.min.css',
	
		'resources/css/portal.styl'
	]
};

gulp.task('portal-libjsmin', function() {
  return gulp.src(paths.libjs)
    .pipe(uglify())
    .pipe(concat('lib.portal.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('portal-jsmin', function() {
  return gulp.src(paths.js)
    .pipe(uglify())
    .pipe(concat('portal.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('portal-less', function () {
  return gulp.src(paths.less)
    .pipe(less())
	.pipe(concat('portal.less.css'))
    .pipe(gulp.dest('resources/css'));
});

gulp.task('portal-cssmin', function () {
	return gulp.src(paths.css)
		.pipe(stylus())
		.pipe(cssmin({processImport: false}))
		.pipe(concat('portal.min.css'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('portal-watch', function() {
  gulp.watch(paths.js, ['portal-jsmin']);
  gulp.watch(paths.css, ['portal-cssmin']);
});
/*
gulp.task('dir-htmlmin', function(cb) {
	return gulp.src(dirpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views'))
});*/
