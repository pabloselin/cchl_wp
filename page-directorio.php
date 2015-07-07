<?php
/* Template Name: Sala de Prensa */
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
            <h1>
				<?php the_title(); ?>
            </h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <div class="the-content"><?php the_content();?></div> 
        
        
        
        <div id="presidentes" class="directorio">
        <ul class="cf">
		<?php
        $miembros = getGroupOrder('imagen');
        foreach($miembros as $miembro){
            echo "<li>";
            $otros = array("h" => 95, "w" => 95, "zc" => 1, "q" => 100);
            echo get_image('imagen',$miembro,1,1,NULL,$otros);
            echo "<div class='info'>
            <h3>".get('nombre',$miembro)."</h3>
            <span>".get('cargo',$miembro)."</span>
            <p>".get('texto',$miembro)."</p>
            </div>
            </li>";
        }
        ?>
        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </ul>
        </div>
		<?php endwhile; endif; wp_reset_query(); ?>
    </div>
</div>

<?php get_footer(); ?>
