<body <?php body_class();?> id="filsa-2015">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=281219458564030";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
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
		<a href="<?php echo get_permalink(CCHL_FILSA2015);?>"><img src="<?php bloginfo('template_url');?>/img/filsa2015/banner_filsa_2015_5.jpg" alt="FILSA 2015"></a>
		
	</header>
	<div class="filsa-header-mobile">
		<img src="<?php bloginfo('template_url');?>/img/filsa2015/cabeceramovil_d.png" alt="FILSA 2015">
		<a href="#" class="triggernav"><i class="fa fa-bars"></i><span>menú</span></a>
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> 178));?>
		</nav>
	</div>