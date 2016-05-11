<body <?php body_class();?> id="feria">
	<?php 
		$ancestors = get_post_ancestors($post->ID);
		$feriaid = $post->ID;
		
		if($ancestors):
			foreach($ancestors as $ancestor):
				if(get_page_template_slug( $ancestor ) == 'page-feria-principal.php'):
					$feriaid = $ancestor;
				endif;
			endforeach;
		endif;
		//Variables para cada tema
		$desktopheader = get('cabecera_escritorio', 1, 1, 1, $feriaid);
		$mobileheader = get('cabecera_movil', 1, 1, 1, $feriaid);
		$menu = get('id_menu', 1, 1, 1, $feriaid);
	?>
		<div class="camara-header-filsa">
			<div class="wrapchf">
				<a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2014/cchl_filsaheader.png" alt="<?php bloginfo('title');?>" /> CÁMARA CHILENA DEL LIBRO</a>
				<div class="feriaslink"><a href="<?php echo get_permalink(119);?>"><i class="fa fa-plus"></i> Más Ferias</a></div>
			</div>
		</div>
	<header class="filsa-header">
		<a href="<?php echo get_permalink($post->ID);?>"><img src="<?php echo $desktopheader;?>" alt="<?php echo $post->post_title;?>"></a>
		
	</header>
	<div class="filsa-header-mobile fil-variant">
		<img src="<?php echo $mobileheader;?>" alt="FILSA 2015">
		<a href="javascript:void(0);" class="triggernav confondo"><i class="fa fa-bars"></i><span>menú</span></a>
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> $menu));?>
			<!-- <div class="mobile__redes">
				<span>Síguenos en:</span>
				<a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook-square"></i></a>
			    <a class="middle" href="http://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
			    <a href="http://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
			</div> -->
		</nav>
	</div>