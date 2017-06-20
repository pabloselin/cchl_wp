<?php
/*
Template Name: Ferias tema personalizado ancho
*/
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf post-<?php echo $post->ID;?>">
    
    <?php get_template_part('parts/clean-sidebar');?>

    
    <div id="content" class="grid_12">
        
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

            <h1 class="post-title"><?php the_title(); ?></h1>
           <?php get_template_part('parts/addthis');?>
            
            <?php the_post_thumbnail('imagen_single'); ?>
            
            <div class="the-content">
                <?php the_content();?>
            </div>
          
        <?php endwhile;
          endif; ?>


    </div>

</div>

<?php get_footer(); ?>