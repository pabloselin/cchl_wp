<?php
/*
Template Name: Plantilla Feria 2018 
*/
?>

<?php get_header('bs-ferias-nuevo'); ?>
<?php 
    // Custom Fields
    $postid = cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
    $toppost = get_post($postid);
    $menuferia = get_post_meta($postid, 'cchl_bsmenuferia', true);
    $page_evts = get_post_meta($postid, 'cchl_bspageevents', true);
    $colaboradores = get_post_meta( $postid, 'cchl_bspagecolabs', true );
    //var_dump($colaboradores);
    $argsmenu = array(
        'menu' => $menuferia,
        'menu_class' => 'nav'
    );

    $cchl_options = get_option( 'cchl_settings' );
?>

<div class="container">
    <div class="row">
        <div class="content-feria col-md-10 col-md-offset-1">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

                <h1 class="post-title"><?php the_title();?></h1>

                <div class="text-content">
                     
                     <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <?php the_content();?>

                    <?php if($colaboradores == $post->ID):
                        get_template_part('parts/bs-blocks/bs-colaboradores');
                    endif;?>
                     
                </div>

            <?php endwhile;
                    endif;?>

            <?php if( get_the_ID() == $page_evts) {
                get_template_part('parts/bs-blocks/bs-nuevo-programa-cultural');
            }?>

        </div>
    </div>

     

                    

</div>

<?php get_template_part('parts/bs-footer-ferias-nuevo'); ?>
