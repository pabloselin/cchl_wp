<?php
/* Template Name: Page - Que Hacemos */
?>
<?php get_header(); ?>


<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
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
            <div class="the-content"><?php the_content();?></div> 
        
        
        
        <ul id="faq">
            
                                   <?php
                                          $miembros = getGroupOrder('pregunta');
                                          foreach($miembros as $miembro){
                                             echo "<li>";
                                             echo "<div class='preg'>".get('pregunta',$miembro)."</div>";
                                             echo "<div class='resp'>".get('respuesta',$miembro)."
											
											 </div>";
                                             echo "</li>";
                                          }?>
                                   

                               </ul>
		<?php endwhile; endif; wp_reset_query(); ?>
    </div>
</div>

<?php get_footer(); ?>
