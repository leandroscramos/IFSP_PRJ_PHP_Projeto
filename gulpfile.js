// https://www.npmjs.com/package/gulp-connect-php#examples

var gulp        = require('gulp');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var connectPHP  = require('gulp-connect-php');

var paths = {
      php:['**/*.php'],
      // Incluir quando for necessário alterar css
      // css:['*.css']
    };

gulp.task('php', function(){
    gulp.src(paths.php)
    .pipe(reload({stream:true}));
});

gulp.task('watcher',function(){
    // Incluir quando for necessário alterar css
    // gulp.watch(paths.css).on('change', function () {
    //   browserSync.reload();
    // });
    gulp.watch(paths.php).on('change', function () {
      browserSync.reload();
    });
});

gulp.task('php', function() {
  connectPHP.server({}, function (){
    browserSync({
      proxy: 'localhost/projeto'
    });
  });
});

gulp.task('default', gulp.parallel('watcher', 'php'));