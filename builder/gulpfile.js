/**
 * Dependencies
 */
let gulp         = require( 'gulp' ),
    browserify   = require( 'browserify' ),
    babelify     = require( 'babelify' ),
    source       = require( 'vinyl-source-stream' ),
    buffer       = require( 'vinyl-buffer' ),
    gulp_clean   = require( 'gulp-clean' ),
    gulp_sass    = require( 'gulp-sass' ),
    gulp_cssnano = require( 'gulp-cssnano' ),
    gulp_uglify  = require( 'gulp-uglify' ),
    gulp_notify  = require( 'gulp-notify' ),
    sourcemaps   = require( 'gulp-sourcemaps' ),
    watchify     = require( 'watchify' );
    bulkSass     = require('gulp-sass-bulk-import');

/**
 * Params
 */

/**
 * Scripts bundle
 */
let bundler = null

const bundle = function()
{
    bundler.bundle()
        .on( 'error', gulp_notify.onError( { title: 'Gulp: scripts' } ) )
        .pipe( source( 'bundle.js' ) )
        .pipe( buffer() )
        .pipe( sourcemaps.init( { loadMaps: true } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( '../dist/assets/javascript' ) )
        .pipe( gulp_notify( { title: 'Gulp: scripts', message: 'success' } ) )
}

/**
 * Scripts
 */
gulp.task( 'scripts', function()
{
    // Create bundler
    bundler = browserify( {
            cache       : {},
            packageCache: {},
            entries     : '../sources/javascript/index.js',
            debug       : true,
            paths       : [ './node_modules', '../sources/javascript' ]
        } )
        .transform( 'babelify', { presets: [ 'babel-preset-es2015' ].map( require.resolve ) } )

    // Watch
    bundler.plugin( watchify )

    // Listen to bundler update
    bundler.on( 'update', bundle )

    // Bundle
    bundle()
})

/**
 * Styles
 */
gulp.task( 'styles', function()
{
    return gulp.src( '../sources/sass/main.scss' )
        .pipe(bulkSass())
        .pipe( gulp_sass( {
            compress: false
        } ) )
        .on( 'error', gulp_notify.onError( { title: 'Gulp: styles' } ) )
        .pipe( sourcemaps.init( { loadMaps: true } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( '../dist/assets/stylesheet' ) )
        .pipe( gulp_notify( { title: 'Gulp: styles', message: 'success' } ) )
} )


/**
 * Build
 */
gulp.task( 'build-scripts', function()
{
    return gulp.src( '../dist/assets/javascript/bundle.js' )
        .pipe( gulp_uglify() )
        .pipe( gulp.dest( '../dist/assets/javascript' ) )
} )

gulp.task( 'build-styles', function()
{
    return gulp.src( '../dist/assets/stylesheet/main.css' )
        .pipe( gulp_cssnano() )
        .pipe( gulp.dest( '../dist/assets/stylesheet' ) )
} )

gulp.task( 'remove-maps', function()
{
    return gulp.src( [ '../dist/assets/javascript/bundle.js.map', '../dist/assets/stylesheet/main.css.map' ] )
        .pipe( gulp_clean( { force: true, read: false } ) )
} )

gulp.task( 'build', [ 'build-scripts', 'build-styles', 'remove-maps' ], function()
{
    return gulp.src( './' )
        .pipe( gulp_notify( {
            title  : 'Gulp: build',
            message: 'success'
        } ) )
} )

/**
 * Default
 */
gulp.task( 'default', function()
{
    // Scripts
    gulp.start( 'scripts' )

    // Styles
    gulp.start( 'styles' )
    gulp.watch( '../sources/sass/**', [ 'styles' ] )
} )
