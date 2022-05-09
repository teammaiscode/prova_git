const gulp = require('gulp');
const { watch, series } = require('gulp');
const cleanCSS = require('gulp-minify-css');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const imagemin = require('gulp-imagemin');
const concat = require('gulp-concat');
const concatCss = require('gulp-concat-css');

const js_files = ['js/lightslider.js',  'js/jquery-migrate-1.2.1.min.js', 'js/bootstrap.min.js', 'js/main.js', 'fancy/*.js']
const css_files = ['css/bootstrap.min.css', 'css/lightslider.css', 'fancy/*.css', 'css/stylesheet.css', 'style.css']

function javascript(cb) {
  // body omitted
  cb();
}

function css(cb) {
  // body omitted
  cb();
}

gulp.task('minify-css', () => {
  return gulp.src(css_files)
  	.pipe(concatCss('stylesheet.concat.css'))
  	.pipe(gulp.dest('css/'))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('css/'))
    .pipe(notify({message: 'CSS Styles compilados com sucesso!'}));
});

gulp.task('minify-js', () => {
  return gulp.src(js_files)
  	.pipe(concat('concat.js'))
  	.pipe(gulp.dest('js/'))
  	.pipe(uglify())
  	.pipe(rename({ suffix: '.min' }))
  	.pipe(gulp.dest('js/'))
  	.pipe(notify({message: 'JS Scripts compilados com sucesso!'}));
});

// Task for watching
exports.default = function() {
  watch('css/stylesheet.css', series(css, 'minify-css'));
  watch('js/main.js', series(javascript, 'minify-js'));

  gulp.src('img/*')
      .pipe(imagemin())
      .pipe(gulp.dest('/img'));
};