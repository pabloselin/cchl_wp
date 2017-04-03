<?php
/*
Template Name: Plantilla Feria BS 
*/
?>

<?php get_header('bs-ferias'); ?>
<?php 
    // Custom Fields
    $postid = cchl_current_fields_id('bs-plantilla-feria.php');
    $toppost = get_post($postid);
    $menuferia = get_post_meta($postid, 'cchl_bsmenuferia', true);
    $page_evts = get_post_meta($postid, 'cchl_pageevents', true);
    $argsmenu = array(
        'menu' => $menuferia,
        'menu_class' => 'nav nav-pills nav-stacked'
    );

    $cchl_options = get_option( 'cchl_settings' );
?>

<div class="container">
    <div class="row">
        <div class="sidebar-menu-feria col-md-3 hidden-xs hidden-sm">
            <?php wp_nav_menu( $argsmenu );?>
        </div>
        <div class="content-feria col-md-9">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

                <h1 class="post-title"><?php the_title();?></h1>

                <div class="text-content">
                     
                     <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <?php the_content();?>

                    <?php if(get_post_meta( get_the_ID(), 'colaboradores_group', true )):

                        get_template_part('parts/bs-blocks/bs-colaboradores');

                    endif;?>
                </div>

            <?php endwhile;
                    endif;?>

        </div>
    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>