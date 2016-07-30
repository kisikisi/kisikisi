var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var htmlmin = require('gulp-htmlmin');
var concat = require('gulp-concat');

var newspaths = {
	html: [
		'resources/views/news/*.html'
	],
	js:[
		//angular app
		'resources/js/news/news.*',
		'resources/js/news/app.js',
	]
}

gulp.task('news-jsmin', function() {
  return gulp.src(newspaths.js)
    .pipe(include()).on('error', console.log)
    .pipe(uglify())
    .pipe(concat('news.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('news-htmlmin', function(cb) {
	return gulp.src(newspaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/news/'))
});

gulp.task('news-watch', function() {
	gulp.watch(newspaths.html, ['news-htmlmin']);
	gulp.watch(newspaths.js, ['news-jsmin']);
})
