<?php
/*
Template Name: FILSA 2016
*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf post-<?php echo $post->ID;?>">
    
    <?php get_template_part('parts/clean-sidebar');?>

    
    <div id="content" class="grid_12">
        
        
        <div class="accesos-rapidos filsa-2016">
        
        <?php 
            if(has_nav_menu( 'accesos-rapidos-filsa-2016') ):
                wp_nav_menu( array('theme_location'=> 'accesos-rapidos-filsa-2016') );
            endif;
        ?>
        
        </div>



        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('parts/addthis');?>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
                <?php the_content();?>
            </div> 
        <?php endwhile;endif; ?>
    </div>
</div>
</div>

<?php get_footer(); ?>
