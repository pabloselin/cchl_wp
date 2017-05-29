<?php
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
       <div id="bread">
            Estás en: Home > Qué hacemos > Capacitación
        </div>
        <div class="capacitaciones">
        <h1><?php single_cat_title();?></h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
          
            
               <ul class="seminarios">   
                   <?php
		  query_posts("cat=11&showposts=2");
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
           <div class="capacitacion grid_5">
           
		   <?php echo get_image('imagen_chica'); ?>
           <div class="caja-texto">
           <span><?php single_cat_title();?></span>
           <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
           <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
          <?php the_excerpt(); ?>
       
          </div>
          </div>
                  <?php endwhile; endif;?>
                  </ul>
          <ul class="talleres">          
          <?php
		  query_posts("cat=9&showposts=2");
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
           <div class="capacitacion grid_5">
		   <?php echo get_image('imagen_chica'); ?>
           <div class="caja-texto">
           <span><?php single_cat_title();?></span>
           <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
           <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
          <?php the_excerpt(); ?>
          
          </div>
          </div>
          <?php endwhile; endif;?>
                  </ul>
                  
          <?php
		  query_posts("cat=10&showposts=1");
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
           <div class="capacitacion grid_5">
		   <?php echo get_image('imagen_chica'); ?>
           <div class="caja-texto">
           <span><?php single_cat_title();?></span>
           <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
           <small>Publicado el <?php the_time('l j, F  Y') ?></small>
          <?php the_excerpt(); ?>
      
          </div>
          </div>
          <?php endwhile; endif;?>
          </div>
                  
                  
    </div>
</div>

<?php get_footer(); ?>
