<?php
/**
 * [Bo modification]
 */

/*start footer message */

function remove_footer_admin () {
echo "Another wonderful flinked theme";
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*end footer message*/

/*activer les image a la une*/

add_theme_support( 'post-thumbnails' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

function register_my_menu() {
  register_nav_menu('main-menu','Main menu' );
}
add_action( 'init', 'register_my_menu');

define( ‘WP_POST_REVISIONS’, false );


function remove_menus(){

	global $user_ID;

	if($user_ID !== 1) {
		//general
	  remove_menu_page( 'edit.php' );                   //Posts
	  remove_menu_page( 'edit-comments.php' );          //Comments
	  // remove_menu_page( 'themes.php' );                 //Appearance
	  remove_menu_page( 'plugins.php' );                //Plugins
	  remove_menu_page( 'tools.php' );                  //Tools
	  remove_menu_page( 'options-general.php' );        //Settings

	  //plugin
	  remove_menu_page( 'edit.php?post_type=acf-field-group' );    //ACF
	}
}
add_action( 'admin_init', 'remove_menus' );

add_filter( 'gform_confirmation_anchor', '__return_false' );

