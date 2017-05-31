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

    <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
    
    <div class="row">

        <div class="col-md-3 hidden-xs">
            <div class="menu-filsa-archivo">
                <?php 
                $menuoption = get_post_meta($post->ID, '_cchl_custompage_menu', true);
                $menuvalue = ($menuoption)? $menuoption : 'default';
                wp_nav_menu( array( 'theme_location' => $menuoption) );?>
            </div>
        </div>

        <div class="col-md-9">

        <article <?php post_class();?>>
            <header>
                <h1><?php the_title();?></h1>
            </header>

            <?php get_template_part('parts/bs-general/bs-sharer');?>

            <div class="article-content text-content">
                <?php the_content();?>
            </div>
        </article>    
    
        </div>
    </div>
</div>




<?php endwhile; endif;?>

<?php get_template_part('parts/bs-home/bs-footer'); ?>