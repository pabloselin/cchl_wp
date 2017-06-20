<?php
/* Template Name: Socios Interior */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class=" grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <div class="the-content"><?php the_content();?></div>
            
            <ul class="beneficios cf">
            <?php
            $miembros = getGroupOrder('numero');
            foreach($miembros as $miembro){
				echo "<li>
				<h3>".get('numero',$miembro)."</h3>
				<strong>".get('nombre',$miembro)."</strong>
				<span>".get('bajada',$miembro)."</span>
				</li>";
			}
            ?>
            </ul>
            
            
		<?php endwhile; endif; wp_reset_query(); ?>
        
    </div>
</div>

<?php get_footer(); ?>
