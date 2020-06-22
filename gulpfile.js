// =====================================================================
// project settings
// =====================================================================
const src = {
  lib: {
    js: ['assets/lib/jquery-3.5.1.min.js']
  },
  assets: {
    js: 'assets/js/**/*.js',
    css: 'assets/scss/**/*.+(scss|sass)'
  },
  dir: {
    js: 'public/js/',
    css: 'public/css/'
  }
};
// =====================================================================
// gulp packages
// =====================================================================
const gulp = require('gulp'), // gulp
  sass = require('gulp-sass'), // sass compiler
  minifyJS = require('gulp-terser'), // minification JS
  autoPref = require('gulp-autoprefixer'), // css autoprefixer
  rename = require('gulp-rename'), // rename outputs files
  delFiles = require('del'), // files delete
  cssMin = require('gulp-csso'); // minification css

// =====================================================================
// gulp tasks
// =====================================================================
//clean target directories
gulp.task('clean', () => {
  return delFiles([
    src.dir.js,
    src.dir.css
  ]);
});

// =====================================================================
// compile SASS
// compile SASS files into target css admin theme directory
gulp.task('css', () => {
  return gulp.src(src.assets.css)
    .pipe(sass())
    .pipe(autoPref())
    .pipe(cssMin())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(src.dir.css));
});

// =====================================================================
// minifine and put main.js scripts into target directories
gulp.task('js', () => {
  return gulp.src(src.assets.js)
    .pipe(minifyJS())
    .pipe(gulp.dest(src.dir.js));
});

// =====================================================================
// replace other libraries to the target directories
// output jQuery lib
gulp.task('js_lib', () => {
  return gulp.src(src.lib.js)
    .pipe(gulp.dest(src.dir.js));
});

// =====================================================================
// gulp watchers
// watch sass changes
gulp.task('watch_sass', () => {
  return gulp.watch(src.assets.css, gulp.series('css'));
});
// watch js changes
gulp.task('watch_js', () => {
  return gulp.watch(src.assets.js, gulp.series('js'));
});

// =====================================================================
// gulp default action
// =====================================================================
gulp.task('default', gulp.series(
  'clean',
  gulp.parallel(
    'css',
    'js'
  ),
  gulp.parallel('js_lib'),
  gulp.parallel(
    'watch_sass',
    'watch_js'
  )
));