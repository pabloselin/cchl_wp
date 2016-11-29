<?php
/*
Page Template: Home Socios
*/
?>

<div id="second">
        <div id="main" class="container_16 cf">
         <div id="contenedor_slide_home">	
           <ul id="slide_home2">
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
<!--FIN SLIDER ANTIGUO -->       
                
                
                <div id="content-home" class="grid_11">
                
             
                
                
                    <div class="noticias_tab2 cf">
                        
                         <?php
              query_posts("cat=21&showposts=1");
              if (have_posts()) : while (have_posts()) : the_post(); ?> 
               <div class="columna-opinion grid_5 socios">
               <h2><a href="/categoria/socios/noticias-socios/">Noticias Socios</a></h2>
               <div class="image">  <?php the_post_thumbnail('imagen-270'); ?></div>  
              <h3 class="title"><a id="h3socios" href="<?php the_permalink() ?>" class="leyendo"><?php the_title(); ?></a></h3>
               <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
              <?php excerpt2(45); ?>
              
              <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
             
                      <?php endwhile; endif;?>
                    </div>
                    
                    <?php
              query_posts("cat=14&showposts=1");
              if (have_posts()) : while (have_posts()) : the_post(); ?> 
               <div class="noticias grid_5 socios">
               <h2><a href="/categoria/sala-de-prensa/noticias-del-sector/">Noticias del Sector</a></h2>
                  <div class="image">  <?php the_post_thumbnail('imagen-80'); ?></div>  
               <h3 class="title"><a id="h3sector" href="<?php the_permalink() ?>" class="leyendo"><?php the_title(); ?></a></h3>
               <small>Publicado el <?php the_time('l j, F  Y') ?></small>
              <?php excerpt2(45); ?>
              <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
          
                      <?php endwhile; endif;?>
                      
                       </div>
                    </div>
                    
                        <div class="agenda cf">
            <h2>Agenda <a href="/eventos/category/agenda//" class="ver-agenda">ver agenda completa »</a></h2>			 
            
            <ul>
			<?php
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
            <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
            <?php excerpt2(65); ?>
            <a href="<?php the_permalink() ?>" class="leyendo">Siga Leyendo »</a>
            </div>
            <?php endwhile; ?>
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
                <div id="sidebar" class="grid_5">
                    <ul>
                        <li><a href="/observatorio-del-libro-y-la-lectura/" class="observatorio">Observatorio del libro y la lectura</a></li>
                        <li><a href="/categoria/socios/beneficios/" class="beneficios">Beneficios socios</a></li>
                        
                        <li><a href="/socios/como-hacerse-socio/" class="socios">Házte socio de la cámara</a></li>
                                           
                    </ul>
                      <div id="caja_twitter">
                <div class="titulo_twitter">Twitter @CamaradelLibro</div><!--fin titulo twitter-->
               <?php /*?> <?php echo do_shortcode('[twitter-feed username="CamaradelLibro" id="360783322961571840" mode="feed" height="370" data-chrome="nofooter" data-tweet-limit="3"]'); ?><?php */?>
                <a class="twitter-timeline"  href="https://twitter.com/CamaradelLibro" data-chrome="nofooter noheader" height="370" data-widget-id="360783322961571840">Tweets por @CamaradelLibro</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                
              
                 
                 </div><!--fin twitter-->
                 
                 <div id="caja_facebook">
                 <h1>Facebook</h1>
                 <div class="fb-like-box" data-href="https://www.facebook.com/camarachilenalibro" data-width="280" data-show-faces="true" data-border-color="#F2F2F2" data-stream="false" data-header="false"></div>
                <div style="clear:both;"> </div>
                 <div class="fb-like-box filsa" data-href="https://www.facebook.com/filsachile" data-width="280" data-show-faces="true" data-border-color="#F2F2F2" data-stream="false" data-header="false"></div>
                 
    </div>
                                 </div>
            </div>
            </div>
        </div>
