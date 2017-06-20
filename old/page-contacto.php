<?php
/* Template Name: Page Interior */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    
    <div id="contacto" class="">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <div class="mapa grid_6">
            <?php echo get('mapa'); ?>
            <div class="direccion"><?php echo get('direccion_1'); ?></div>
            <div class="direccion"><?php echo get('direccion_2'); ?></div>
             
            
            </div>
            <div class="formulario grid_9">
            <div class="the-content"><?php the_content();?></div> 
            <ul class="datos-contacto cf">
              <?php
            $miembros = getGroupOrder('nombre_de_la_persona');
            foreach($miembros as $miembro){
				echo "<li>
				<h3>".get('nombre_de_la_persona',$miembro)."</h3>
				<strong>".get('cargo_de_la_persona',$miembro)."</strong>
				<span>".get('email',$miembro)."</span></li>";
			}
            ?>
           
            </ul>
            </div>
		<?php endwhile; endif; wp_reset_query(); ?>
        
    </div>
</div>

<?php get_footer(); ?>
