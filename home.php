<?php
/* Template Name: Inicio */
?><?php get_header(); ?>
<div id="main-home" class="container_16 cf">

	<div class="tabs2">
        <div id="first">
            <div id="main" class="container_16 cf">
            <!-- SLIDER VIEJO -->
           	<div id="contenedor_slide_home">	
                <ul id="slide_home">
                <?php query_posts("page_id=831"); while (have_posts()) : the_post(); ?>	
				<?php
                $miembros = getGroupOrder('slider_imagen');
               	foreach($miembros as $miembro){ 
				$otros = array("w" => 940, "h" => 300, "zc" => 1, "q" =>100);
				?>
                <li>
                    <div class="image"><a href="<?php echo get('slider_link',$miembro); ?>"><?php echo get_image('slider_imagen',$miembro,1,1,NULL,NULL, 'imagen-slide_home'); ?></a></div>   
                        <div class="caja_text">
                            <h2><a title="<?php echo get('slider_titulo',$miembro); ?>" href="<?php echo get('slider_link',$miembro); ?>" class="mx"><?php echo get('slider_titulo',$miembro); ?></a></h2>
                        <div class="text">
						<a class="mx" href="<?php echo get('slider_link',$miembro); ?>"> <?php echo get('slider_texto',$miembro);?> </a>
                        
                        </div><!--fin text-->
                    </div><!--fin caja text-->
                </li>
                <?php } ?>
                <?php  endwhile; wp_reset_query(); ?>
                </ul>
            </div><!--fin contenedor slide-->	
    		<!-- FIN SLIDER VIEJO -->

            <div class="grid_16 banner_home_filsa">
              <p>
                <a href="<?php echo get_permalink(CCHL_PAGEFILSA);?>"><img src="<?php bloginfo('template_url');?>/img/filsa2015/banner_filsa2015_4.png" alt="FILSA 2015"></a>
              </p>
            </div>
            <div id="content-home" class="grid_11">
            <div class="agenda cf">
            <h2>Agenda <a href="<?php bloginfo('url');?>/eventos/categoria/agenda" class="ver-agenda">ver agenda completa »</a></h2>			 
            
            <ul>
			<?php
          $menuid = 164;
            
            $menuitems = wp_get_nav_menu_items( $menuid );
            if($menuitems):
              foreach($menuitems as $menuitem) {
                $recent = get_post($menuitem->object_id);?>
                <div class="caja grid_5">
                  <h3><?php echo $recent->post_title;?></h3>
                  <?php custom_excerpt($recent->ID, 65);?>
                  <span class="fecha"><?php echo tribe_get_start_date($recent->ID, true, 'l j \d\e F - G:i');?></span>
                  <a href="<?php echo get_permalink( $recent->ID);?>" class="leyendo">Siga Leyendo</a>
                </div>
                <?php
              }
            else:
            $args = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tribe_events_cat',
                        'field' => 'slug',
                        'terms' => 'agenda'
                    )
                ),
                   'posts_per_page' => 2
            );
            $recent = new WP_Query( $args );
            while($recent->have_posts()) : $recent->the_post();?>
                <div class="caja grid_5">
                <h3><?php the_title(); ?></h3>
                <span class="sm-date">Publicado el <?php the_time('l j, F  Y') ?> </span>
                <?php excerpt2(65); ?>
                <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
                </div>
            <?php endwhile; ?>
            <?php endif;?>
            </ul>
            
		 
                 </div>
                 <?php
		  query_posts("cat=15&showposts=1");
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
           <div class="columna-opinion grid_5">
           <h2><a href="/categoria/sala-de-prensa/columnas-de-opinion-sala-de-prensa/">Columna de opinión</a></h2>
          <div class="image">  <?php the_post_thumbnail('imagen-270'); ?></div>  
          <h3 class="title"><a href="<?php the_permalink() ?>" class="leyendo" id="h3columna"><?php the_title(); ?></a></h3>
         
           <span class="sm-date">Publicado el <?php the_time('l j, F  Y') ?> </span>
          <?php excerpt2(65); ?>
          <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
          </div>
                  <?php endwhile; endif;?>
                
                
                <?php
		  query_posts("cat=13&showposts=1");
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
           <div class="noticias grid_5">
           <h2><a href="/categoria/sala-de-prensa/">Noticias</a></h2>
              <div class="image">  <?php the_post_thumbnail('imagen-270'); ?></div>  
           <h3 class="title"><a href="<?php the_permalink() ?>" class="leyendo" id="h3noticias"><?php the_title(); ?></a></h3>
           <span class="sm-date">Publicado el <?php the_time('l j, F  Y') ?> </span>
          <?php excerpt2(65); ?>
          <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
          </div>
                  <?php endwhile; endif;?>
                  

                <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/js/coda-slider/css/coda-slider.css">
                <script src="<?php bloginfo('template_directory'); ?>/js/coda-slider/js/jquery-1.7.2.min.js"></script>
				<script src="<?php bloginfo('template_directory'); ?>/js/coda-slider/js/jquery-ui-1.8.20.custom.min.js"></script>
                <script src="<?php bloginfo('template_directory'); ?>/js/coda-slider/js/jquery.coda-slider-3.0.min.js"></script>
                <script>
				$(function(){
					  $('#slider-id').codaSlider({
						autoSlide:true,
						autoHeight:false,
						dynamicTabs: false
					  });
					  $('#slider-id2').codaSlider({
						autoSlide:false,
						autoHeight:false,
						dynamicTabs: false
					  });
				});
				</script> 
                <div class="imagenes">
                    <h2>Imágenes <a class="ver-mas" href="/categoria/sala-de-prensa/multimedia/">Ver más Galerías</a></h2>
                        <div class="coda-slider" id="slider-id">
                        <?php query_posts("page_id=831");
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $miembros = getGroupOrder('slide_multimedia_imagen');
                        foreach($miembros as $miembro){ ?>
                        <div><a href="<?php echo get('slide_multimedia_link',$miembro); ?>"><?php echo'<div class="fotohomeslide">';echo get_image("slide_multimedia_imagen",$miembro, 1, 1, NULL, NULL, 'slide-home-600'); echo'</div>'; ?></a></div>
                        <?php } endwhile;endif;wp_reset_query(); ?>
                        </div>
                </div>
                <style>#slider-id2-wrapper{width:600px !important; position:absolute; overflow:visible;}</style>
                <div class="imagenes">
                    <h2>Videos <a class="ver-mas" href="/categoria/sala-de-prensa/multimedia/" >Ver más Galerías</a></h2>
                    <div>
                        <div class="coda-slider" id="slider-id2">
                        <?php query_posts("category_name=multimedia&post_type=post&showposts=-1"); while (have_posts()) : the_post(); ?>	
                        <?php $i==1; ?>
                        <?php
                        $miembros = getGroupOrder('galeria_video_video');
                        foreach(array_reverse($miembros) as $miembro){
                            $otros = get("galeria_video_video",$miembro); ?>
                            <?php if($otros!="" && $i<5){ ?>
                            <div id="vid-<?php echo $post->ID;?>">
                            <iframe width="600" height="300" src="//www.youtube.com/embed/<?php echo getYoutubeID($otros); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <?php $i++; } ?>
                            
                        <?php 
						} ?>
                        <?php  endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                  
                </div>
            </div>
            <?php get_sidebar('home');?>
            </div>
        </div>
     
	
<?php get_footer(); ?>