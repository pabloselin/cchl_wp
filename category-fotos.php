<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    
    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <h1>Kit de Prensa</h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
        	<div id="kitPrensa">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
			<?php
                $miembros = getGroupOrder('kit_de_prensa_archivo');
                foreach($miembros as $miembro){?> 
                 
                  <div class="fotoKit">
				 	 <?php echo the_post_thumbnail('media-kit');?>
				  </div>
                  
				  <div class="infoKit">
					  <?php echo '<h4>'.get_the_title().'</h4>';?>
					  <?php echo '<p>'.the_content().'</p>';?>
					  <?php echo '<a href="'.get('kit_de_prensa_archivo',$miembro).'"><h5><img src="'.get_bloginfo( 'template_directory' ).'/img/btn/down.png" />DESCARGAR</h5></a>';?>
				
				<?php } ?>
            	 </div>
            
            <?php endwhile;endif;wp_reset_query(); ?> 
            </div><!--fin kitPrensa-->
            
            <div class="paginador">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
            </div>

    </div>
</div>
<?php get_footer(); ?>
