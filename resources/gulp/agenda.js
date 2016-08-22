var gulp = require('gulp');
var uglify = require('gulp-uglify');
var include = require('gulp-include');
var htmlmin = require('gulp-htmlmin');
var concat = require('gulp-concat');

var agendapaths = {
	html: [
		'resources/views/agenda/*.html'
	],
	js:[
		//angular app
		'resources/js/agenda/agenda.*',
		'resources/js/agenda/app.js',
	]
}

gulp.task('agenda-jsmin', function() {
  return gulp.src(agendapaths.js)
    .pipe(include()).on('error', console.log)
    .pipe(uglify())
    .pipe(concat('agenda.min.js'))
    .pipe(gulp.dest('public/js'));
});

gulp.task('agenda-htmlmin', function(cb) {
	return gulp.src(agendapaths.html)
	    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
	    .pipe(gulp.dest('public/views/agenda/'))
});

gulp.task('agenda-watch', function() {
	gulp.watch(agendapaths.html, ['agenda-htmlmin']);
	gulp.watch(agendapaths.js, ['agenda-jsmin']);
})
