<?php
/* Template Name: page concurso*/
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
        <h1>Concursos literarios</h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
<h4 class="category_description"><?php echo category_description(); ?></h4>
       <?php query_posts(array('category_name' =>'concursos-literarios','showposts' =>-1));
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="pastillaNoticias">
		  		 <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
          		<div class="info">
          			<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          			<p class="fecha">Publicado el <?php the_time('l j, F  Y') ?></p>
                   <p><?php the_excerpt(); ?></p>
          			
          			
          		</div><!--info-->
          	</div><!--fin pastillaNoticias-->
         <?php endwhile;endif;wp_reset_query(); ?> 
      
    </div>
</div>

<?php get_footer(); ?>
