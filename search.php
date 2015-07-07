<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        
    </div>
    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <h1><?php printf( __( 'Resultados para: %s', 'Ferias' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                <?php the_excerpt(); ?>
                <br />
			<?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
