<body <?php body_class();?> id="filvina-2016">
<?php get_template_part( 'parts/fb-sdk');?>
	
	<?php get_template_part('parts/camara-header-filsa');?>

	<header class="filsa-header">
		<a href="<?php echo get_permalink(CCHL_FILVINA2016);?>"><img src="<?php bloginfo('template_url');?>/img/filvina-2016/h_filvina2016.jpg" alt="FIL VIÑA 2016"></a>
		
	</header>
	<div class="filsa-header-mobile fil-variant">
		<img src="<?php bloginfo('template_url');?>/img/filvina-2016/hm_filvina2016.jpg" alt="FILSA 2015">
		<a href="javascript:void(0);" class="triggernav"><i class="fa fa-bars"></i><span>menú</span></a>
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> 196));?>
			<!-- <div class="mobile__redes">
				<span>Síguenos en:</span>
				<a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook-square"></i></a>
			    <a class="middle" href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
			    <a href="https://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
			</div> -->
		</nav>
	</div>