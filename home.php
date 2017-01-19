<?php
/* Template Name: Inicio */
?>

<?php get_header(); ?>

<div class="home-responsive container">
	
	<div class="main-home row">
			
		<?php get_template_part('parts/bs-home/bs-noticias-principales');?>
				
		<?php get_template_part('parts/bs-home/bs-accesos-rapidos');?>

	</div>

</div>


<?php get_template_part('parts/bs-home/bs-eventos');?>

  

<section class="media hidden-xs">
  
  <div class="container">
    
    <div class="row flex-row">
      <div class="fotos-flickr col-md-6">
        <h2><i class="fa fa-flickr"></i> En Imágenes</h2>
        <a data-flickr-embed="true" data-header="true" data-context="true"  href="https://www.flickr.com/photos/148374223@N02/30216830134/" title="Equipo de trabajo"><img src="https://c1.staticflickr.com/6/5823/30216830134_5e44a47b69_c.jpg" width="100%" height="463" alt="Equipo de trabajo"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
      </div>
      
      <div class="videos col-md-6 pull-right">
        <h2><i class="fa fa-youtube"></i> Multimedia</h2>
        <iframe src="http://www.youtube.com/embed/?listType=user_uploads&list=FILSACHILE" width="100%" height="385" frameBorder="0"></iframe> 
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