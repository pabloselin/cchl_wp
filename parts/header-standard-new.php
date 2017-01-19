<?php 
$cchl_options = get_option( 'cchl_settings' );
$special = $cchl_options['cchl_checkbox_special'];
?>

<body <?php body_class();?> >

<?php get_template_part( 'parts/fb-sdk');?>

<header class="site-header">

<?php if($special) {
	?>
	
	<section class="special">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a class="specialbannerplus" href="<?php echo get_permalink(CCHL_FILVINA2017);?>" title="Ver más de FIL VIÑA 2017">
					<img class="hidden-xs" src="<?php bloginfo('template_url');?>/img/filvina-2017/banner-filvina2017-home-2.jpg" alt="<?php echo get_the_title(CCHL_FILVINA2017);?>">	
                    <img src="<?php bloginfo('template_url');?>/img/filvina-2017/banner-filvina2017-movil.jpg" alt="<?php echo get_the_title(CCHL_FILVINA2017);?>" class="visible-xs">
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php
}?>

<nav class="navbar navbar-default top-utils hidden-xs" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <a href="<?php echo get_bloginfo('url');?>"><img src="<?php echo get_bloginfo('template_url');?>/img/cchl_logo_libro.svg" alt="<?php bloginfo('title');?>" width="250" height="19"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
		
		<?php get_template_part('parts/bs-home/bs-buscador');?>

        <ul class="nav navbar-nav">
            <li class="newsletter"><a href="<?php bloginfo('url'); ?>/suscripcion-al-newsletter">NEWSLETTER</a></li>
			<li class="preguntas"><a href="<?php bloginfo('url'); ?>/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
			<li class="mapadelsitio"><a href="<?php bloginfo('url'); ?>/mapa-de-sitio">MAPA del SITIO</a></li>
        </ul>
        
      
    </div><!-- /.navbar-collapse -->
</nav>

</header>

<?php get_template_part( 'parts/bs-home/bs-mainmenu' );?>

