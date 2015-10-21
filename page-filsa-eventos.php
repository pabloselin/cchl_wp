<?php
/*
Template Name: FILSA 2015 Eventos
*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf post-<?php echo $post->ID;?>">
    
    <?php get_template_part('parts/clean-sidebar');?>

    
    <div id="content" class="grid_12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('parts/addthis');?>
            <div class="the-content">
            	<?php the_content();?>
            	
                <?php get_template_part( 'parts/filsa/eventos-ajax' );?>
            </div> 
        <?php endwhile;endif; ?>
    </div>
</div>
</div>

<?php get_footer(); ?>
