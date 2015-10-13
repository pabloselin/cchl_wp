<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <?php get_template_part( 'parts/clean-sidebar' );?>
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
          <div class="pastillaNoticias">  
            <div class="foto-noticias-mini">
				    <?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
            
			<div class="info">
            <?php if($post->post_content):?>
				    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php else:?>
                <h3 class="nolink"><?php the_title(); ?></h3>
            <?php endif;?>
                <p class="fecha"><?php echo mysql2date( 'j \\d\\e F \\d\\e Y', $post->post_date, true );?></p>
				<?php custom_excerpt($post->post_content, 32);?>
                
			</div><!-- fin info-->
        
         </div><!--fin pastilla noticias-->  		 
       	<?php endwhile;?> 
            
            <div class="paginador">
                <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
            </div>

        <?php endif; ?>
        
    </div>
</div>
<?php get_footer(); ?>