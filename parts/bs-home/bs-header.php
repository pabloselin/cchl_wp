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
					<a class="specialbannerplus" href="<?php echo $cchl_options['cchl_urlspecial'];?>" title="Ver más">
					<img class="hidden-xs" src="<?php echo $cchl_options['cchl_special_header'];?>" alt="<?php echo $cchl_options['cchl_special_title'];?>">	
                    <img src="<?php echo $cchl_options['cchl_special_header_mobile'];?>" alt="<?php echo $cchl_options['cchl_special_title'];?>" class="visible-xs">
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php
}?>

<nav class="navbar navbar-default top-utils hidden-xs" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
	<?php if($special):

		$logo['url'] = get_bloginfo('template_url') . '/img/cchl_logo_libro.svg';
		$logo['w'] = 220;
		$logo['h'] = 16;
		$logo['class'] = 'special';

	else:

		$logo['url'] = get_bloginfo('template_url') . '/img/cchl_logo.svg';
		$logo['w'] = 250;
		$logo['h'] = 80;
		$logo['class'] = 'default';

	endif;?>

    <div class="navbar-header">
       <a href="<?php echo get_bloginfo('url');?>"><img class="logo-<?php echo $logo['class'];?>" src="<?php echo $logo['url'];?>" alt="<?php bloginfo('title');?>" width="<?php echo $logo['w'];?>" height="<?php echo $logo['h'];?>"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse top-navbar-<?php echo $logo['class'];?>">
		
		<?php get_template_part('parts/bs-home/bs-buscador');?>

        <ul class="nav navbar-nav">
            <li class="newsletter"><a href="<?php bloginfo('url'); ?>/suscripcion-al-newsletter">NEWSLETTER</a></li>
			<li class="preguntas"><a href="<?php bloginfo('url'); ?>/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
			<li class="mapadelsitio"><a href="<?php bloginfo('url'); ?>/mapa-de-sitio">MAPA del SITIO</a></li>
			<li class="redes"><a href="https://facebook.com/<?php echo $cchl_options['cchl_fbcamara'];?>"><i class="fa fa-facebook"></i></a> </li>
			<li class="redes"><a href="https://twitter.com/<?php echo $cchl_options['cchl_twitter'];?>"><i class="fa fa-twitter"></i></a> </li>
			<li class="redes"><a href="<?php echo $cchl_options['cchl_youtube'];?>"><i class="fa fa-youtube-play"></i></a> </li>
        </ul>
        
      
    </div><!-- /.navbar-collapse -->
</nav>

</header>

<?php get_template_part( 'parts/bs-home/bs-mainmenu' );?>

