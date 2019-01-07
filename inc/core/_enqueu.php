<?php
/**
 * [Add script]
 */

/**
 * Enqueue style
 */
function my_style() {
    wp_register_style( 'style-reveal', THEME_URL .'/dist/assets/lib'. '/reveal/css/t-scroll.min.css' , array(), true);
    wp_register_style( 'style-main', CSS_URL . '/main.css' , array(), true);

    wp_enqueue_style( 'style-reveal' );
    wp_enqueue_style( 'style-main' );
}
add_action( 'wp_enqueue_scripts',  'my_style' );


/**
 * Enqueue script
 */
function my_script() {
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' , array(), true);
    wp_register_script( 'reveal', THEME_URL .'/dist/assets/lib'. '/reveal/js/t-scroll.min.js' , array(), true);
    wp_register_script( 'pxLoader', THEME_URL .'/dist/assets/lib'. '/pxLoader/PxLoader.js' , array(), true);
    wp_register_script( 'pxLoaderImage', THEME_URL .'/dist/assets/lib'. '/pxLoader/PxLoaderImage.js' , array(), true);
    wp_register_script( 'main', JS_URL . '/bundle.js' , array(), true);
    wp_localize_script( 'main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );

    wp_enqueue_script('jquery');
    wp_enqueue_script('reveal');
    wp_enqueue_script('pxLoader');
    wp_enqueue_script('pxLoaderImage');
    wp_enqueue_script('main');
}
add_action( 'wp_enqueue_scripts', 'my_script' );
