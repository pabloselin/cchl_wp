<?php
/* Template Name: Inicio */
?><?php get_header(); ?>

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function () {
	var tabContainers = $('div.tabs2 > div');
	tabContainers.hide().filter(':first').show();
	
	$('div.tabs2 ul.tabNavigation a').click(function () {
		tabContainers.hide();
		tabContainers.filter(this.hash).show();
		$('div.tabs2 ul.tabNavigation a').removeClass('selected');
		$(this).addClass('selected');
		return false;
	}).filter(':first').click();
});
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=281219458564030";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="main-home" class="container_16 cf">

	<div class="tabs2">
        <ul class="tabNavigation">
        	<p>Contenido para:</p>
            <li><a href="#first">Público General</a></li>
            <li><a href="#second">Socios</a></li>
        </ul>
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
						<?php       
                          $primera = get('slider_fecha_desde',$miembro)."<br>"; 
                          $segunda = get('slider_fecha_hasta',$miembro)."<br>"; 
                          $actual = $current_year = date('m')."/".$current_month = date('d')."/".$current_day = date('Y')."<br>";
                          if(compararFechas($primera,$actual)<0 && compararFechas($segunda,$actual)<0){
                          }elseif(compararFechas($primera,$actual)>0 && compararFechas($segunda,$actual)>0){
                            echo '<div id="fecha-home"><span id="quedan">Quedan</span><span id="num">'.compararFechas($primera,$actual).'</span><span id="dia">Días</span></div>';
                          }else{
                          }
                        ?>
						<a class="mx" href="<?php echo get('slider_link',$miembro); ?>"> <?php echo get('slider_texto',$miembro);?> </a>
                        
                        </div><!--fin text-->
                    </div><!--fin caja text-->
                </li>
                <?php } ?>
                <?php  endwhile; wp_reset_query(); ?>
                </ul>
            </div><!--fin contenedor slide-->	
    		<!-- FIN SLIDER VIEJO -->

            <div id="content-home" class="grid_11">
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
            
		 
                 </div>
                 <?php
		  query_posts("cat=15&showposts=1");
		  if (have_posts()) : while (have_posts()) : the_post(); ?> 
           <div class="columna-opinion grid_5">
           <h2><a href="/categoria/sala-de-prensa/columnas-de-opinion-sala-de-prensa/">Columna de opinión</a></h2>
          <div class="image">  <?php the_post_thumbnail('imagen-270'); ?></div>  
          <h3 class="title"><a href="<?php the_permalink() ?>" class="leyendo" id="h3columna"><?php the_title(); ?></a></h3>
         
           <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
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
           <small>Publicado el <?php the_time('l j, F  Y') ?> </small>
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
                            <div><a><object width="600" height="300" data="http://www.youtube.com/v/<?php echo getYoutubeID($otros); ?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?php echo getYoutubeID($otros); ?>" /></object></a></div>
                            <?php $i++; } ?>
                            
                        <?php 
						} ?>
                        <?php  endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div id="sidebar" class="grid_5">
                <div class="streaming">
                
						<?php query_posts(array('page_id' => 541,'showposts' =>1));
                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('imagen-streaming'); ?></a>
                        
            	<div class="nombre"><strong>Streaming</strong>
					
                <a href="<?php the_permalink(); ?>"><span>Acompáñanos en vivo</span></a></div>
				<?php endwhile;endif;wp_reset_query(); ?> 
                </div>
                <ul>
                    <li><a href="/observatorio-del-libro-y-la-lectura/definicion/" class="observatorio">Observatorio del libro y la lectura</a></li>
                    <li><a href="/ranking-de-libros/" class="ranking">Ranking de libros</a></li>
                    <li><a href="/categoria/guia-librerias/" class="guia">Guía de librerías</a></li>
                    <li><a href="/categoria/escritores-chilenos-premiados/" class="escritores">Escritores chilenos premiados</a></li>
                    <li><a href="/categoria/sala-de-prensa/concursos-literarios/" class="concursos">Concursos literarios</a></li>
                </ul>
                
                <div class="encuesta">
                    <?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
                    	<h1>Encuesta</h1>
                        <ul>
                            <li><?php get_poll();?></li>
                        </ul>
                    <?php endif; ?>
                </div>
                
                <div id="caja_twitter">
                <div class="titulo_twitter">Twitter @CamaradelLibro</div><!--fin titulo twitter-->
               <?php /*?> <?php echo do_shortcode('[twitter-feed username="CamaradelLibro" id="360783322961571840" mode="feed" height="370" data-chrome="nofooter" data-tweet-limit="3"]'); ?><?php */?>
                <a class="twitter-timeline"  href="https://twitter.com/CamaradelLibro" data-chrome="nofooter noheader" height="370" data-widget-id="360783322961571840">Tweets por @CamaradelLibro</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                
              
                 
                 </div><!--fin twitter-->
                 
                 <div id="caja_facebook">
                 <h1>Facebook</h1>
                 <div class="fb-like-box" data-href="http://www.facebook.com/camarachilenalibro" data-width="280" data-show-faces="true" data-border-color="#F2F2F2" data-stream="false" data-header="false"></div>
                <div style="clear:both;"> </div>
                 <div class="fb-like-box filsa" data-href="https://www.facebook.com/filsachile" data-width="280" data-show-faces="true" data-border-color="#F2F2F2" data-stream="false" data-header="false"></div>
                 
    </div>

            </div>
        </div>
	</div>
     
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
               <div class="image">  <?php the_post_thumbnail('imagen-80'); ?></div>  
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
                 <div class="fb-like-box" data-href="http://www.facebook.com/camarachilenalibro" data-width="280" data-show-faces="true" data-border-color="#F2F2F2" data-stream="false" data-header="false"></div>
                <div style="clear:both;"> </div>
                 <div class="fb-like-box filsa" data-href="https://www.facebook.com/filsachile" data-width="280" data-show-faces="true" data-border-color="#F2F2F2" data-stream="false" data-header="false"></div>
                 
    </div>
                                 </div>
            </div>
            </div>
        </div>

<?php get_footer(); ?>