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

var backpaths = {

	libjs: [
		//jquery
		'bower_components/jquery/dist/jquery.min.js',
		'bower_components/jquery-ui/jquery-ui.min.js',

		//UIKit
		//'bower_components/uikit/js/components/notify.js',

		//adminLTE
		'bower_components/AdminLTE/bootstrap/js/bootstrap.min.js',
		'bower_components/AdminLTE/plugins/morris/morris.min.js',
		'bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js',
		'bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
		'bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
		'bower_components/AdminLTE/plugins/knob/jquery.knob.js',
		'bower_components/moment/moment.js',
		'bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js',
		'bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
		//'bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
		'bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
		'bower_components/AdminLTE/plugins/fastclick/fastclick.js',


		//angular
		'bower_components/angular/angular.min.js',
		'bower_components/angular-sanitize/angular-sanitize.min.js',
		'bower_components/angular-superswipe/superswipe.js',
		'bower_components/angular-touch/angular-touch.min.js',
		'bower_components/angular-resource/angular-resource.min.js',
		'bower_components/angular-ui-router/release/angular-ui-router.min.js',
		'bower_components/satellizer/satellizer.min.js',
		'bower_components/angularUtils-pagination/dirPagination.js',
		'bower_components/angular-xeditable/dist/js/xeditable.min.js',
		'bower_components/angular-environment/dist/angular-environment.min.js',
		'bower_components/angular-ui-notification/dist/angular-ui-notification.min.js',
		'bower_components/ng-file-upload/ng-file-upload.min.js',
		'bower_components/ng-tags-input/ng-tags-input.min.js',
		'bower_components/angular-bootstrap-toggle-switch/angular-toggle-switch.min.js',
		'bower_components/textAngular/dist/textAngular-rangy.min.js',
		'bower_components/textAngular/dist/textAngular-sanitize.min.js',
		'bower_components/textAngular/dist/textAngular.min.js',

        //other module

	],
	js:[
		//angular app
		'resources/js/admin/*',
		//'bower_components/AdminLTE/dist/js/pages/dashboard.js',
		'bower_components/AdminLTE/dist/js/app.js',
		//'bower_components/AdminLTE/dist/js/demo.js',
	],
	css: [
		//UIKit
		'bower_components/uikit/css/components/notify.min.css',

		//adminLTE
		'bower_components/AdminLTE/bootstrap/css/bootstrap.min.css',
		'bower_components/font-awesome/css/font-awesome.min.css',
		'bower_components/Ionicons/css/ionicons.min.css',
		'bower_components/AdminLTE/dist/css/AdminLTE.min.css',
		'bower_components/AdminLTE/dist/css/skins/_all-skins.min.css',
		'bower_components/AdminLTE/plugins/iCheck/flat/blue.css',
		'bower_components/AdminLTE/plugins/morris/morris.min.css',
		/*'bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.css',*/
		'bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
		'bower_components/AdminLTE/plugins/datepicker/datepicker3.css',
		'bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css',
		//'bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',

		//angular directive
		'bower_components/angular-xeditable/dist/css/xeditable.min.css',
		'bower_components/angular-ui-notification/dist/angular-ui-notification.min.css',
		'bower_components/ng-tags-input/ng-tags-input.min.css',
		'bower_components/ng-tags-input/ng-tags-input.bootstrap.min.css',
		'bower_components/angular-bootstrap-toggle-switch/style/bootstrap3/angular-toggle-switch-bootstrap-3.css',
		'bower_components/textAngular/dist/textAngular.css',

		//custom style
		'resources/css/kisikisi.styl'
	],
	html: [
		'resources/views/**/*.html'
	],
	htmlpublic: [
		'public/*.html',
		'public/views/**/*.html'
	],
	json: [
		'resources/json/*.json'
	]
};

// back-end
gulp.task('back-libjsmin', function() {
  return gulp.src(backpaths.libjs)
    .pipe(uglify())
    .pipe(concat('lib.admin.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('back-jsmin', function() {
  return gulp.src(backpaths.js)
    .pipe(uglify())
    .pipe(concat('admin.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('back-cssmin', function () {
	return gulp.src(backpaths.css)
		.pipe(stylus())
		.pipe(cssmin({processImport: false}))
		.pipe(concat('admin.min.css'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('back-htmlmin', function(cb) {
	return gulp.src(backpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views'))
});

/*gulp.task('back-include', ['htmlmin'], function() {
	return gulp.resource('resource/index.html')
	    .pipe(include())
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true }))
	    .pipe(gulp.dest('public'))
});*/

gulp.task('back-jsonmin', function () {
    return gulp.src(backpaths.json)
        .pipe(jsonmin())
        .pipe(gulp.dest('public/json'));
});

gulp.task('back-watch', function() {
  gulp.watch(backpaths.js, ['back-jsmin']);
  gulp.watch(backpaths.css, ['back-cssmin']);
  gulp.watch(backpaths.html, ['back-htmlmin']);
});
