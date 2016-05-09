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

		//Semantic
		'bower_components/semantic/dist/semantic.min.js',
        
        //angular
		'bower_components/angular/angular.min.js',
		'bower_components/angular-sanitize/angular-sanitize.min.js',
		'bower_components/angular-superswipe/superswipe.js',
		'bower_components/angular-touch/angular-touch.min.js',
		'bower_components/angular-resource/angular-resource.min.js',
		'bower_components/angular-ui-router/release/angular-ui-router.min.js',
		'bower_components/satellizer/satellizer.min.js',
		'bower_components/angular-environment/dist/angular-environment.min.js',
		'bower_components/angular-ui-notification/dist/angular-ui-notification.min.js',
		'bower_components/ng-tags-input/ng-tags-input.min.js',	
		'bower_components/angular-easyfb/build/angular-easyfb.min.js',	
    ],
	js:[
		//angular app
		'resources/js/directory/dir.*',
		'resources/js/directory/app.js',
	],
	css: [
		//UIKit
		'bower_components/semantic/dist/semantic.min.css',
		
		//custom style
		'resources/css/kisikisi.styl'
	],
    html: [
		'resources/views/directory/*.html'
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

gulp.task('dir-htmlmin', function(cb) {
	return gulp.src(dirpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/directory/'))
});
/*
gulp.task('dir-htmlmin', function(cb) {
	return gulp.src(dirpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views'))
});*/