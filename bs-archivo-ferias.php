<?php 
/*
Template Name: Listado Ferias Bootstrap
*/
?>

<?php get_header();?>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $args = array(
            'post_parent' => $post->ID,
            'post_type' => 'page',
            'numberposts' => -1,
            'post_status' => 'publish'
        );
        $childferias = get_children($args);
?>

<div class="container">
    <div class="row">

        <div class="col-md-3 menu-ferias">

        </div>

        <div class="col-md-9">

        <article <?php post_class();?>>
            <header>
                <h1><?php the_title();?></h1>
            </header>

            <div class="article-content text-content">
                <?php the_content();?>
            </div>
        </article>    
    
        </div>
    </div>
</div>




<?php endwhile; endif;?>

<?php get_template_part('parts/bs-home/bs-footer'); ?>