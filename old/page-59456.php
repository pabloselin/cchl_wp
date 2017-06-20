<?php
/* Template Name: Page Programa Fil */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <?php get_template_part('parts/clean-sidebar');?>
    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
          //Llamar contenido Filsa 2014 si corresponde
          
         ?>
            <h1><?php the_title(); ?></h1>
           <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
                <?php the_content();?>

                <?php get_template_part( 'parts/eventos', 'fil-2016' );?>
            </div>
		<?php endwhile;endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>
