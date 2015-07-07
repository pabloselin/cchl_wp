<?php
/* Template Name: Page Ferias - Comité Cultural de Contenidos*/
?>
<?php get_header(); ?>
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
             
        	<div id="presidentes">
        	<ul class="cf">
			<?php
            $miembros = getGroupOrder('comite_imagen');
            foreach($miembros as $miembro){
				$otros = array("h" => 92, "w" => 90, "zc" => 1, "q" =>100);
				echo "<li>
				".get_image('comite_imagen',1,1,1,NULL,$otros,$miembro)."
				<div class='info'>
				<h3>".get('comite_nombre',$miembro)."</h3>
				<span>".get('comite_cargo',$miembro)."</span>
				<p>".get('comite_texto',$miembro)."</p>
				</div>
				</li>";
			}
			?>
            </ul>
            </div>
		<?php endwhile; endif; wp_reset_query(); ?>
        </div>        
    </div>
</div>

<?php get_footer(); ?>
