<?php 
/*
Template Name: Licitaciones y Concursos
*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="content" class=" grid_16">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content"><?php the_content();?></div>
            
            <ul class="concursos cf">
            <?php
            $miembros = getGroupOrder('titulo');
            foreach($miembros as $miembro){
				echo "<li class='licitaciones'>
				<h4>".get('titulo',$miembro)."</h3>";
                if(get('fecha_desde', $miembro)):
                    echo "<p class='fechadesde'><strong>Desde:</strong> ".get('fecha_desde', $miembro)."</p>";
                endif;
                if(get('fecha_hasta', $miembro)):
                    echo "<p class='fechahasta'><strong>Hasta:</strong> ".get('fecha_hasta', $miembro)."</p>";
                endif;
				echo "<p>".get('texto',$miembro)."</p>";
				if(get('descargar', $miembro)):
                    echo "<a href='".get('descargar',$miembro)."' class='descargar'>Descargar »</a>";
                endif;
                echo "</li>";
			}
            ?>
            </ul>
            
		<?php endwhile; endif; wp_reset_query(); ?>
        
    </div>
</div>

<?php get_footer(); ?>
