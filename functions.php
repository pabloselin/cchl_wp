<?php


add_post_type_support('page', 'excerpt');

//CONSTANTS
define('CCHL_PAGEFILSA', 54798);
define('CCHL_FILSA2015', 54646);
define('CCHL_FILVINA2016', 59355);
define('CCHL_CATSFILSA', '184, 183');
define('CCHL_LINKGRATIS', 'http://camaradellibro.cl/ferias/filsa/filsa-2015/entradas-liberadas-a-filsa-2015/');

//IDS de Ferias
define('CCHL_FERIASCOMUNALES', 146);
define('CCHL_FERIASREGIONALES', 148);
define('CCHL_FERIASEXTRANJERO', 150);

define('CCHL_FERIAPLAZADEARMAS', 60131);

define('CCHL_TWITTER', 'CamaradelLibro');

register_nav_menu( 'accesos-rapidos-filsa-2015', 'Accesos Rápidos Filsa 2015' );

//Image sizes

add_theme_support( 'post-thumbnails' );
add_image_size( 'imagen-slide', 689, 300, true);
add_image_size( 'imagen-slide_home', 940, 300, true);
add_image_size('imagen_single', 670, 250, true);
add_image_size( 'imagen-270', 270, 150, true);
add_image_size( 'imagen-80', 80, 80, true);
add_image_size( 'imagen-95', 95, 95, true);
add_image_size( 'media-kit', 400, 225, true);
add_image_size( 'imagen-libro_big',130, 180, true);
add_image_size( 'imagen-libro',80, 110, true);
add_image_size( 'slide-home-600', 600, 300, true);
add_image_size( 'imagen-streaming', 280, 150, true);
add_image_size( 'afiche', 290, 550, false);

include( TEMPLATEPATH . '/inc/oldfunctions.php');
include( TEMPLATEPATH . '/inc/custom-functions.php');
include( TEMPLATEPATH . '/inc/event-functions.php');
include( TEMPLATEPATH . '/inc/scripts.php');
include( TEMPLATEPATH . '/inc/custom-tax.php');
include( TEMPLATEPATH . '/inc/function-ferias.php');
