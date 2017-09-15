<body <?php body_class('responsive');?> id="filsa-2016">
<?php get_template_part( 'parts/fb-sdk');?>
<?php 
	
	$feriaid = CCHL_FILSA2016;
	$desktopheader = cchl_legacy_image($post->ID, get_post_meta($feriaid, 'cabecera_escritorio', true), 'full');
	$mobileheader = cchl_legacy_image($post->ID, get_post_meta($feriaid, 'cabecera_movil', true), 'full');
	$menu = get_post_meta($feriaid, 'id_menu', true);

?>

		<?php get_template_part('parts/camara-header-filsa');?>

	<header class="filsa-header">
		
		<div class="wrapredes">
			<div class="wrapredes-inner">
				<div class="redes-sociales">
					<a href="<?php echo CCHL_FACEBOOKFILSA;?>" title="Facebook" target="_blank"><i class="fa fa-facebook-square"></i></a>
					<a href="https://twitter.com/<?php echo CCHL_TWITTER;?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="https://instagram.com/filsachile" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
					<a class="last" target="_blank" title="Flickr" href="https://www.flickr.com/photos/148374223@N02"><i class="fa fa-flickr"></i></a>
				</div>
			</div>
		</div>
		
		<img src="<?php echo $desktopheader;?>" alt="<?php echo get_the_title(CCHL_FILSA2016);?>">

	</header>
	<div class="filsa-header-mobile">
	
		<a href="<?php echo get_permalink(CCHL_FILSA2016);?>" title="Volver a portada FILSA 2015">	<img src="<?php bloginfo('template_url');?>/img/filsa2016/logofilsa2016_movil.svg" alt="FILSA 2016" width="200" height="41">
		<a href="javascript:void(0);" class="triggernav"><i class="fa fa-bars"></i><span>menú</span></a>
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> $menu));?>
			<div class="mobile__redes">

				<span>Síguenos en:</span>

				<a href="<?php echo CCHL_FACEBOOKFILSA;?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
			    <a class="middle" href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
			    <a href="https://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
			    <a class="last" target="_blank" title="Flickr" href="https://www.flickr.com/photos/148374223@N02"><i class="fa fa-flickr"></i></a>

			</div>
		</nav>
	</div>