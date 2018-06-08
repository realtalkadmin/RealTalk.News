/*jslint node:true */

'use strict';

var gulp 		= require('gulp'),
	del 		= require('del'),
	concat 		= require('gulp-concat'),
	rename 		= require('gulp-rename'),
	uglify 		= require('gulp-uglify'),
	sass 		= require('gulp-sass'),
	csso 		= require('gulp-csso'),
	watch 		= require('gulp-watch'),
	livereload 	= require('gulp-livereload');


gulp.task('styles', function() {
	return gulp.src('src/sass/*.scss')
		.pipe(sass({outputStyle: 'compressed', unix_newlines: true}).on('error', sass.logError))
		.pipe(rename("theme.min.css"))
		.pipe(gulp.dest('assets/css'));
});

gulp.task('styles-optional', function() {
	return gulp.src('src/sass/*.scss')
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(rename("theme.css"))
		.pipe(gulp.dest('assets/css'));
});

gulp.task('scripts', function() {
	return gulp.src(['src/js/plugins/*.js', 'src/js/base.js'])
		.pipe(uglify())
		.pipe(concat('theme.min.js'))
		.pipe(gulp.dest('assets/js'));
});


gulp.task('default', function() {
	gulp.start('styles', 'styles-optional', 'scripts', 'watch');
});


gulp.task('watch', function() {
	gulp.watch('src/sass/*.scss', ['styles', 'styles-optional']);
	gulp.watch('src/js/*.js', ['scripts']);
	livereload.listen();
	gulp.watch(['*']).on('change', livereload.changed);
});
