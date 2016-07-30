var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var htmlmin = require('gulp-htmlmin');
var concat = require('gulp-concat');

var scholarshippaths = {
	html: [
		'resources/views/scholarship/*.html'
	],
	js:[
		//angular app
		'resources/js/scholarship/scholarship.*',
		'resources/js/scholarship/app.js',
	]
}

gulp.task('scholarship-jsmin', function() {
  return gulp.src(scholarshippaths.js)
    .pipe(include()).on('error', console.log)
    .pipe(uglify())
    .pipe(concat('scholarship.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('scholarship-htmlmin', function(cb) {
	return gulp.src(scholarshippaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/scholarship/'))
});

gulp.task('scholarship-watch', function() {
	gulp.watch(scholarshippaths.html, ['scholarship-htmlmin']);
	gulp.watch(scholarshippaths.js, ['scholarship-jsmin']);
})
