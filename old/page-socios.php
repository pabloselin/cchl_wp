<?php
/* Template Name: Portada Socios Interior */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
         <div id="contenedor_slide_socios"> 
           <ul id="slide_socios2">
       <?php query_posts("page_id=831"); while (have_posts()) : the_post(); ?>  
                <?php
                $miembros = getGroupOrder('slider_socios_imagen');
                foreach($miembros as $miembro){ 
                $otros = array("w" => 940, "h" => 300, "zc" => 1, "q" =>100);
                ?>  
            <li>
                <div class="image">
                    <a href="<?php echo get('slider_socios_link',$miembro); ?>"><?php echo get_image('slider_socios_imagen',$miembro,1,1,NULL,NULL, 'imagen-slide_home'); ?></a>
                </div> 
                  
                <div class="caja_text">
                    <h2><a title="<?php echo get('slider_socios_titulo',$miembro); ?>" href="<?php echo get('slider_socios_link',$miembro); ?>" class="mx"><?php echo get('slider_socios_titulo',$miembro); ?></a></h2>
                    <div class="text2">
                        <a class="mx" href="<?php echo get('slider_socios_link',$miembro); ?>"> <?php echo get('slider_socios_texto',$miembro);?> </a>
                    </div><!--fin text-->
                </div><!--fin caja text-->
            </li>
            
           <?php } ?>
           <?php  endwhile; wp_reset_query(); ?>
            
        </ul>
     </div><!--fin contenedor slide-->
     <div id="content-home" class="grid_16 content-home-socios">
        <div class="noticias_tab2 cf">                        
        <div class="grid_10">
            <h2><a href="/categoria/socios/noticias-socios/">Noticias Socios</a></h2>
        </div>
        <div class="grid_5">
            <h2><a href="/categoria/sala-de-prensa/noticias-del-sector/">Noticias del Sector</a></h2>
        </div>
                         <?php
              query_posts("cat=21&showposts=2");
              if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="grid_5 socios"> 
               <div class="item-noticia">
                   <div class="image">  <?php the_post_thumbnail('imagen-270'); ?></div>  
                                 <h3 class="title"><a id="h3socios" href="<?php the_permalink() ?>" class="leyendo"><?php the_title(); ?></a></h3>
                   <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
                                 <?php excerpt2(45); ?>
                                 
                                 <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
               </div>
             </div>
                      <?php endwhile; endif;?>
                    <?php
              query_posts("cat=14&showposts=1");
              if (have_posts()) : while (have_posts()) : the_post(); ?> 
               <div class="grid_5 socios">
                      <div class="item-noticia">
                          <div class="image">  <?php the_post_thumbnail('imagen-80'); ?></div>  
                                             <h3 class="title"><a id="h3sector" href="<?php the_permalink() ?>" class="leyendo"><?php the_title(); ?></a></h3>
                                             <small>Publicado el <?php the_time('l j, F  Y') ?></small>
                                            <?php excerpt2(45); ?>
                                            <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
                      </div>
                </div>
                      <?php endwhile; endif;?>
                      
                       
                    </div>
                    
                        <div class="agenda cf">
            <h2>Agenda <a href="<?php bloginfo('url');?>/eventos/categoria/agenda/" class="ver-agenda">ver agenda completa »</a></h2>            
            
            <ul>
            <?php
          $menuid = 168;
            
            $menuitems = wp_get_nav_menu_items( $menuid );
            if($menuitems):
              foreach($menuitems as $menuitem) {
                $recent = get_post($menuitem->object_id);?>
                <div class="caja grid_5">
                  <h3><?php echo $recent->post_title;?></h3>
                  <!-- <small>Publicado el <?php the_time('l j, F  Y') ?></small> -->
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
                   'posts_per_page' => 3
            );
            $recent = new WP_Query( $args );
            while($recent->have_posts()) : $recent->the_post();?>
                <div class="caja grid_5">
                <h3><?php the_title(); ?></h3>
                <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
                <?php excerpt2(65); ?>
                <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
                </div>
            <?php endwhile; ?>
            <?php endif;?>
            </ul>
            
         
                 </div><!-- fin agenda-->
                    
                    
              <div class="columna-comunicados grid_5">
               <h2><a href="/categoria/socios/estudios-e-informes/">Estudios e Informes del sector</a></h2>      
             <?php
              query_posts("cat=101&showposts=2");
              if (have_posts()) : while (have_posts()) : the_post(); ?> 
               
              <ul> 
              <li>
               <small>Publicado el <?php the_time('l j, F  Y') ?></small>
               <a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
               </li>
             
                      <?php endwhile; endif;?>
                      </ul>
                    </div>
                    
                    
                     <div class="columna-ferias grid_5">
               <h2><a href="/categoria/socios/noticias-socios/">Próximas Ferias</a></h2>      
             <?php
              query_posts(array('post__not_in'=>array(119),'post_type'=>page,'order'=>ASC,'posts_per_page'=>-1,post_parent=>41,'showposts'=>4));
              if (have_posts()) : while (have_posts()) : the_post(); ?> 
               
              <ul> 
              <li>
                
              <a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
               </li>
             
                      <?php endwhile; endif;?>
                      </ul>
                    </div>
                    
                    
                   
                    
                </div>
    </div>
</div>

<?php get_footer(); ?>
