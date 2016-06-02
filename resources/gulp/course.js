var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var htmlmin = require('gulp-htmlmin');
var concat = require('gulp-concat');

var coursepaths = {
	html: [
		'resources/views/course/*.html'
	],
	js:[
		//angular app
		'resources/js/course/course.*',
		'resources/js/course/app.js',
	]
}

gulp.task('course-jsmin', function() {
  return gulp.src(coursepaths.js)
    .pipe(uglify())
    .pipe(concat('course.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('course-htmlmin', function(cb) {
	return gulp.src(coursepaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/course/'))
});

gulp.task('course-watch', function() {
	gulp.watch(coursepaths.html, ['course-htmlmin']);
	gulp.watch(coursepaths.js, ['course-jsmin']);
})
