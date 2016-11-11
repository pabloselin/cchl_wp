<body <?php body_class();?> >

<?php get_template_part( 'parts/fb-sdk');?>

<?php 
	$socios = cchl_checksocios();
?>

<div id="top" class="special standard-new">
  <div class="container_16 cf"> 
    
    <h1 class="logocchl_mini">
        <a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/cchl_logo.svg" alt="<?php bloginfo('title');?>" width="220" height="70"/></a>
    </h1>

    <div class="top-elements">
    	<?php get_template_part( 'parts/buscador' );?>
    	
    	<ul class="menutop cf">
    	    <!-- <li class="observatorio"><a href="<?php bloginfo('url'); ?>/observatorio-del-libro-y-la-lectura/definicion/">OBSERVATORIO del LIBRO y la LECTURA</a></li> -->
    	    <li class="newsletter"><a href="<?php bloginfo('url'); ?>/suscripcion-al-newsletter">NEWSLETTER</a></li>
    	    <li class="preguntas"><a href="<?php bloginfo('url'); ?>/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
    	    <li class="mapadelsitio"><a href="<?php bloginfo('url'); ?>/mapa-de-sitio">MAPA del SITIO</a></li>
    	</ul>
    	
    	
    	<ul class="cf redes-sociales-top">
    	    <li><a href="http://www.facebook.com/camarachilenalibro" target="_blank"><i class="fa fa-facebook"></i></a></li>
    	    <li><a href="http://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
    	    <li><a href="http://www.youtube.com/user/FILSACHILE" target="_blank"><i class="fa fa-youtube"></i></a></li>
    	</ul>
    </div>

</div>
</div>

<div class="container_16 cf topmenu-principal-special">
	<?php get_template_part( 'parts/mainmenu' );?>
</div>

