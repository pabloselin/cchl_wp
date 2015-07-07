<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="content" class="grid_16">
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
          <div id="pastillaNoticias" class="pastillaNoticiasSocios">  
            <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
            
			<div class="info">
            <?php if($post->post_content):?>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <?php else:?>
                <h3 class="nolink"><?php the_title(); ?></h3>
            <?php endif;?>
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