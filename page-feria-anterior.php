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

                <?php if($post->ID == 60136):?>
                    <?php get_template_part('parts/eventos-flpa-2016');?>
                <?php endif;?>
            </div>

            <?php if($post->ID == 65839):
                    get_template_part( 'parts/eventos-filvina-2017' );
            endif;?>

             <?php if(is_page_template('page-observatorio-integrantes.php') || is_page_template('old/page-observatorio-integrantes.php')): ?>
                 <div class="listado">
                    <ul class="cf">
                        <?php
                        $miembros = getGroupOrder('imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 95, "w" => 95, "zc" => 1, "q" => 100);
                            echo get_image('imagen',$miembro,1,1,NULL,$otros);
                            echo "<div class='info'>
                            <h3>".get('nombre',$miembro)."</h3>
                            <span>".get('cargo',$miembro)."</span>";
                            echo '<div class="textoint">'. apply_filters('the_content', get('texto',$miembro)). '</div>
                            </div>
                            </li>';
                        }
                        ?>
                        </ul>
                </div>
                <?php endif;?>
		<?php endwhile;
          endif; ?>

    </div>
</div>

<?php get_footer(); ?>
