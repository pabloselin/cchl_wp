<?php
/* Template Name: Page Observatorio links */
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
            <div class="the-content"><?php the_content();?></div> 
        
        
        
        <div id="presidentes">
        <ul class="cf">
            <?php
            $miembros = getGroupOrder('cargo');
            foreach($miembros as $miembro){
				echo "<li>
				<div class='info'>
								<span>".get('cargo',$miembro)."</span>
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
