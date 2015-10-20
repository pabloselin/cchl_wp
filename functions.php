<?php


add_post_type_support('page', 'excerpt');

//CONSTANTS
define('CCHL_PAGEFILSA', 54798);
define('CCHL_FILSA2015', 54646);
define('CCHL_CATSFILSA', '184, 183');

register_nav_menu( 'accesos-rapidos-filsa-2015', 'Accesos Rápidos Filsa 2015' );

include( TEMPLATEPATH . '/inc/oldfunctions.php');
include( TEMPLATEPATH . '/inc/custom-functions.php');
include( TEMPLATEPATH . '/inc/event-functions.php');
include( TEMPLATEPATH . '/inc/scripts.php');
include( TEMPLATEPATH . '/inc/custom-tax.php');