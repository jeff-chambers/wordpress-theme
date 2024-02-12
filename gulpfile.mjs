import gulp from 'gulp';
import browserSyncLib from 'browser-sync';
import plumber from 'gulp-plumber';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import gulpSass from 'gulp-sass';
import sassModule from 'sass';
import autoPrefixer from 'gulp-autoprefixer';
import cssComb from 'gulp-csscomb';
import cmq from 'gulp-merge-media-queries';
import cleanCss from 'gulp-clean-css';
import uglify from 'gulp-uglify';

const sass = gulpSass(sassModule);
const { src, dest, watch, series, task } = gulp;
const browserSync = browserSyncLib.create();

task('sass', function() {
    return src(['css/src/**/*.scss'])
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoPrefixer())
        .pipe(cssComb())
        .pipe(cmq({ log: true }))
        .pipe(dest('css/dist'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCss())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('css/dist'))
        .pipe(browserSync.stream());
});

task('js', function() {
    return src(['js/src/**/*.js'])
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(dest('js/dist'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(dest('js/dist'))
        .pipe(browserSync.stream());
});

task('html', function() {
    return src(['html/**/*.html'])
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(dest('./'))
        .pipe(browserSync.stream());
});

task('default', function() {
    browserSync.init({
        // Update Local Wordpress URL Here
        proxy: "",
        notify: false
    });
    watch('js/src/**/*.js', series('js'));
    watch('css/src/**/*.scss', series('sass')); // Changed here as well
    watch('html/**/*.html', series('html'));
});
