<?php 
/*
Template Name: Search Page
*/
?>
<?php get_header();?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
        <div class="row">        
                <div class="col-md-8 col-md-offset-2">

                 <article class="search-results">
                    <header>
                        <h1>Resultados para la búsqueda: <?php the_search_query();?></h1>
                    </header>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="item-search">

                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

                    <div class="article-content text-content">

                        <?php the_excerpt();?>
                        
                    </div>

                    </div>

                    <?php endwhile;?>

                        <div class="row pagenavigation">
                        <?php 
                            if ( function_exists('wp_bootstrap_pagination') ) 
                            wp_bootstrap_pagination();
                        ?>
                        </div>

                    <?php
                      endif;?>
                </article>

                

                </div>

    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>