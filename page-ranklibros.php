<?php
/* Template Name: Ranking de Libros */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
	<?php get_template_part('parts/clean-sidebar');?>
    <div id="content" class="grid_12">
          <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
          <div class="img_libro_big">
            <?php the_post_thumbnail('imagen-libro_big'); ?>
            </div>
             <?php the_content(); ?><br />
        <?php endwhile; endif;?>
        <?php 
          $rankings = getGroupOrder('ranking_pdf');
          if($rankings):
          foreach($rankings as $ranking) {
          setlocale(LC_ALL, 'es_CL.utf8');
          $fecha = strtotime(get('ranking_fecha', $ranking));
          $fecha = strftime('%e de %B %Y ', $fecha);  
        ?>
                <div class="libro_principal">

                    <div class="img_libro_big">
                        <?php echo get_image( 'imagen_libreria', $ranking );?>
                    </div>
                    <div class="texto">
                    <p><?php echo $fecha;?></p>
                      <h2>
                        <?php echo get('ranking_fuente', $ranking);?>
                      </h2>
                          <p>
                            <a href="<?php echo get('ranking_pdf', $ranking);?>" class="leyendo">Descargar (PDF)»</a>
                          </p>
                    </div>
                </div>
          <?php }
          endif;
          ?>  
    </div>
</div>
<?php get_footer(); ?>