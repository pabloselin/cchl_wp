<?php
/* Template Name: Page FIL */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    
    <div id="sidebar_fil" class="grid_4">
        <?php wp_nav_menu( array('menu'=> 177));?>
    </div>

    <div id="content" class="grid_12">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
           <?php get_template_part('parts/addthis');?>
            
            
            <div class="cf"></div>
            <div id="feria-single">
            	<div class="the-content"><?php the_content();?></div>
            </div>
            <div id="feria-single-imagen">
            	<?php the_post_thumbnail('afiche'); ?>
                <?php
				 
							
                $miembros = getGroupOrder('fecha_desde');
				foreach($miembros as $miembro){
				  $primera = get('fecha_desde',$miembro)."<br>"; 
				  $segunda = get('fecha_hasta',$miembro)."<br>"; 
				  $actual = $current_year = date('m')."/".$current_month = date('d')."/".$current_day = date('Y')."<br>";
				  if(compararFechas($primera,$actual)<0 && compararFechas($segunda,$actual)<0){
				  }elseif(compararFechas($primera,$actual)>0 && compararFechas($segunda,$actual)>0){
					  echo '<div id="feria-single-imagen-info">';
					  echo '<div id="feria-single-imagen-info-dia"><span id="quedan">Quedan</span><span id="num">'.compararFechas($primera,$actual).'</span><span id="dias">Días</span></div>';
					 the_excerpt(); 
					  echo '<div id="feria-single-imagen-info-dia2">'.$extracto.'</div>';					  
					  echo '</div>';
				  }else{
				  }
				}
				?>
                
                   
                <div class="banner_feria">
           
	
<?php
$filename = 'imagen_banner_feria';
		if ( get('imagen_banner_feria',TRUE) ) {
			echo '<a href="'.get("link_banner_feria",$miembro).'"><img src="'.get('imagen_banner_feria',$miembro).'"/></a>';
		}
		else
		{
			
		}
//if (file_exists($filename)) {
//    echo "The file $filename exists";
//} else {
//    echo "The file $filename does not exist";
//}
?>



	
	

         </div><!--fin banners ferias--> 

     
            </div>

	
	
  				<br class="limpia" />
            <div class="cf left">
            <?php /* $parent = $post->ID; ?>
			<?php
            query_posts('post_type=page&post_parent='.$parent.'&name=comite-cultural-de-contenidos');
             while (have_posts()) : the_post();
            ?>
	    
            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
            <?php the_excerpt(); ?>
            <?php endwhile; wp_reset_query(); */ ?>
            <?php
	    
            query_posts('post_type=page&post_parent='.$parent.'&name=informacion-general');
             while (have_posts()) : the_post();
	    /*
	    ?>
            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
            <?php the_excerpt(); ?>
            <?php 
            <link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/js/css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
			<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/js/jquery-1.8.0.min.js"></script>
            <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/js/jquery-ui-1.8.23.custom.min.js"></script>
            <script>
            $(function() {
                $( "#tabs" ).tabs();
            });
            </script>
            <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
            <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.0"></script>
            <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.3"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".fancybox").fancybox({
						openEffect	: 'none',
						closeEffect	: 'none'
					});
					$('.fancybox-media').fancybox({
						openEffect  : 'none',
						closeEffect : 'none',
						helpers : {
							media : {}
						}
					});
				});
			</script>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Galería de fotos</a></li>
                    <li><a href="#tabs-2">Videos</a></li>
                </ul>
                <div id="tabs-1">
                    <div class="feria-galeria">
                    <?php
                    $miembros = getGroupOrder('galeria_imagen_imagen_informacion');
                    foreach($miembros as $miembro){
                        $otros = array("h" => 115, "w" => 150, "zc" => 1, "q" =>100);?>
                        <a class="fancybox" rel="gallery1" href="<?php echo get("galeria_imagen_imagen_informacion",$miembro); ?>">
                        <?php echo get_image('galeria_imagen_imagen_informacion',$miembro,1,1,NULL,$otros); ?>
                        </a>
                    <?php } ?>
                    </div>
                </div>
                <div id="tabs-2">
                    <div class="feria-galeria">
                    <?php
                    $miembros = getGroupOrder('galeria_video_video_informacion');
                    foreach($miembros as $miembro){
                        $otros = get("galeria_video_video_informacion",$miembro); ?>
                        <a class="fancybox-media" href="<?php echo get("galeria_video_video_informacion",$miembro); ?>">
                        <img src="http://img.youtube.com/vi/<?php echo getYoutubeID($otros); ?>/0.jpg" width="150" height="115" />
                        </a>
                    <?php } ?>
                    </div>
                </div>
			</div>
        	</div>    
			*/ ?>
            <?php endwhile; wp_reset_query(); ?>
            </div>
            
		<?php endwhile;endif;wp_reset_query(); ?>      
    </div>
</div>

<?php get_footer(); ?>
