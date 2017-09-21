<?php
/*
Template Name: Visitas Guiadas Colegios
Template Post Type: filsa-2017
*/
?>

<?php get_header('filsa-custom');?>

<div class="row">
<article class="article-filsa-2017 col-md-12">
    <?php 
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <header class="article-header <?php if(has_post_thumbnail()): echo 'with-image'; endif;?>">
            <?php if(has_post_thumbnail( )):
                ?>
                <div class="featured-image">
                <?php the_post_thumbnail('filsa-full');?>
                </div>
            <?php endif;?>
            
            <?php if(has_post_thumbnail()):?>

            <h1><?php the_title();?></h1>

            <?php else:?>
            
            <div class="row">
            <h1 class="col-md-9 col-md-offset-1"><?php the_title();?></h1>
            </div>

            <?php endif;?>

        </header>

        <div class="text-content row">
            
            <div class="col-md-9 col-md-offset-1">

                <?php get_template_part('parts/bs-general/bs-sharer');?>

                <?php the_content();?>

                <?php echo filsa2017_run_part('visitas-guiadas-colegios');?>

			</div>
			
        </div>
    
    <?php endwhile; endif;?>
</article>
</div>

<?php get_footer('filsa-custom');?>