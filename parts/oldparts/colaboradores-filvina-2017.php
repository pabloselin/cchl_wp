<?php
/* 
Template Name: Colaboradores Fil Viña 2017
 */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <?php get_template_part('parts/clean-sidebar');?>
    <div id="content" class=" grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <div class="the-content"><?php the_content();?></div>
            
            
            <?php endwhile; endif; ?>
    
                <?php echo cchl_colaboradores_fields('Organiza', 'organiza_logo', 'organiza_nombre', 'organiza_url' );?>

                <?php echo cchl_colaboradores_fields('Patrocina', 'patrocina_logo', 'patrocina_nombre', 'patrocina_url' );?>
               

                <?php echo cchl_colaboradores_fields('Colabora', 'colabora_logo', 'colabora_nombre', 'colabora_url' );?>

                <?php echo cchl_colaboradores_fields('Participan en Programa Cultural', 'participan_programa_logo', 'participan_programa_nombre', 'participan_programa_url' );?>
            
    </div>
</div>

<?php get_footer(); ?>