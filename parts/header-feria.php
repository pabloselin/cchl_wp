<body <?php body_class();?> id="feria">
<?php get_template_part( 'parts/fb-sdk');?>
	<?php 
		
		$ancestors = get_post_ancestors($post->ID);
		$feriaid = $post->ID;
		
		if($ancestors):
			
			foreach($ancestors as $ancestor):

				if(get_page_template_slug( $ancestor ) == 'page-feria-principal.php'):
					$feriaid = $ancestor;
				endif;

			endforeach;

		elseif( is_single() && in_category( CCHL_MULTIMEDIA ) ):

			if(in_category(CCHL_FLPA2016)):

				$feriaid = CCHL_PAGEFLPA2016;

			elseif(in_category(CCHL_FILIJ2016)):

				$feriaid = CCHL_PAGEFILIJ2016;

			endif;

		endif;

		//Variables para cada tema
		$desktopheader = cchl_legacy_image($post->ID, get_post_meta($feriaid, 'cabecera_escritorio', true));
		$mobileheader = cchl_legacy_image($post->ID, get_post_meta($feriaid, 'cabecera_movil', true));
		$menu = get_post_meta($feriaid, 'id_menu', true);
	?>

		<?php get_template_part('parts/camara-header-filsa');?>

	<header class="filsa-header">
	
		<a href="<?php echo get_permalink($post->ID);?>"><img src="<?php echo $desktopheader;?>" alt="<?php echo $post->post_title;?>"></a>
		
	</header>

	<div class="filsa-header-mobile fil-variant">

		<div class="feria-header-mobile">
			<img src="<?php echo $mobileheader;?>" alt="FILSA 2015">
			<a href="javascript:void(0);" class="triggernav confondo"><i class="fa fa-bars"></i><span>menú</span></a>
		</div>
		
		<nav class="mobile-menu-filsa inactive">
			<?php wp_nav_menu( array('menu'=> $menu));?>
			<!-- <div class="mobile__redes">
				<span>Síguenos en:</span>
				<a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook-square"></i></a>
			    <a class="middle" href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a>
			    <a href="https://instagram.com/filsachile" target="_blank"><i class="fa fa-instagram"></i></a>
			</div> -->
		</nav>

	</div>