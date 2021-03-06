<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
        <div class="row">        
                <div class="col-md-8">

                 <article <?php post_class();?>>
                    <header>
                        <?php if(get_post_type() != 'socios'):?>
                            <time><?php the_date();?></time>
                        <?php endif;?>
                        <h1><?php the_title();?></h1>
                    </header>

                    <?php if(has_post_thumbnail() && !get_post_meta($post->ID, 'galeria_imagen_imagen', true) && get_post_type() != 'socios'):?>
                            <div class="ft-img-wrapper"> <?php the_post_thumbnail('large');?> </div>
                    <?php endif;?>

                    <?php get_template_part('parts/bs-blocks/bs-post-fields');?>

                    <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <div class="article-content text-content">
                        <?php the_content();?>
                    </div>

                    <?php get_template_part('parts/bs-blocks/bs-after-content');?>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

                <?php 
                if(get_post_type($post->ID) == 'trabajos'):
                    get_template_part('parts/bs-general/bs-related-works');
                elseif(get_post_type($post->ID) == 'socios'):
                    get_template_part('parts/bs-blocks/bs-listado-socios');
                else:
                    get_template_part('parts/bs-general/bs-related');
                endif;
                ?>
    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>