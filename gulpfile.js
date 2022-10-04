const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const { watch, src, dest, series } = require('gulp');

function scss() {
  return src('./assets/css/**/*.scss')
    .pipe(sass())
    .pipe(dest('./assets/css/'))
}

function helloTask() {
  console.log('hello');
}

function serve() {

  browserSync.init({
      proxy: "localhost/defi_online"
  })

  gulp.watch(["*/**/*.html", "*/**/*.css", "*/**/*.twig", "*.php", "*/**/*.php"]).on("change", reload);
}

exports.build = series;

exports.default = function () {
  watch('assets/css/style.scss', scss);
  helloTask();
  serve();
}
