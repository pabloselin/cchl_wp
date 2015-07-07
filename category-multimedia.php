<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <h1>
			<?php single_cat_title(); ?>
        </h1>
        
       <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
<h4 class="category_description"><?php echo category_description(); ?></h4>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div id="pastillaNoticias">  
            <div class="foto-noticias-mini">
        <?php 
        $miembros = getGroupOrder('galeria_video_video');
        if(has_post_thumbnail()):?>
				  <?php the_post_thumbnail('imagen-95'); ?>
        <?php elseif($miembros):?>
          <?php 
                    foreach($miembros as $miembro){
                        $otros = get("galeria_video_video",$miembro); ?>
                        
                        <img src="http://img.youtube.com/vi/<?php echo getYoutubeID($otros); ?>/0.jpg" width="95" height="80" />
                    <?php }?> 
        <?php endif;?>
            </div><!-- fin img mini-->
            
			<div class="info">
            
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p class="fecha"><?php echo mysql2date( 'j \\d\\e F \\d\\e Y', $post->post_date, true );?></p>
				<p><?php the_excerpt(); ?></p>
                
			</div><!-- fin info-->
        
         </div><!--fin pastilla noticias-->  		 
       	 <?php endwhile;endif; ?>

         <div class="paginador">
		  	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
          </div>
        
    </div>
</div>
<?php get_footer(); ?>