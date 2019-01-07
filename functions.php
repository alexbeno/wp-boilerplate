<?php
define( 'THEME_PATH' ,          get_template_directory()                  );
// define( 'TEMPLATE_PATH' ,       THEME_PATH .    '/templates'              );
define( 'THEME_URL' ,           get_template_directory_uri()        );
define( 'CSS_URL' ,             THEME_URL .    '/dist/assets/stylesheet/'  );
define( 'IMAGES_URL' ,          THEME_URL .    '/dist/assets/image/'       );
define( 'JS_URL' ,              THEME_URL .    '/dist/assets/javascript/'  );

// LOADING CORE FILES
$folders = array( 'core', 'postType', 'function', 'ajax' );
foreach ($folders as $folder) {
    foreach ( glob( THEME_PATH . "/inc/$folder/*.php" ) as $file ) {
        include_once $file;
    }
}

