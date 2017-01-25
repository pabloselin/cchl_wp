<?php
/* Template Name: Inicio */
?>
<?php
//Main options
$cchl_options = get_option( 'cchl_settings' );
?>
<?php get_header(); ?>

<div class="home-responsive container">
	
	<div class="main-home row">
			
		<?php get_template_part('parts/bs-home/bs-noticias-principales');?>
				

	</div>

</div>


<?php get_template_part('parts/bs-home/bs-eventos');?>

  

<section class="media hidden-xs">
  
  <div class="container">
    
    <div class="row flex-row">
      <div class="fotos-flickr col-md-6">
        <h2><i class="fa fa-flickr"></i> En Imágenes</h2>
        <?php echo $cchl_options['cchl_flickrwidget'];?>
      </div>
      
      <div class="videos col-md-6 pull-right">
        <h2><i class="fa fa-youtube-play"></i> Multimedia</h2>
        <iframe src="http://www.youtube.com/embed/?listType=user_uploads&list=<?php echo $cchl_options['cchl_youtubechannel'];?>" width="100%" height="385" frameBorder="0"></iframe> 
      </div>
    </div>

  </div>

</section>

<section class="redes hidden-xs">
  <div class="container">
    <div class="redes row flex-row">
        <div class="col-md-3">
          <?php get_template_part('parts/blocks/facebook-block');?>
        </div>
    
        <div class="col-md-3">
          <?php get_template_part('parts/blocks/twitter-block');?>
        </div>
    
        <div class="col-md-3">
          <?php get_template_part('parts/blocks/facebook-filsa-block');?>
        </div>
        
        <div class="col-md-3">
          <?php get_template_part('parts/blocks/instagram-block');?>
        </div>
    </div>
  </div>
</section>





<?php get_template_part('parts/bs-home/bs-footer'); ?>