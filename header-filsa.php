<?php
/**
 * @package WordPress
 * @subpackage cchl
 * @since Cámara Chilena Del Libro 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title();?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="<?php bloginfo( 'stylesheet_url' ); ?>?v=filsa2014" rel="stylesheet" type="text/css" media="all"  />
<link href="<?php bloginfo( 'template_url' ); ?>/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' ); ?>/css/menu.css" rel="stylesheet" type="text/css" />

<link href="<?php bloginfo( 'template_url' ); ?>/css/960.css" rel="stylesheet" type="text/css" />

<link href="<?php bloginfo( 'template_url' ); ?>/css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />


<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />

<link href='http://fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="http://cchl.lactk.com/wp-content/themes/cchl/ie8-and-down.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="http://cchl.lactk.com/wp-content/themes/cchl/ie8-and-down.css" />
<![endif]-->
 <script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-29366127-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class();?> id="filsa-2014">
<?php echo $post->ID;?>
<div id="fb-root"></div>
<?php get_template_part( 'parts/fbsdk' );?>
		<div class="camara-header-filsa">
			<div class="wrapchf">
				<a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2014/cchl_filsaheader.png" alt="<?php bloginfo('title');?>" /> CÁMARA CHILENA DEL LIBRO</a>
				<div class="feriaslink"><a href="<?php echo get_permalink(119);?>"><i class="fa fa-plus"></i> Más Ferias</a></div>
			</div>
		</div>
	<div class="wrapredes">
		<div class="wrapredes-inner">
			<div class="redes-sociales">
			                    <a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook-square"></i></a>
			                    <a class="middle" href="http://twitter.com/CamaradelLibro" target="_blank"><i class="fa fa-twitter"></i></a>
			                    <a href="http://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
			     </div>
		</div>
	</div>
	<header class="filsa-header">
		<a href="<?php echo get_permalink(31817);?>"><img src="<?php bloginfo('template_url');?>/img/filsa2014/bportada_filsa2014.png" alt="FILSA 2014" /></a>
		
	</header>

