<?php
/* Template Name: Página Feria antigua */
?>

<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    
    <?php get_template_part('parts/clean-sidebar');?>

    <div id="content" class="grid_12">
         <?php if(!is_page(60799) && !is_page(54646)):?>
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php endif;?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

        <?php 
        //Filsa 2016
        if(is_page(60799)):?>

            <div class="accesos-rapidos filsa-2016">
        
                <?php 
                    if(has_nav_menu( 'accesos-rapidos-filsa-2016') ):
                        wp_nav_menu( array('theme_location'=> 'accesos-rapidos-filsa-2016') );
                    endif;
                ?>
        
            </div>

            <?php //get_template_part('parts/filsa/filsa-2016-eventos-destacados');?>
            <?php //get_template_part('parts/filsa/filsa-2016-noticias-destacadas');?>
            <p style="clear:both;"></p>
        <?php endif;

        //Filsa 2015
        if(is_page(54646)):?>
        
        <div class="accesos-rapidos">
            <?php wp_nav_menu( array('theme_location'=> 'accesos-rapidos-filsa-2015') );?>
        </div>

        <?php endif;?>


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
