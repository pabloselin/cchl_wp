<?php
/* Template Name: Página Feria antigua */
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

            <?php
            if($post->ID == 60136):
                    get_template_part('parts/eventos-flpa-2016');                    
            endif;
                
            if($post->ID == 65839):
                    get_template_part( 'parts/eventos-filvina-2017' );
            endif;
            
            if(is_page_template('page-observatorio-integrantes.php') || is_page_template('old/page-observatorio-integrantes.php')): 
                get_template_part('parts/oldparts/observatorio-integrantes');
            endif;
             
            if(is_page_template('page-invitados-filsa.php') || is_page_template('old/page-invitados-filsa.php')): 
                get_template_part('parts/oldparts/invitados-filsa');
            endif;
            
            if(is_page_template('expositores.php') || is_page_template('old/expositores.php')):
                get_template_part('parts/oldparts/expositores');    
            endif; 

            if(is_page_template('colaboradores-filsa-2016.php') || is_page_template('old/colaboradores-filsa-2016.php')):
                get_template_part('parts/oldparts/colaboradores-filsa-2016');
            endif;

            if(is_page_template('colaboradores-filsa-2015.php') || is_page_template('old/colaboradores-filsa-2015.php')):
                get_template_part('parts/oldparts/colaboradores-filsa-2015');
            endif;

            if(is_page_template('colaboradores-filsa.php') || is_page_template('old/colaboradores-filsa.php')):
                get_template_part('parts/oldparts/colaboradores-filsa');
            endif;

            if(is_page_template('colaboradores-fil-2016.php') || is_page_template('old/colaboradores-fil-2016.php')):
                get_page_template('parts/oldparts/colaboradores-fil-2016');
            endif;
            
            endwhile;
            endif;?>
    </div>
</div>
</div>

<?php get_footer(); ?>
