<div id="top" class="special">
  
<div class="container_16 cf banner-interior">
    <?php
        $cchl_options = get_option( 'cchl_settings' );
        $special = $cchl_options['cchl_checkbox_special'];
        if($special !== null) {
    ?>

    <a class="specialbannerplus" href="<?php echo $cchl_options['cchl_urlspecial'];?>" title="Ver más">
					<img class="hidden-xs" src="<?php echo $cchl_options['cchl_special_header'];?>" alt="<?php echo $cchl_options['cchl_special_title'];?>">
	</a>

        <?php }?>
</div>

  <div class="container_16 cf"> 
    
    <h1 class="logocchl_mini">
        <a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/cchl_logo_libro.svg" width="250" height="19" alt="<?php bloginfo('title');?>" /></a>
    </h1>

    <?php get_template_part( 'parts/buscador' );?>

    <ul class="menutop cf">
        <!-- <li class="observatorio"><a href="<?php bloginfo('url'); ?>/observatorio-del-libro-y-la-lectura/definicion/">OBSERVATORIO del LIBRO y la LECTURA</a></li> -->
        <li class="newsletter"><a href="<?php bloginfo('url'); ?>/suscripcion-al-newsletter">NEWSLETTER</a></li>
        <li class="preguntas"><a href="<?php bloginfo('url'); ?>/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
        <li class="mapadelsitio"><a href="<?php bloginfo('url'); ?>/mapa-de-sitio">MAPA del SITIO</a></li>
    </ul>


    <ul class="cf redes-sociales-top">
        <li><a href="https://www.facebook.com/camarachilenalibro" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://www.youtube.com/user/FILSACHILE" target="_blank"><i class="fa fa-youtube"></i></a></li>
    </ul>

</div>
</div>