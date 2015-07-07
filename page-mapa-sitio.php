<?php
/* Template Name: Page mapa sitio*/
?>
<?php
?>
<?php get_header(); ?>


<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
     <?php get_sidebar(); ?>
    </div><!--fin sidebar interior-->
    <div id="content" class="grid_12">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div><!--fin bread-->

        <div class="mapa-sitio">
        	<h1><?php the_title();?></h1>
            
            <?php the_content(); ?>
               
            
          </div><!-- fin mapa sitio-->
        
    </div><!-- fin content-->
</div><!--fin mainpage-->

<?php get_footer(); ?>
