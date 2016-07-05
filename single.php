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
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            
            <div class="the-content"><?php the_content();?></div>

            <div id="tabs">
                <ul class="tab-nav">
                    <li class="active"><a href="#tabs-1">Galería de fotos</a></li>
                    <?php if(get_post_meta($post->ID, 'galeria_video_video', true)): ?>
                        
                        <li><a href="#tabs-2">Videos</a></li>
                        
                    <?php endif;?>
                </ul>
                <div class="tab-panel active" id="tabs-1">
                    <div class="feria-galeria imagenes">
                    <?php
                    $miembros = getGroupOrder('galeria_imagen_imagen');
                    foreach($miembros as $miembro){
                        $otros = array("h" => 115, "w" => 150, "zc" => 1, "q" =>100);?>
                        <?php echo get("galeria_imagen_imagen",$miembro); ?>
							
                           
                        
                    <?php } ?>
                    </div>
                </div>
                
                <div class="tab-panel" id="tabs-2">
                    <div class="feria-galeria videos">
                    <?php
                    $miembros = getGroupOrder('galeria_video_video');
                    
                    if(get_post_meta($post->ID, 'galeria_video_video', true)):

                    foreach($miembros as $key=>$miembro){
                        
                        $id = uniqid('yt');
                        $otros = get("galeria_video_video",$miembro); ?>
                        <a class="fl-media" data-featherlight="#ytvid-<?php echo $id;?>">
                        <img src="http://img.youtube.com/vi/<?php echo getYoutubeID($otros); ?>/0.jpg" width="150" height="115" />
                        </a>

                        <iframe id="ytvid-<?php echo $id;?>" class="fl-lightbox" width="560" height="315" src="//youtube.com/embed/<?php echo getYoutubeID($otros); ?>" frameborder="0" allowfullscreen></iframe>
                    <?php } ?>

                    <?php endif;?>
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

                  
                        <?php $miembros = getGroupOrder('link_link');
                        if($miembros):
                        foreach($miembros as $miembro){ ?> 
                            <p>Fuente:  <a href="<?php echo get('link_link',$miembro); ?>" target="_blank"> <?php echo get('link_descripcion',$miembro); ?> <i class="fa fa-external-link"></i></a></p>
                        <?php }
                        endif;
                         ?>   
                     

		<?php endwhile;endif; ?>
        
    </div>
</div>
<?php }  ?>
<?php get_footer(); ?>
