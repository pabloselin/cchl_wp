<?php
/* Template Name: Page guia*/
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
        <h1>Guía de librerías</h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
       <?php query_posts(array('category_name' =>'guia-librerias','showposts' =>-1));
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="pastilla-agenda">
        	<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
            <p><?php the_date(); ?></p>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>"></a>
        </div> 
         <?php endwhile;endif;wp_reset_query(); ?> 
      	<div class="paginador">
		  	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
          </div>
    </div>
</div>

<?php get_footer(); ?>
