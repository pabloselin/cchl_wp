<?php
/* Template Name: Inicio */
?>
<?php
//Main options
$cchl_options = get_option( 'cchl_settings' );
set_query_var('cchl_options', get_option('cchl_settings'));
set_query_var('menu_noticias', 'noticias-home');
?>
<?php get_header(); ?>

<div class="home-responsive container">
	
	<div class="main-home row">
		<?php get_template_part('parts/bs-home/bs-noticias-principales');?>
	</div>

</div>


<?php 
set_query_var('eventos_home', cchl_getmenus('eventos-destacados-portada'));
set_query_var('eventos_title', $cchl_options['cchl_tituloseccioneventos']);
get_template_part('parts/bs-home/bs-eventos');
?>

  
<section class="diavideos" style="background-color: #000; padding: 12px 0;">
  <div class="container">
    <div class="row flex-row">
      <div class="col-md-12">
        <h1 style="text-align:center; font-size: 48px; color: white; margin: 0 0 24px 0;">VIDEOS:  #YoTeInvitoaLeer</h1>
        <?php echo do_shortcode('[yourchannel user="Cámara Chilena del Libro"]');?>
      </div>
    </div>
  </div>
</section>

<section class="media hidden-xs">
  
  <div class="container">
    
    <div class="row flex-row">
      <div class="fotos-flickr col-md-6">
        <h2><i class="fa fa-flickr"></i> En Imágenes</h2>
        <?php echo $cchl_options['cchl_flickrwidget'];?>
      </div>
      
      <div class="videos col-md-6 pull-right">
        <h2><i class="fa fa-youtube-play"></i> Multimedia</h2>
             <iframe src="https://www.youtube.com/embed/?listType=user_uploads&list=<?php echo $cchl_options['cchl_youtubechannel'];?>" width="100%" height="381" frameBorder="0"></iframe> 
      </div>
    </div>

  </div>

</section>

<section class="redes hidden-xs">
  <div class="container">
    <div class="redes row flex-row">
        <div class="col-md-4">
          <?php get_template_part('parts/blocks/facebook-block');?>
        </div>
    
        <div class="col-md-4">
          <?php get_template_part('parts/blocks/twitter-block');?>
        </div>
        
        <div class="col-md-4">
          <?php get_template_part('parts/blocks/instagram-block');?>
        </div>
    </div>
  </div>
</section>





<?php get_template_part('parts/bs-home/bs-footer'); ?>