<?php


add_post_type_support('page', 'excerpt');

//CONSTANTS FILSA
define( 'CCHL_VERSION', '0.2.2');

define( 'CCHL_PAGEFILSA', 54798 );
define( 'CCHL_FILSAHOME', 108 );

define( 'CCHL_CATSFILSA', '184, 183' );
define( 'CCHL_CATSFILSA2016', '199, 209, 210' );
define( 'CCHL_FILSA2016_EVENTCAT', 208);

define( 'CCHL_FILSA2016', 60799 );
define( 'CCHL_FILSA2015', 54646 );
define( 'CCHL_FILSA2013', 24556 );
define( 'CCHL_FILSA2014', 31817 );
define( 'CCHL_FILSA2012', 24568 );

define( 'CCHL_FILVINA2016', 59355 );
define( 'CCHL_FILVINA2017', 65835 );
define( 'CCHL_CATSFILVINA2017', '292');

define('CCHL_LINKGRATIS', 'https://camaradellibro.cl/ferias/filsa/filsa-2015/entradas-liberadas-a-filsa-2015/');

//IDS de Ferias
define('CCHL_FERIASCOMUNALES', 146);
define('CCHL_FERIASREGIONALES', 148);
define('CCHL_FERIASEXTRANJERO', 150);

//Categorías multimedias ferias
define('CCHL_MULTIMEDIA', 17);
define('CCHL_FLPA2016', 201);
define('CCHL_FILIJ2016', 200);

define('CCHL_PAGEFLPA2016', 60131);
define('CCHL_PAGEFILIJ2016', 60494);

define('CCHL_FERIAPLAZADEARMAS', 60131);
define('CCHL_FLPA2017', 66240);

//Redes Sociales
define('CCHL_TWITTER', 'CamaradelLibro');
define('CCHL_FACEBOOK', 'https://www.facebook.com/camarachilenalibro');
define('CCHL_FACEBOOKFILSA', 'https://www.facebook.com/filsachile');

register_nav_menus( array(
	//Históricos ferias
	'historico-filsa'			 	 => 'Históricos Filsa',
	'historico-filij'				 => 'Histórico FILIJ',
	'historico-fil'					 => 'Histórico FIL',
	'historico-flpa'				 => 'Histórico FLPA',
	'historico-comunales'			 => 'Histórico Ferias Comunales',
	'historico-extranjero'			 => 'Histórico Ferias en el Extranjero',
	'menu-ferias-en-feria'			 => 'Menú Ferias',
	'menu-filsa-2013'			 	 => 'Menú FILSA 2013',
	'menu-filsa-2012'			 	 => 'Menú FILSA 2012',
	//Filsa 2015
	'accesos-rapidos-filsa-2015' 	 => 'Accesos Rápidos Filsa 2015',
	//Filsa 2016
	'accesos-rapidos-filsa-2016' 	 => 'Accesos Rápidos Filsa 2016',
	'noticias-destacadas-filsa-2016' => 'Noticias destacadas Filsa 2016',
	'eventos-destacados-filsa-2016'  => 'Eventos destacados Filsa 2016',
	'noticias-home'					 => 'Noticias Portada',
	'noticias-socios'			     => 'Noticias Socios',
	'eventos-socios'				 => 'Eventos Socios',
	'accesos-rapidos-socios'		 => 'Accesos rápidos socios',
	'eventos-destacados-portada'	 => 'Eventos Portada',
	'accesos-rapidos-home'			 => 'Accesos rápidos Portada',
	//Socios
	'accesos-info-socios'			 => 'Accesos informacón útil socios'
	) 
);

//Composer autoload class
require_once('vendor/autoload.php');

//Image sizes

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

//add_image_size( 'imagen-slide', 689, 300, true);
//add_image_size( 'imagen-slide_home', 940, 300, true);
add_image_size( 'imagen_single', 670, 250, true);
add_image_size( 'imagen-270', 270, 150, true);
add_image_size( 'imagen-80', 80, 80, true);
add_image_size( 'imagen-95', 95, 95, true);
add_image_size( 'media-kit', 400, 225, true);
add_image_size( 'noticia-principal', 776, 350, true);
add_image_size( 'noticia-secundaria', 382, 178, true);
//Return shortlink button

add_filter( 'get_shortlink', function( $shortlink ) {return $shortlink;} );

//Admin
include( TEMPLATEPATH . '/admin/cchl_adminoptions.php');

//Includes 
include( TEMPLATEPATH . '/inc/bootstrap-navwalker.php');
include( TEMPLATEPATH . '/inc/utils.php');
include( TEMPLATEPATH . '/inc/event-functions.php');
//include( TEMPLATEPATH . '/inc/event-invitations.php');
include( TEMPLATEPATH . '/inc/scripts.php');
include( TEMPLATEPATH . '/inc/custom-tax.php');
//include( TEMPLATEPATH . '/inc/gallery-custom.php');
include( TEMPLATEPATH . '/inc/function-ferias.php');
include( TEMPLATEPATH . '/inc/fields-functions.php');
include( TEMPLATEPATH . '/inc/mustache-functions.php');
include( TEMPLATEPATH . '/inc/wphead-includes.php');
include( TEMPLATEPATH . '/inc/meta-boxes.php');
include( TEMPLATEPATH . '/inc/wp_bootstrap_pagination.php');
include( TEMPLATEPATH . '/inc/content-filters.php');