//gulp file for all front-end

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
	images: [
		'resources/img/*',
		'resources/img/**/*',
		//'bower_components/AdminLTE/dist/img/*'
	],
	fonts: [
		'resources/fonts/*',
		//'bower_components/font-awesome/fonts/*',
		//'bower_components/Ionicons/fonts/*',
		//'bower_components/AdminLTE/bootstrap/fonts/*',
	],
	js: [
		//jquery
		'bower_components/jquery/dist/jquery.min.js',
		//'bower_components/jquery-ui/jquery-ui.min.js',

		'bower_components/moment/moment.js',

		//Semantic
		'bower_components/semantic/dist/semantic.min.js',

		//UIKit
		'bower_components/uikit/js/uikit.min.js',
		'bower_components/uikit/js/core/modal.min.js',
		'bower_components/uikit/js/components/sticky.min.js',
		//'bower_components/uikit/js/components/tooltip.min.js',

        //angular
		'bower_components/angular/angular.min.js',
		'bower_components/angular-sanitize/angular-sanitize.min.js',
		'bower_components/angular-superswipe/superswipe.js',
		'bower_components/angular-touch/angular-touch.min.js',
		'bower_components/angular-resource/angular-resource.min.js',
		'bower_components/angular-ui-router/release/angular-ui-router.min.js',
		'bower_components/angular-cookies/angular-cookies.min.js',
		'bower_components/satellizer/satellizer.min.js',
		'bower_components/angular-environment/dist/angular-environment.min.js',
		'bower_components/angular-ui-notification/dist/angular-ui-notification.min.js',
		'bower_components/ng-tags-input/ng-tags-input.min.js',
		'bower_components/angular-easyfb/build/angular-easyfb.min.js',
		'bower_components/ngInfiniteScroll/build/ng-infinite-scroll.min.js',
		'bower_components/angular-ui-calendar/src/calendar.js',
		'bower_components/fullcalendar/dist/fullcalendar.min.js',
		'bower_components/fullcalendar/dist/gcal.js',
		'bower_components/angular-validation-match/dist/angular-validation-match.min.js',
		'resources/js/satellizer-storage-decorator.js',
    ],
	less: [
		'resources/assets/uikit.less',
	],
	css: [
		//Semantic
		'bower_components/semantic/dist/semantic.min.css',

		//uikit
		'resources/css/less.css',
		'bower_components/uikit/css/components/sticky.min.css',
		//'bower_components/uikit/css/components/tooltip.min.css',

		'bower_components/hint.css/hint.min.css',
		'bower_components/hint.css/hint.base.min.css',
		'bower_components/fullcalendar/dist/fullcalendar.css',
		'bower_components/angular-ui-notification/dist/angular-ui-notification.min.css',

		//fonts
		'public/fonts/anagram.css',
		'public/fonts/Folks-Bold.css',
		'public/fonts/Folks-Normal.css',
		'public/fonts/GlacialIndifference-Regular.css',

		//custom style
		'resources/css/kisikisi.styl'
	],
	html: [
		'resources/views/partial/*.html'
	]
};

gulp.task('imagemin', function() {
  return gulp.src(paths.images)
    .pipe(imagemin({ progressive: true }))
    .pipe(gulp.dest('public/img'));
});

gulp.task('fontmin', function() {
  fontmin().src(paths.fonts)
    .use(fontmin.otf2ttf())
    .use(fontmin.ttf2woff())
    .use(fontmin.ttf2eot())
    .use(fontmin.ttf2svg())
  	.use(fontmin.css({
        fontPath: '../fonts/'
    }))
  	.dest('public/fonts')
    .run();
});

gulp.task('jsmin', function() {
  return gulp.src(paths.js)
    .pipe(uglify())
    .pipe(concat('kisikisi.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('less', function () {
  return gulp.src(paths.less)
    .pipe(less())
	.pipe(concat('less.css'))
    .pipe(gulp.dest('resources/css'));
});

gulp.task('cssmin', function () {
	return gulp.src(paths.css)
		.pipe(stylus())
		.pipe(cssmin({processImport: false}))
		.pipe(concat('kisikisi.min.css'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('htmlmin', function(cb) {
	return gulp.src(paths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/partial/'))
});

gulp.task('watch', function() {
  gulp.watch(paths.js, ['jsmin']);
  gulp.watch(paths.css, ['cssmin']);
  gulp.watch(paths.html, ['htmlmin']);
});

/*
gulp.task('htmlmin', function(cb) {
	return gulp.src(paths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views'))
});*/
