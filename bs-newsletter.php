<?php 
/*
Template Name: [NUEVO] Página Newsletter
*/
?>
<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
        

                 <article <?php post_class('row');?>>
                    <header>
                        <h1><?php the_title();?></h1>
                    </header>
                    
                    <div class="row">        
                    <div class="col-md-6">

                    <?php if(has_post_thumbnail()):?>
                            <div class="ft-img-wrapper"> <?php the_post_thumbnail('large');?> </div>
                          <?php endif;?>

                    <?php get_template_part('parts/bs-general/bs-sharer');?>

                        <div class="article-content text-content">
                            
                            <?php do_action('cchl_beforecontent');?>

                            <?php the_content();?>


                            <?php do_action('cchl_aftercontent');?>
                            
                        </div>
                    </div>

                    <div class="col-md-4">
                        <?php get_template_part('parts/bs-blocks/bs-mailchimp');?>
                    </div>

                    </div>

                </article>

                <?php endwhile;
                      endif;?>
    
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>