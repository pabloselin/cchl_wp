<?php 
/*
Template Name: [NUEVO] Listado de socios
*/
?>
<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
        <div class="row">        
                <div class="col-md-12">

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

                        <section class="listado-socios row">
                            <?php $sociosargs = array(
                                'post_type' => 'socios',
                                'numberposts' => -1,
                                'orderby' => 'name',
                                'order' => 'ASC'
                                );
                                $socios = get_posts($sociosargs);
                                foreach($socios as $socio) {?>

                                    <div class="item-socio col-md-3">
                                    <a href="<?php echo get_permalink($socio->ID);?>">
                                        <div class="img-socio">
                                            <?php if(has_post_thumbnail( $socio->ID )):
                                                    echo get_the_post_thumbnail( $socio->ID, 'medium' );
                                                    endif;
                                                    ?>
                                        </div>

                                        <h3><?php echo $socio->post_title;?></h3>
                                    </a>
                                    </div>

                                <?php }
                            ?>

                        </section>

                        <?php do_action('cchl_aftercontent');?>
                        
                    </div>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>