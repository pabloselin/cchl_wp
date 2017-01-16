<?php
/* Template Name: Inicio */
?>

<?php get_header(); ?>
<div id="main-home" class="container_16 cf">

	<div class="tabs2">
    <div id="first">
      <div id="main" class="container_16 cf">
        <!-- SLIDER VIEJO -->
        
        
            <div id="content-home" class="grid_11">
              <div class="agenda cf">
                <h2>Agenda</h2>			 

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