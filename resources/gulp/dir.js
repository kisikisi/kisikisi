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

var dirpaths = {
	libjs: [
		//jquery
		'bower_components/jquery/dist/jquery.min.js',
		'bower_components/jquery-ui/jquery-ui.min.js',

		//UIKit
		'bower_components/semantic/dist/semantic.min.js',
		
    ],
	js:[
		//angular app
		'resources/js/admin/*',
		//'bower_components/AdminLTE/dist/js/pages/dashboard.js',
		'bower_components/AdminLTE/dist/js/app.min.js',
		'bower_components/AdminLTE/dist/js/demo.js',
	],
	css: [
		//UIKit
		'bower_components/semantic/dist/semantic.min.css',
		
		//custom style
		//'resources/css/kisikisi.styl'
	]
};

// back-end
gulp.task('dir-libjsmin', function() {
  return gulp.src(dirpaths.libjs)
    .pipe(uglify())
    .pipe(concat('lib.directory.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('dir-jsmin', function() {
  return gulp.src(dirpaths.js)
    .pipe(uglify())
    .pipe(concat('directory.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('dir-cssmin', function () {
	return gulp.src(dirpaths.css)
		.pipe(stylus())
		.pipe(cssmin({processImport: false}))
		.pipe(concat('directory.min.css'))
		.pipe(gulp.dest('public/css'));
});
/*
gulp.task('dir-htmlmin', function(cb) {
	return gulp.src(dirpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views'))
});*/