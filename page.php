<?php
/* Template Name: Page Interior */
?>

<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    
    <?php get_template_part('parts/clean-sidebar');?>

    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

            <h1 class="post-title"><?php the_title(); ?></h1>
           <?php get_template_part('parts/addthis');?>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
                <?php the_content();?>

                <?php if($post->ID == 60136):?>
                    <?php get_template_part('parts/eventos-flpa-2016');?>
                <?php endif;?>
            </div>

            <?php if($post->ID == 65839):
                    get_template_part( 'parts/eventos-filvina-2017' );
            endif;?>
          
		<?php endwhile;
          endif; ?>

    </div>
</div>

<?php get_footer(); ?>
