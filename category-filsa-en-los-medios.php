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
        
        <?php
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
        
        <?php endwhile;?>

         <div class="paginador">
                <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
            </div>

        <?php endif; ?>   
            
        </div> 
      
    </div>
</div>

<?php get_footer(); ?>
