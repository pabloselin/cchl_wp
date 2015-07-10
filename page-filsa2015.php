<?php
/*
Template Name: FILSA 2015
*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf post-<?php echo $post->ID;?>">
    <div id="sidebar_interior" class="grid_4 filsa-2015">
        <?php get_template_part('parts/clean-sidebar');?>
    </div>

    
    <div id="content" class="grid_12">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>

            <?php get_template_part('parts/addthis');?>

            

            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
                <?php if(get('link_link')):?>
                    <div class="custompostlink">
                        <p><i class="fa fa-external-link"></i> Fuente: <a href="<?php echo get('link_link');?>"><?php echo get('link_descripcion');?></a></p>
                    </div>
                <?php endif;?>
                <?php the_content();?>

            </div> 
        <?php endwhile;endif; ?>
    </div>


</div>
</div>

<?php get_footer(); ?>
