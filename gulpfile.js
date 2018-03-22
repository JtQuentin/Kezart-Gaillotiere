var json = require('json-file');
var theme_name = json.read('./package.json').get('themeName');

var gulp = require('gulp');

var theme_admin = './dev/admin';
var theme_source = './dev/theme';
var theme_scss = './dev/scss';
var theme_js = './dev/js';
var theme_fonts = './dev/fonts';
var theme_img = './dev/img';
var theme_library = './dev/library';
var theme_destination = './wordpress/wp-content/themes/' + theme_name;

// notify
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var plumberErrorHandler = { errorHandler: notify.onError({
        title: 'Gulp',
        message: 'Error: <%= error.message %>'
    })
};

// init server & watch files
var browserSync = require('browser-sync').create();

function reload(done) {
    browserSync.reload();
    done();
}

function server(done) {
    browserSync.init({
        proxy: 'http://localhost:8888/wordpress/',
        ghostMode: {
            scroll: true,
            links: true,
            forms: true
        }
    });
    done();
}

const watch = () => gulp.watch([theme_source + '/**/*.php', theme_scss + '/**/*.scss', theme_js + '/**/*.js', theme_admin + '/**/*', theme_library + '/**/*'], gulp.series('clean', 'dev-sass', 'js', 'admin', 'copy', 'wp', 'img', reload));

// compile sass files
// concat & minify & autoprefixer css files
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var cleancss = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var sassGlob = require('gulp-sass-glob');
var autoprefixer = require('gulp-autoprefixer');
gulp.task('dev-sass', function () {
    return gulp.src(theme_scss + '/main.scss')
        .pipe(sassGlob())
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: true
        }))
        .pipe(cleancss())
        .pipe(concat('theme.min.css'))
        .pipe(sourcemaps.write('/map'))
        .pipe(gulp.dest(theme_destination + '/assets/css'));
});

gulp.task('prod-sass', function () {
    return gulp.src(theme_scss + '/main.scss')
        .pipe(sassGlob())
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: true
        }))
        .pipe(cleancss())
        .pipe(concat('theme.min.css'))
        .pipe(gulp.dest(theme_destination + '/assets/css'));
});

// concat & minify js files
var uglify = require('gulp-uglify');
gulp.task('js', function () {
    return gulp.src(theme_js + '/**/*.js')
        .pipe(uglify())
        .pipe(concat('theme.min.js'))
        .pipe(gulp.dest(theme_destination + '/assets/js'));
});

// admin
var fs = require('fs');
var path = require('path');
var clip = require('gulp-clip-empty-files');

function getFolders(dir) {
    return fs.readdirSync(dir)
    .filter(function(file) {
        return fs.statSync(path.join(dir, file)).isDirectory();
    });
}

gulp.task('admin', function(done) {
    var folders = getFolders(theme_admin);

    folders.map(function(folder) {
        gulp.src(path.join(theme_admin, folder, '/**/*.scss'))
            .pipe(clip())
            .pipe(sassGlob())
            .pipe(plumber(plumberErrorHandler))
            .pipe(sass({outputStyle: 'expanded'}))
            .pipe(autoprefixer({
                browsers: ['last 4 versions'],
                cascade: true
            }))
            .pipe(cleancss())
            .pipe(concat(folder + '.min.css'))
            .pipe(gulp.dest(theme_destination + '/assets/admin/'));

        gulp.src(path.join(theme_admin, folder, '/**/*.js'))
            .pipe(clip())
            .pipe(uglify())
            .pipe(concat(folder + '.min.js'))
            .pipe(gulp.dest(theme_destination + '/assets/admin/'));
    });

    return done();
 });

// watch & copy all files
var replace = require('gulp-replace');
gulp.task('copy', function() {
    gulp.src(theme_source + '/**/*')
        .pipe(gulp.dest(theme_destination));

    gulp.src(theme_fonts + '/**/*')
        .pipe(gulp.dest(theme_destination + '/assets/fonts'));

    return gulp.src(theme_library + '/**/*')
        .pipe(gulp.dest(theme_destination + '/assets/library'));
});

gulp.task('wp', function() {
    gulp.src(theme_source + '/style.css')
        .pipe(replace('Theme Name: Theme', 'Theme Name: '+ theme_name))
        .pipe(gulp.dest(theme_destination));

    return gulp.src(theme_scss + '/editor-style.scss')
        .pipe(sassGlob())
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: true
        }))
        .pipe(cleancss())
        .pipe(concat('editor-style.css'))
        .pipe(gulp.dest(theme_destination + '/assets/css'));
});

// optimization images
var imagemin = require('gulp-imagemin');
gulp.task('img', function (done) {
    gulp.src(theme_destination + '/assets/img', {read: false, allowEmpty: true})
        .pipe(clean(done));

    return gulp.src(theme_img + '/**/*')
        .pipe(imagemin({
            interlaced: true,
            progressive: true,
            optimizationLevel: 5,
            svgoPlugins: [{removeViewBox: true}]
        }))
        .pipe(gulp.dest(theme_destination + '/assets/img'));
});

// delete theme folder
var clean = require('gulp-clean');
gulp.task('clean', function (done) {
    return gulp.src(theme_destination, {read: false, allowEmpty: true})
        .pipe(clean(done));
});

// clear cache
var cache = require('gulp-cache');
gulp.task('cache', function (done) {
    return cache.clearAll(done);
});

// command
gulp.task('dev', gulp.series('clean', 'dev-sass', 'js', 'admin', 'copy', 'wp', 'img', server, watch));
gulp.task('prod', gulp.series('clean', 'prod-sass', 'js', 'admin', 'copy', 'wp', 'img'));
