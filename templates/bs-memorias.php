<?php 
/*
Template Name: [NUEVO] Memorias y Páginas con Documentos
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
                        

                            <?php
                                $memorias = get_post_meta($post->ID, '_cchl_listadocs', true);
                               
                                foreach($memorias as $memoria): ?>

                                    <div class="document row">
                                        <div class="col-md-2">
                                            <img src="<?php echo cchl_legacy_image($post->ID, $memoria['docportada']);?>">
                                        </div>
                                        <div class="col-md-10">
                                            <h2><?php echo $memoria['doctitulo'];?></h2>
                                            <p><?php echo $memoria['doctexto'];?></p>
                                            <a href="<?php echo cchl_legacy_file($post->ID, $memoria['docdownload']);?>" class="btn btn-info"><i class="fa fa-download"></i> Descargar (pdf)</a>
                                        </div>
                                    </div>

                                    <?php
                                    endforeach;
                                    ?>
                        

                    </div>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>