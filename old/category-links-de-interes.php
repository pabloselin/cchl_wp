<?php
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
       <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <h1>Links de Interés</h1>
      	<?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
        
        <?php query_posts("cat=29&showposts=12");
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="linksInteres">
			<?php $miembros = getGroupOrder('nacional_link');
            foreach($miembros as $miembro){ ?> 
                <a href="<?php echo get('nacional_link',$miembro); ?>" target="_blank"><h1><?php the_title(); ?></h1></a>
             <p><?php echo get('nacional_descripcion',$miembro); ?></p>
            <?php } ?>   
        </div> 
        
         <?php endwhile;endif;wp_reset_query(); ?> 
        </div> 
      
    </div>
</div>

<?php get_footer(); ?>
   </div>
</div>

<?php get_footer(); ?>
