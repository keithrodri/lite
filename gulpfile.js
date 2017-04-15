var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var minifyCSS = require('gulp-minify-css');




// sass + autoprefixer + minifiy css
gulp.task('styles', function() {
    gulp.src('./sass/style.scss')
        .pipe(sass())
        // lets me fix errors and save to refresh gulp
        .on('error', console.error.bind(console))
        .pipe(autoprefixer({
          browsers: ['last 5 versions']
        }))
        //minifies css
        .pipe(minifyCSS({
          keepBreaks: true
        }))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({stream: true}));
});

//susy
gulp.task('susy', function() {
    return gulp.src('./sass/style.scss')
      .pipe(sass({
          includePaths: ['node_modules/susy/sass']
      }).on('error', sass.logError))
      .pipe(gulp.dest('./'))
      // .pipe(browserSync.reload({stream: true}));

});

//broswer synce
gulp.task('serve', function () {

  browserSync.init({
    proxy: "localhost:8888/rodri_1/",
    notify: true,
    ghostMode: false
  });

  gulp.watch('./sass/**/*.scss', ['styles']);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
});




// task arrays

gulp.task('default', ['styles', 'serve']);


gulp.task('mssusy', ['styles', 'susy', 'serve']);
