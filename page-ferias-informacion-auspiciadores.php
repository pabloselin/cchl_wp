<?php
/* Template Name: Page Ferias - Información General - Auspiciadores */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <?php get_template_part('parts/clean-sidebar');?>
    <div id="content" class="grid_12">
          <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
       <?php get_template_part('parts/addthis');?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
             <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content"><?php the_content();?></div> 
        
        
        
        <div id="auspiciadores">
        <ul class="cf">
            <?php
            $miembros = getGroupOrder('imagen');
            foreach($miembros as $miembro){
				echo "<li>";
				$otros = array("h" => 100, "w" => 100, "zc" => 1, "q" => 100);
   				echo get_image('imagen',$miembro,1,1,NULL);
				echo "<div class='info'>
				<h3>".get('nombre',$miembro)."</h3>
			
				<p>".get('texto',$miembro)."</p>
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

