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
                <?php 
                if(cchl_isoldfilsa($post->ID)):
            
                    get_template_part('parts/bs-blocks/bs-menu-oldfilsa');

                else:
                
                    get_template_part('parts/bs-blocks/bs-menu-filsa-archivo');

                endif;?>
        </div>

        <div class="col-md-9">

        <article <?php post_class();?>>
            <header>
                <h1><?php the_title();?></h1>
            </header>

            <?php get_template_part('parts/bs-general/bs-sharer');?>

            <div class="article-content text-content">
                    
                    <?php do_action('cchl_beforecontent');?>

                        <?php the_content();?>

                    <?php do_action('cchl_aftercontent');?>

            </div>
        </article>    
    
        </div>

         <div class="col-md-3 visible-xs">
            <?php 
                if(cchl_isoldfilsa($post->ID)):
            
                    get_template_part('parts/bs-blocks/bs-menu-oldfilsa');

                else:
                
                    get_template_part('parts/bs-blocks/bs-menu-filsa-archivo');

                endif;?>
        </div>
    </div>
</div>




<?php endwhile; endif;?>

<?php get_template_part('parts/bs-home/bs-footer'); ?>