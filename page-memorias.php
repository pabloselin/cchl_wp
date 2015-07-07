<?php
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single')?>
            <div class="the-content"><?php the_content();?></div> 
        
        
        
        <div id="presidentes">
        <ul class="cf">
            <?php
            $miembros = getGroupOrder('memorias_imagen');
            foreach($miembros as $miembro){
				echo "<li>
				".get_image('memorias_imagen',$miembro)."
				<div class='info'>
				<h3>".get('memorias_titulo',$miembro)."</h3>
				<p>".get('memorias_texto',$miembro)."</p>
				<a href='".get('memorias_descargar',$miembro)."' class='descargar'>Descargar »</a>
				</div>
				</li>";
			}
            ?>
            </ul>
            </div>
		<?php endwhile; endif; wp_reset_query(); ?>
    </div>
</div>

<?php get_footer(); ?>
