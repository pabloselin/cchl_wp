<?php
/* Template Name: Page Calendario */
?>
<?php 
	get_header();
	?>
<div id="main-page" class="container_16 cf">

    
    <?php get_template_part('parts/clean-sidebar');?>

    
    <div id="content" class="grid_12">

         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <h4 class="category_description"><?php echo category_description(); ?></h4>
            
            <div class="the-content"><?php the_content();?></div> 

		<?php endwhile;endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
