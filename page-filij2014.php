<?php
/*
Template Name: FILIJ 2014
*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf post-<?php echo $post->ID;?>">
<?php 
$isfilsa = checkfilsa();
if($isfilsa):?>
    <div id="sidebar_interior" class="grid_4 filij-2014">
        <?php get_sidebar('filsa2014'); ?>
    </div>
<?php else:?>
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar('ugly');?>
    </div>
<?php endif;?>
    
    <div id="content" class="grid_12">
         <?php if(!is_page(31817) && !is_page(108)):?>
            <div id="bread">
                Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
            </div>
        <?php endif;?>
        
       <?php get_template_part( 'parts/filsa/noticias-filsa');?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php if(!is_page(31817) && !is_page(108)):?>
            
            <h1><?php the_title(); ?></h1>

            <?php get_template_part('parts/addthis');?>

            <?php endif;?>

            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
            <?php if(is_page(108)):
                $pfilsa = 31817;
                $pagefilsa = get_page($pfilsa);
                echo apply_filters( 'the_content', $pagefilsa->post_content );
            ?>
                
            <?php endif;?> 
                <?php if(get('link_link')):?>
                <div class="custompostlink">
                    <p><i class="fa fa-external-link"></i> Fuente: <a href="<?php echo get('link_link');?>"><?php echo get('link_descripcion');?></a></p>
                </div>
                <?php endif;?>
            <?php the_content();?>

            </div> 
		<?php endwhile;endif; ?>

        <?php get_template_part( 'parts/filsa/participantes');?>

        <?php get_template_part( 'parts/filsa/colaboradores');?>

        <?php get_template_part('parts/filsa/eventos');?>
        </div>


    </div>
</div>

<?php get_footer(); ?>
