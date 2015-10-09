<?php
/* Template Name: Page Interior */
?>
<?php get_header(); ?>


<?php if(in_category(17)){ ?>
<div id="main-page" class="container_16 cf">
    
    <?php get_template_part('parts/clean-sidebar');?>
    
    <div id="content" class="grid_12">
        <div id="bread">
        
        Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content"><?php the_content();?></div>
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
                    $miembros = getGroupOrder('galeria_imagen_imagen');
                    foreach($miembros as $miembro){
                        $otros = array("h" => 115, "w" => 150, "zc" => 1, "q" =>100);?>
                        <?php echo get("galeria_imagen_imagen",$miembro); ?>
							
                           
                        
                    <?php } ?>
                    </div>
                </div>
                
                <div id="tabs-2">
                    <div class="feria-galeria">
                    <?php
                    $miembros = getGroupOrder('galeria_video_video');
                    foreach($miembros as $miembro){
                        $otros = get("galeria_video_video",$miembro); ?>
                        <a class="fancybox-media" href="<?php echo get("galeria_video_video",$miembro); ?>">
                        <img src="http://img.youtube.com/vi/<?php echo getYoutubeID($otros); ?>/0.jpg" width="150" height="115" />
                        </a>
                    <?php } ?>
                    </div>
                </div>
			</div>
		<?php endwhile;endif;wp_reset_query(); ?>
        </div>        
    </div>
</div>
<?php }else { ?>
<div id="main-page" class="container_16 cf">
    
    <?php get_template_part('parts/clean-sidebar'); ?>
    
    <div id="content" class="grid_12">
        <div id="bread">
        <?php $ptype = get_post_type();
                if($ptype != 'tribe_events'):
                    
                    ?>
                Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
            <?php endif;?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php /* the_post_thumbnail('imagen_single'); */ ?>
            <div class="the-content"><?php the_content();?></div> 
		<?php endwhile;endif; ?>
        
    </div>
</div>
<?php }  ?>
<?php get_footer(); ?>
