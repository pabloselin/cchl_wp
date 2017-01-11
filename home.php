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
                    <a class="mx" href="<?php echo get('slider_link',$miembro); ?>"> <?php echo strip_tags(get('slider_texto',$miembro));?> </a>

                  </div><!--fin text-->
                </div><!--fin caja text-->
              </li>
              <?php } ?>
            <?php  endwhile; wp_reset_query(); ?>
          </ul>
        </div><!--fin contenedor slide-->	
        
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

        </div>
        <?php get_sidebar('home');?>
      </div>

      </div>

      <div class="container_16 cf">
          <?php get_template_part('parts/blocks/videos-home');?>  
        </div>
    
      <div class="tercio">
          <?php get_template_part('parts/blocks/facebook-block');?>
      </div>

      <div class="tercio">
        <?php get_template_part('parts/blocks/twitter-block');?>
      </div>

      <div class="tercio">
          <?php get_template_part('parts/blocks/facebook-filsa-block');?>
      </div>
    </div>


    <?php get_footer(); ?>