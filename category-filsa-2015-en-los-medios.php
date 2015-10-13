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
        <h1 class="post-title">FILSA en los Medios</h1>
      	<?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
        
        <?php query_posts(array('category_slug' =>'filsa-2015-en-los-medios','posts_per_page' =>-1));
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="linksInteres">
			<?php $miembros = getGroupOrder('link_link');
            foreach($miembros as $miembro){ ?> 
                <h1>
                <a href="<?php echo get('link_link',$miembro); ?>" target="_blank">
                <?php the_title(); ?></a>
                </h1>
             <p><?php echo get('link_descripcion',$miembro); ?></p>
            <?php } ?>   
        </div> 
        
         <?php endwhile;endif;wp_reset_query(); ?>   
            
        </div> 
      
    </div>
</div>

<?php get_footer(); ?>
