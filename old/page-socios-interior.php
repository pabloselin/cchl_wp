<?php
/* Template Name: Página contenido Socios */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="content" class="grid_16">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content"><?php the_content();?></div> 
		<?php endwhile;endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>