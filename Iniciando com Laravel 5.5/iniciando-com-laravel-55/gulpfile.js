// Gravamos as dependencias do gulp em variaveis
const gulp 		= require('gulp');             // Pacote do gulp
const sass 		= require('gulp-sass');        // Pacote do compilador do sass para o Gulp
const minifyCSS = require('gulp-csso');        // Pacote do minificador de css para o Gulp
const concat 	= require('gulp-concat');      // Pacote para concatenar arquivos com o Gulp
const uglify 	= require('gulp-uglify');      // Pacote para "enfeiar" o código e deixar ilegivel
const babel     = require('gulp-babel');       // Pacote para utilizar ES6 sem problema de compatibilidade
const minify    = require("gulp-babel-minify");
const wait      = require('gulp-wait');
const imagemin  = require('gulp-imagemin');

/**
 * Criamos um objeto com os caminhos dos arquivos que o gulp irá procurar
 * Tendo o caminho dos arquivos scss na propriedade style e os arquivos js na
 * propriedade scripts, desde o nosso scrip até outras bibliotecas
 */
const paths = {
    styles: [
        'dev/styles/scss/*.sass',
         'dev/styles/scss/*.scss'
    ],
    scripts: {
        js: [
            './dev/js/script.js',
            'dev/js/*.js'
        ],
        angular: [
            './dev/app/app.js',
            './dev/app/controllers.js',
            './node_modules/angular/angular.min.js',
        ],

        dependencies:[
            './node_modules/jquery/dist/jquery.min.js',
        ]
    },
    images:[
        './dev/imagens/*'
    ]
};
    gulp.task('default', ['styles', 'dependencies', 'js', 'angular']);

    gulp.task('styles', function () {
    return gulp.src(paths.styles)
        .pipe(sass({includePaths: ['./dev/styles/scss'], errLogToConsole: true })) // Gulp irá rodar o sass incluindo os caminhos da pasta /scss como import
        .pipe(sass.sync({outputStyle: 'compressed', errLogToConsole: true}))
        .pipe(concat('style.css'))  // Irá concatenar os arquivos e gerar um arquivo style.css
        .pipe(minifyCSS())          // Irá minificar o css assim que compilado
        .pipe(gulp.dest('./dist/css/'));
    });
   
    gulp.task('js', () => {
        return gulp.src(paths.scripts.js) // Arquivo(s) que o gulp irá procurar na tarefa
            .pipe(babel({
                presets: ['env']
            }))
            .pipe(minify())               // Gulp irá deixar o código ilegivel dificultando cópias
            .pipe(concat('script.min.js'))// Irá concatenar os arquivos e gerar um arquivo script.min.js
            .pipe(gulp.dest('./dist/js/'));         // Irá salvar na raiz do tema
    });

    gulp.task('dependencies', () => {
        return gulp.src(paths.scripts.dependencies) // Arquivo(s) que o gulp irá procurar na tarefa
            .pipe(babel({
                presets: ['env']
            }))
            .pipe(concat('dependencies.min.js'))// Irá concatenar os arquivos e gerar um arquivo script.min.js
            .pipe(gulp.dest('./dist/js/'));         // Irá salvar na raiz do tema
    });

    gulp.task('img', () => {
        return gulp.src('./dev/imagens/*')
            .pipe(imagemin())
            .pipe(gulp.dest('dist/images'))
        }); 
 
    gulp.task('watch', () => {
        gulp.watch(paths.styles, ['styles']);
        gulp.watch(paths.scripts.js, ['js']);
        gulp.watch(paths.scripts.angular,['angular']);
    });