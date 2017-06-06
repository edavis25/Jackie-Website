var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

// Paths for scripts
var prettyFiles = 'js/**/*.js';
var destination = 'js/';

gulp.task('script', function() {
   return gulp.src([prettyFiles, '!js/jackie-minimized.min.js'])     // Ignore the concated file
       .pipe(concat('jackie-minimized.min.js'))
       .pipe(gulp.dest(destination))
       .pipe(uglify())
       .pipe(gulp.dest(destination));
});

