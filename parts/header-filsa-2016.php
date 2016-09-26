<body <?php body_class('responsive');?> id="filsa-2016">
<?php get_template_part( 'parts/fb-sdk');?>
<?php 
	
	$feriaid = CCHL_FILSA2016;
	$desktopheader = get('cabecera_escritorio', 1, 1, 1, $feriaid);
	$mobileheader = get('cabecera_movil', 1, 1, 1, $feriaid);
	$menu = get('id_menu', 1, 1, 1, $feriaid);

?>

		<?php get_template_part('parts/camara-header-filsa');?>

	<header class="filsa-header">
		
		<div class="wrapredes">
			<div class="wrapredes-inner">
				<div class="redes-sociales">
					<a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook-square"></i></a>
					<a class="middle" href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="http://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</div>
		
		<img src="<?php echo $desktopheader;?>" alt="<?php echo get_the_title(CCHL_FILSA2016);?>">

	</header>
	<div class="filsa-header-mobile">
		<a href="<?php echo get_permalink(CCHL_FILSA2016);?>" title="Volver a portada FILSA 2015">	<img src="<?php bloginfo('template_url');?>/img/filsa2016/mh_filsa2016_simple.png" alt="FILSA 2016">
		<a href="javascript:void(0);" class="triggernav"><i class="fa fa-bars"></i><span>menú</span></a>
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> $menu));?>
			<div class="mobile__redes">
				<span>Síguenos en:</span>
				<a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook-square"></i></a>
			    <a class="middle" href="http://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
			    <a href="http://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
			</div>
		</nav>
	</div>