<?php
/* Template Name: Page Calendario */
?>
<?php 
	get_header();
	?>
<div id="main-page" class="container_16 cf">
<?php 
$isfilsa = checkfilsa();
if($isfilsa):?>
	<div id="sidebar_interior" class="grid_4 filsa-2014">
		<?php get_sidebar('filsa2014');?>
	</div>
<?php else:?>
    
   		<?php get_template_part('parts/clean-sidebar');?>
    <?php endif;?>
    
    <div id="content" class="grid_12">

    <div id="bread">
            
            
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
       
        </div>
    
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
         
   
            <h1><?php the_title(); ?></h1>
            
            
            <div class="cf"></div>
            <h4 class="category_description"><?php echo category_description(); ?></h4>
            <div class="the-content"><?php the_content();?></div> 
		<?php endwhile;endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
