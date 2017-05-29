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
        <h1>Links de Interes</h1>
      	<?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
         
         <?php query_posts(array('category_name' =>'links-de-interes/internacional'));
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="linksInteres">
        <?php $miembros = getGroupOrder('internacional_link');
		foreach($miembros as $miembro){?> 
        <a href="<?php echo get('internacional_link',$miembro);?>">
        <h1><?php the_title(); ?></h1></a>
        <p><?php echo get('internacional_descripcion',$miembro); ?></p>
         <?php }?>
         
         <?php endwhile;endif;wp_reset_query(); ?>    
            
        </div> 
      
      	<div class="paginador">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>
