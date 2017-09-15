<body <?php body_class('responsive');?> id="filvina-2017">
<?php get_template_part( 'parts/fb-sdk');?>
<?php 
	
	$feriaid = CCHL_FILVINA2017;
	$desktopheader = cchl_legacy_image($post->ID, get_post_meta($feriaid, 'cabecera_escritorio', true));
	$mobileheader = cchl_legacy_image($post->ID, get_post_meta($feriaid, 'cabecera_movil', true));
	$menu = get_post_meta($feriaid, 'id_menu', true);
?>

		<?php get_template_part('parts/camara-header-filsa');?>

	<header class="filsa-header">
		
		<div class="wrapredes">
			<div class="wrapredes-inner">
				<div class="redes-sociales">
					<a href="<?php echo CCHL_FACEBOOK;?>" title="Facebook" target="_blank"><i class="fa fa-facebook-square"></i></a>
					<a href="https://twitter.com/<?php echo CCHL_TWITTER;?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
				</div>
			</div>
		</div>
		
		<img src="<?php echo $desktopheader;?>" alt="<?php echo get_the_title(CCHL_FILVINA2017);?>">

	</header>
	<div class="filsa-header-mobile">
	
		<a href="<?php echo get_permalink(CCHL_FILVINA2017);?>" title="Volver a portada FILSA 2015">
		<a href="javascript:void(0);" class="triggernav"><i class="fa fa-bars"></i><span>menú</span></a>
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> $menu));?>
			<div class="mobile__redes">

				<span>Síguenos en:</span>

				<a href="<?php echo CCHL_FACEBOOK;?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
			    <a class="middle" href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
			</div>
		</nav>
	</div>