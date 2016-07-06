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
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
          //Llamar contenido Filsa 2015 si corresponde
          if($post->ID == 108):
            $filsa2015id = 54646;
            $filsa2015 = get_page($filsa2015id);
            ?>
              <h1 class="post-title"><?php echo $filsa2014->post_title; ?></h1>
           <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php echo get_the_post_thumbnail($filsa2014->ID, 'imagen_single'); ?>
            <div class="the-content">
                <?php echo apply_filters('the_content', $filsa2015->post_content);?>
            </div>
          <?php else:
         ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
           <?php get_template_part('parts/addthis');?>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
                <?php the_content();?>

                <?php if($post->ID == 60136):?>
                    <?php get_template_part('parts/eventos-flpa-2016');?>
                <?php endif;?>
            </div>
          <?php endif;?>
		<?php endwhile;endif; ?>

    </div>
</div>

<?php get_footer(); ?>
