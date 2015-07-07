<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
       <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <h1>Sala de prensa</h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
        <h4 class="category_description"><?php echo category_description(); ?></h4>

    
     	  <?php
		  query_posts(array('category_name' =>'noticias-de-la-camara','showposts' =>2));
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
          	<div id="pastillaNoticias">
		  		 <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
          		<div class="info">
          			<span><a class="category" href="/categoria/sala-de-prensa/noticias-de-la-camara/"><?php single_cat_title();?></a></span>
      				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          			<p>Publicado el <?php the_time('l j, F  Y') ?></p>
                    <p><?php excerpt2(20); ?></p>
          			<a href="<?php the_permalink(); ?>" class="readmore">Siga Leyendo »</a>
          			
          		</div><!--info-->
          	</div><!--fin pastillaNoticias-->
		  <?php endwhile; endif;?>
          
          <?php
		  query_posts(array('category_name' =>'columnas-de-opinion-sala-de-prensa','showposts' =>1));
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
          	<div id="pastillaNoticias">
		  		 <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
          		<div class="info">
          			<span><a class="category" href="/categoria/sala-de-prensa/columnas-de-opinion-sala-de-prensa/"><?php single_cat_title();?></a></span>
      				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          			<p>Publicado el <?php the_time('l j, F  Y') ?></p>
                    <p><?php excerpt2(20); ?></p>
          			<a href="<?php the_permalink(); ?>" class="readmore">Siga Leyendo »</a>
          			
          		</div><!--info-->
          	</div><!--fin pastillaNoticias-->
		  <?php endwhile; endif;?>
          
          <?php
		  query_posts(array('category_name' =>'noticias-del-sector','showposts' =>2));
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
          	<div id="pastillaNoticias">
		  		 <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
          		<div class="info">
          			<span><a class="category" href="/categoria/sala-de-prensa/noticias-del-sector/"><?php single_cat_title();?></a></span>
      				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          			<p>Publicado el <?php the_time('l j, F  Y') ?></p>
                    <p><?php excerpt2(20); ?></p>
          			<a href="<?php the_permalink(); ?>" class="readmore">Siga Leyendo »</a>
          			
          		</div><!--info-->
          	</div><!--fin pastillaNoticias-->
		  <?php endwhile; endif;?>
          
          <?php
		  query_posts(array('category_name' =>'cchl-en-los-medios','showposts' =>1));
		  if (have_posts()) : while (have_posts()) : the_post();
      $articlelink = get_post_meta($post->ID, 'link_link', true);
      $articlelinkdesc = get_post_meta($post->ID, 'link_descripcion', true);
       ?> 
          	<div id="pastillaNoticias">
		  		 <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
          		<div class="info">
          			<span><a class="category" href="/categoria/sala-de-prensa/cchl-en-los-medios/"><?php single_cat_title();?></a></span>
      				<h3>
                <a target="_blank" href="<?php echo $articlelink;?>"><?php the_title(); ?></a>
              </h3>
          			<p>Publicado el <?php the_time('l j, F  Y') ?></p>
                    <p><?php excerpt2(20); ?></p>
          			<a target="_blank" href="<?php echo $articlelink;?>" class="readmore"><?php echo $articlelinkdesc;?> »</a>
          			
          		</div><!--info-->
          	</div><!--fin pastillaNoticias-->
		  <?php endwhile; endif;?>
          
          <?php
		  query_posts(array('category_name' =>'concursos-literarios','showposts' =>2));
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
          	<div id="pastillaNoticias">
		  		 <div class="foto-noticias-mini">
				<?php the_post_thumbnail('imagen-95'); ?>
            </div><!-- fin img mini-->
          		<div class="info">
          			<span><a class="category" href="/categoria/sala-de-prensa/concursos-literarios/"><?php single_cat_title();?></a></span>
      				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          			<p>Publicado el <?php the_time('l j, F  Y') ?></p>
                    <p><?php excerpt2(20); ?></p>
          			<a href="<?php the_permalink(); ?>" class="readmore">Siga Leyendo »</a>
          			
          		</div><!--info-->
          	</div><!--fin pastillaNoticias-->
		  <?php endwhile; endif;?>

    </div>
</div>

<?php get_footer(); ?>
