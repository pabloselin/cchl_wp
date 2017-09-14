<?php 
/*
Template Name: Página por defecto Bootstrap
*/
?>
<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
        <div class="row">        
                <div class="col-md-8 col-md-offset-2">

                 <article <?php post_class();?>>
                    <header>
                        <h1><?php the_title();?></h1>
                    </header>

                    <?php if(has_post_thumbnail()):?>
                            <div class="ft-img-wrapper"> <?php the_post_thumbnail('large');?> </div>
                          <?php endif;?>

                    <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <div class="article-content text-content">
                        
                        <?php do_action('cchl_beforecontent');?>
                        
                        <?php the_content();?>

                        <?php do_action('cchl_aftercontent');?>
                        
                    </div>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>