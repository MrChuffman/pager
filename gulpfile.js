var gulp = require('gulp'),
    watch = require('gulp-watch'),
    notify = require('gulp-notify'),
    postcss = require('gulp-postcss'),
    stylus = require('gulp-stylus'),
    colorguard = require('gulp-colorguard'),
    autoprefixer = require('autoprefixer'),
    doiuse = require('doiuse'),

    phpunit = require('gulp-phpunit');

var sources = {
	stylus: './resources/assets/stylus/**/*.styl',
    test: ['./tests/**/*.php','./resources/**/*.*','./app/**/*.*']
}

gulp.task('buildCSS', function () {
    var postCSSProcessors = [
        autoprefixer({
            browsers: ['last 1 version']
        }),
        doiuse({
            browsers: [
                'ie >= 9'
            ]
        })
    ];

    return gulp.src('./resources/assets/stylus/pager.styl')
        .pipe(stylus()).on('error', handleError)
        .pipe(postcss(postCSSProcessors)).on('error', handleError)
        .pipe(colorguard({
            logOk: true
        })).on('error', handleError)
        .pipe(gulp.dest('./public/css')).on('error', handleError)
        .pipe(notify('CSS Build is complete!'));
});

gulp.task('testPHPUnit', function() {
	gulp.src('')
	    .pipe(phpunit('', {clear: true}));
});

gulp.task('watch', ['buildCSS'], function() {
	gulp.watch(sources.stylus, ['buildCSS']);
});

gulp.task('test', ['testPHPUnit'], function() {
	gulp.watch(sources.test, ['testPHPUnit']);
});





function handleError(err) {
    console.log(err.toString());

    this.emit('end');

    console.log('');
    console.log('######################################## ######################################## ########################################');
    console.log('######################################## Uh Oh! Looks like something went wrong! ########################################');
    console.log('######################################## ######################################## ########################################');
}
