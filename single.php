<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
        <div class="row">        
                <div class="col-md-8">

                 <article <?php post_class();?>>
                    <header>
                        <time><?php the_date();?></time>
                        <h1><?php the_title();?></h1>
                    </header>

                    <?php if(has_post_thumbnail()):
                            the_post_thumbnail('large');
                          endif;?>

                    <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <div class="article-content text-content">
                        <?php the_content();?>
                    </div>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

                <?php get_template_part('parts/bs-general/bs-related');?>
    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>