var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var htmlmin = require('gulp-htmlmin');
var concat = require('gulp-concat');

var dirpaths = {
	html: [
		'resources/views/directory/*.html'
	],
	js:[
		//angular app
		'resources/js/directory/dir.*',
		'resources/js/directory/app.js',
	]
}

gulp.task('dir-jsmin', function() {
  return gulp.src(dirpaths.js)
  	.pipe(include()).on('error', console.log)
    .pipe(uglify())
    .pipe(concat('directory.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('dir-htmlmin', function(cb) {
	return gulp.src(dirpaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/directory/'))
});

gulp.task('dir-watch', function() {
	gulp.watch(dirpaths.html, ['dir-htmlmin']);
	gulp.watch(dirpaths.js, ['dir-jsmin']);
})
